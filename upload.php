<?php
session_start();
require_once('ConnexionPDO.php');
require_once('UploadedFile.php');

$upload = new UploadedFile($_FILES["my_image"]["tmp_name"]);

if($upload->isImage()){
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

    $upload->compressImageIfPossible();

    $query = "INSERT INTO recipes (nom, author, image, ingrediants, etapes, rating, categorie)
              VALUES (:nom, :author, :image, :ingrediant, :etape, :rating, :categorie)";
    $statement = ConnexionPDO::getInstance()->prepare($query);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':author', $author);
    $image_blob = file_get_contents($upload->path);
    $statement->bindParam(':image', $image_blob);
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
