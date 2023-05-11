<?php
    set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
    include_once 'database_access/BookmarkRepository.php';
    session_start();
    $email = $_SESSION["user"];
    $id = $_GET["id"];
    $rep= new BookmarkRepository('bookmarks');
    $recipe = $rep->findByRecipeAndUser($email,$id);
    if(isset($recipe->recipeID)) {
        $rep->DeleteByRecipeIDAndEmail($email,$id);
    } else {
        $rep->Create(['userEmail' => $email,'recipeID'=>$id]);
    }
    header("location:/details.php?id=$id");
?>
