<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
session_start();
require_once('database_access/ConnexionPDO.php');
require_once('UploadedFile.php');

$upload = new UploadedFile($_FILES["my_image"]["tmp_name"]);

if($upload->isImage()){
    $name = $_POST['name'];
    $author = $_POST['author'];
    $ingrediant = $_POST['ingredients'];
    $steps = $_POST['steps'];
    $cooktime = $_POST['cooktime'];

    if (!empty($_POST['region'])) {
        $region = $_POST['region'];
        // continue with your SQL query
    } else {
        $region = "All of Tunisia";
    }

    $upload->compressImageIfPossible();

    $query = "INSERT INTO recipe (name, author, image, ingrediants, steps, cooktime, region)
              VALUES (:name, :author, :image, :ingrediant, :steps, :cooktime, :region)";
    $statement = ConnexionPDO::getInstance()->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':author', $author);
    $image_blob = file_get_contents($upload->path);
    $statement->bindParam(':image', $image_blob);
    $statement->bindParam(':ingrediant', $ingrediant);
    $statement->bindParam(':steps', $steps);
    $statement->bindParam(':cooktime', $cooktime);
    $statement->bindParam(':region', $region);
    $statement->execute();
    header("Location: /index.php");

}
else{
    $_SESSION["erreur"] = 'Please enter an image file.';
    header("Location: addRecipe.php");
}
?>
