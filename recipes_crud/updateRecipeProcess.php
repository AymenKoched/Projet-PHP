<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
session_start();
require_once('UploadedFile.php');

$id = htmlentities($_POST['id']);
$nom = htmlentities($_POST['nom']);
$author = htmlentities($_POST['author']);
$ingrediants = htmlentities($_POST['ingrediants']);
$etapes = htmlentities($_POST['etapes']);
$cooktime = htmlentities($_POST['cooktime']);
$categories = htmlentities($_POST['categories']);

$params = array(
    'nom' => $nom,
    'author' => $author,
    'ingrediants' => $ingrediants,
    'etapes' => $etapes,
    'cooktime' => $cooktime,
    'categorie' => $categories,
);

$tmp_upload_path = $_FILES['my_image']['tmp_name'];

//Updating a recipe doesn't require changing the picture
if(file_exists($tmp_upload_path)
      && is_uploaded_file($tmp_upload_path)) {
    $upload = new UploadedFile($tmp_upload_path);

    if($upload->isImage()){
        $upload->compressImageIfPossible();
        $params['image'] = file_get_contents($upload->path);
    }
    else{
        $_SESSION["erreur"] = "You uploaded an invalid image. Other modifications will still take effect.";
    }
}

require_once ('database_access/RecipesRepository.php');
$rep= new RecipesRepository();
$recipe = $rep->UpdateById($id,$params);

header("Location: /index.php");
