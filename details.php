<?php
$pageTitle = 'Recipes | Details';
include 'fragments/header.php';
include_once 'BookmarkRepository.php';
$id = htmlentities($_GET['id']);

require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->findById($id);

$image=$recipe->image;
$dataUri = 'data:image/jpeg;base64,' . base64_encode($image);

$email = $_SESSION["user"];
$id = $_GET["id"];
$rep= new BookmarkRepository('bookmarks');
$recipee = $rep->findByRecipeAndUser($email,$id);


?>
<div class="details">
    <h2><?= $recipe->nom ?></h2>
    <div class="img-container">
    <img src="<?=$dataUri?>" alt="recipe img">
    </div>

    <div class="flex">
        <div class="time">
            <i class="fa-regular fa-clock" style="color: #f59f7b;"></i>
            45 MINUTES
        </div>
        <div class="bkmark">
            <?php
            if(isset($recipee->recipeID)) {
            ?>
            <div><a href="bookmarkProcess.php?id=<?= $id ?>"><i class="fa-regular fa-bookmark bkm" style="color: #ffffff;"></i></a></div>
            <div class="message"></div>
            <?php } else {  ?>
                <div><a href="bookmarkProcess.php?id=<?= $id ?>"><i class="fa-solid fa-bookmark bkm" style="color: #ffffff;"></i></a></div>
                <div class="message"></div>
             <?php } ?>
        </div>
    </div>

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
    <p>By <?= $recipe->author?></p>
</div>

<?php
if(isset($_SESSION['name'])){
    if($_SESSION['name'] === $recipe->author){ ?>
        <button><a href="update.php?id=<?= $recipe->id;?>">Update</a></button>
        <button class="delete"><a href="deleteRecipesProcess.php?id=<?= $recipe->id;?>">Delete</a></button>
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

