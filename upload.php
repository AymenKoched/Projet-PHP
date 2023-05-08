<?php
session_start();
require_once('ConnexionPDO.php');

$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['my_image']['tmp_name']);
finfo_close($finfo);

$mime_parts = explode('/', $mime);
$mime_type = $mime_parts[0];
$mime_subtype = $mime_parts[1];

if($mime_type === 'image'){
    $nom = $_POST['nom'];
    $author = $_POST['author'];
    $ingrediant = $_POST['ingredients'];
    $etape = $_POST['etapes'];
    $rating = $_POST['rating'];

    if (!empty($_POST['categories'])) {
        $categorie = $_POST['categories'];
        // continue with your SQL query
    } else {
        $categories = "pas de categorie ";
    }

    $query = "INSERT INTO recipes (nom, author, image, ingrediants, etapes, rating, categorie)
              VALUES (:nom, :author, :image, :ingrediant, :etape, :rating, :categorie)";
    $statement = ConnexionPDO::getInstance()->prepare($query);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':author', $author);
    $image = file_get_contents($_FILES["my_image"]["tmp_name"]);
    $statement->bindParam(':image', $image);
    $statement->bindParam(':ingrediant', $ingrediant);
    $statement->bindParam(':etape', $etape);
    $statement->bindParam(':rating', $rating);
    $statement->bindParam(':categorie', $categorie);
    $statement->execute();
    header("Location: index.php");

}
else{
    $_SESSION["erreur"] = 'Please enter an image file.';
    header("Location: addRecipe.php");
}
?>
