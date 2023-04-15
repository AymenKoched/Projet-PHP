<?php
$pageTitle = 'Recipes | Details';
include 'fragments/header.php';

$id = htmlentities($_GET['id']);

require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->findById($id);

$image=$recipe->image;
$dataUri = 'data:image/jpeg;base64,' . base64_encode($image);

?>


<!--
<div class="details">
    <h2>Makarouna bel djej</h2>
    <img src="uploads/recipe1.jpeg" alt="recipe img">
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
-->

<div class="details">
    <h2><?= $recipe->nom ?></h2>
    <img src="<?=$dataUri?>" alt="recipe img">
    <p><?= $recipe->author?></p>

    <h5>Ingrédients:</h5>
    <ul class="ingrediants" >
        <?php
        $ingrediants = explode('-', $recipe->ingrediants);
        $ingrediants = array_map('trim', $ingrediants);
        foreach ($ingrediants as $element){
            if ($element != "")
            echo "<li>$element</li>";
        }
        ?>
    </ul>


    <h5>Etapes:</h5>
    <ul class="etapes">
        <?php
        $etapes = explode('-', $recipe->etapes);
        $etapes = array_map('trim', $etapes);
        foreach ($etapes as $etape){
            if ($etape !="" )
            echo "<li>$etape</li>";
        }
        ?>
    </ul>

    <h5>Categorie: <?= $recipe->categorie ?></h5>

    <h5>Rating: <?= $recipe->rating?></h5>

</div>

<button><a href="update.php?id=<?= $recipe->id;?>">Update</a></button>
<button class="delete"><a href="delete.php?id=<?= $recipe->id;?>" >Delete</a></button>

<?php
include 'fragments/footer.php';
?>

