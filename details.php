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
<div class="details">
    <h2><?= $recipe->nom ?></h2>
    <img src="<?=$dataUri?>" alt="recipe img">
    <p>By <?= $recipe->author?></p>

    <h5>Ingrédients:</h5>
    <ul class="ingrediants">
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

<?php
if(isset($_SESSION['name'])){
    if($_SESSION['name'] === $recipe->author){ ?>
        <button><a href="update.php?id=<?= $recipe->id;?>">Update</a></button>
        <button class="delete"><a href="delete.php?id=<?= $recipe->id;?>">Delete</a></button>
<?php
    }
}
?>

<?php
include 'comments.php';
?>

<?php
include 'fragments/footer.php';
?>

