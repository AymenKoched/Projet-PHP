<?php

var_dump($_POST);

$id = htmlentities($_POST['id']);
$nom = htmlentities($_POST['nom']);
$author = htmlentities($_POST['author']);
$ingrediants = htmlentities($_POST['ingrediants']);
$etapes = htmlentities($_POST['etapes']);
$rating = htmlentities($_POST['rating']);
$categories = htmlentities($_POST['categories']);

$params = array(
    'nom' => $nom,
    'author' => $author,
    'ingrediants' => $ingrediants,
    'etapes' => $etapes,
    'rating' => $rating,
    'categorie' => $categories
);

require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->UpdateById($id,$params);

header("Location: index.php");
