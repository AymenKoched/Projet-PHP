<?php

require_once('ConnexionPDO.php');


    $nom = $_POST['nom'];
    $author = $_POST['author'];
    $ingrediant = $_POST['ingredients'];
    $etape = $_POST['etapes'];
    $rating = $_POST['rating'];
    $categorie = $_POST['categories'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["my_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["my_image"]["tmp_name"], $target_file);
    $query = "INSERT INTO recipes (nom, author, image, ingrediants, etapes, rating, categorie)
            VALUES (:nom, :author, :image, :ingrediant, :etape, :rating, :categorie)";
    $statement = ConnexionPDO::getInstance()->prepare($query);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':author', $author);
    $file_get_contents = file_get_contents($target_file);
    $statement->bindParam(':image', $file_get_contents);
    $statement->bindParam(':ingrediant', $ingrediant);
    $statement->bindParam(':etape', $etape);
    $statement->bindParam(':rating', $rating);
    $statement->bindParam(':categorie', $categorie);
    $statement->execute();
    header("Location: index.php");




