<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$id = htmlentities($_GET['id']);
include_once ("database_access/RecipesRepository.php");
$rep1= new RecipesRepository("recipes");
include_once ("database_access/CommentRepository.php");
$rep2=new CommentRepository("comment");
$comments = $rep2->findByRecipeId($id);
if ($comments){
    $rep2->DeleteByRecipeID($id);
}

$recipe = $rep1->DeleteById($id);
header('location:/index.php');
