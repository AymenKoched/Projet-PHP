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


$id = $_GET["id"];
$rep= new BookmarkRepository('bookmarks');
?>

<div class="details">
    <div class="img-container">
        <img src="<?=$dataUri?>" alt="recipe img">
    </div>

    <h2 class="recName"><?= strtoupper($recipe->nom) ?></h2>
    <div class="flex">

        <?php if(!isset($_SESSION["user"])) { ?>
        <div class="time" style="width: 100%">
            <i class="fa-regular fa-clock" style="color: darkred;"></i>
            45 MINUTES
        </div>
        <?php } else { ?>
        <div class="time">
            <i class="fa-regular fa-clock" style="color: darkred;"></i>
            45 MINUTES
        </div>
        <?php } ?>


        <?php if(isset($_SESSION["user"])) {
            $email =$_SESSION["user"] ;
            $recipee = $rep->findByRecipeAndUser($email,$id); ?>
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
        <?php } ?>
    </div>

    <h5 class="recIngre">RECIPE INGREDIENTS</h5>
    <ul class="ingrediants">
        <?php
        $ingrediants = explode('-', $recipe->ingrediants);
        $ingrediants = array_map('trim', $ingrediants);
        foreach ($ingrediants as $element){
            if ($element != ""){ ?>
                <div class="list-item">
                    <i class="fa-solid fa-check" style="color: #FEE996;"></i>
                    <li> <?= $element ?> </li>
                </div>
        <?php }} ?>
    </ul>

    <h5 class="how">HOW TO COOK IT</h5>
    <ul class="etapes">
        <?php
        $etapes = explode('-', $recipe->etapes);
        $etapes = array_map('trim', $etapes);
        foreach ($etapes as $etape){
            if ($etape !="" ) { ?>
             <li><?= $etape ?></li>
        <?php }} ?>
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

