<?php

$id = htmlentities($_GET['id']);

require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->DeleteById($id);

header('location:home.php');
