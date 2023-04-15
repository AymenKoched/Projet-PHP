<?php

$id = htmlentities($_POST['id']);
$nom = htmlentities($_POST['nom']);
$author = htmlentities($_POST['author']);
$ingrediants = htmlentities($_POST['ingrediants']);
$etapes = htmlentities($_POST['etapes']);
$rating = htmlentities($_POST['rating']);
$categories = htmlentities($_POST['categories']);

$image = null;
if (isset($_FILES['my_image']) && $_FILES['my_image']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $name = $_FILES['my_image']['name'];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $allowed_exts = array('jpg', 'jpeg', 'png');
    if (in_array($ext, $allowed_exts)) {
        $image = file_get_contents($tmp_name);
    }
}
$params = array(
    'nom' => $nom,
    'author' => $author,
    'ingrediants' => $ingrediants,
    'etapes' => $etapes,
    'rating' => $rating,
    'categorie' => $categories,
    'image' => $image
);


require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->UpdateById($id,$params);

header("Location: index.php");
