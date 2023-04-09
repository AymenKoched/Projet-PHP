<?php
$user = "aymen";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes | Recipe </title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
<nav>
    <h1><a href="home.php">Cooking Recipes Collection</a></h1>
    <ul>
        <li>Welcome, foulen@google.com</li>
        <li><a href="addRecipe.php">Add a Recipe</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</nav>

<div class="details">
    <h2>Makarouna bel djej</h2>
    <img src="recipe1.jpeg" alt="recipe img">
    <p>By Aymen</p>

    <h5>Ingrédients:</h5>
    <ul class="ingrediants" >
        <li>500 g de pâtes au choix</li>
        <li>4 morceaux de poulet</li>
        <li>3 cs de concentré de tomates</li>
        <li>1 cs de piment moulu</li>
        <li>1 cc de curcuma</li>
        <li>1 cs rase de tabel karouia</li>
        <li>8 gousses d'ail</li>
        <li>4 piments</li>
        <li>huile d'olive</li>
        <li>sel</li>
    </ul>

    <h5>Etapes:</h5>
    <ul class="etapes">
        <li>Dans un généreux fond d'huile d'olive, faire revenir le poulet, le concentré de tomates et les épices (sauf le tabel karouia) pendant 2 minutes max, puis verser un grand bol d'eau chaude.</li>
        <li>Pendant que cela mijote à feu doux, éplucher les gousses d'ail, et les piler avec le tabel karouia.</li>
        <li>Ajouter le tout à la préparation, ainsi qu'une cs de sel.</li>
        <li>Ajouter un litre d'eau bouillante, puis laisser cuire à feu moyen pendant 30 minutes environ.</li>
        <li>Une fois la sauce réduite, ajouter 4 piments fendus sur leur longueur, et laisser cuire 10 minutes de plus.</li>
        <li>Cuire les pâtes, mélanger à la sauce, décorer avec la viande et les piments.</li>
        <li>Servir immédiatement.</li>
    </ul>

</div>

<?php
if($user == "aymen"){
    echo     '<button><a href="update.php">Update</a></button>';
    echo     '<button class="delete"><a href="delete.php" >Delete</a></button>';
}
?>


<footer>Copyright &copy; Team 2023</footer>

</body>
</html>

