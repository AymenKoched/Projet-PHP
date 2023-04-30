<?php

$id = htmlentities($_GET['id']);
include_once ("RecipesRepository.php");
$rep1= new RecipesRepository("recipes");
include_once ("CommentRepository.php");
$rep2=new CommentRepository("comment");
$comments = $rep2->findByRecipeId($id);
if ($comments){
    $rep2->DeleteByRecipeID($id);
}

$recipe = $rep1->DeleteById($id);
header('location:index.php');
