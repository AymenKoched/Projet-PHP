<?php
$pageTitle = 'Recipes | Home';
include 'fragments/header.php';

require_once 'RecipesRepository.php';
require_once 'BookmarkRepository.php';
$rep = new RecipesRepository('recipes');
$bookm = new BookmarkRepository("bookmarks");


?>

<h3 class="dishes">Dishes</h3>
Order By :
<a href="index.php?tri=visit" class="see" >Visits</a>
<a href="index.php?tri=bookmarks"  class="see">Bookmarks</a>
<?php
$isbookmark = false;
if (isset($_GET["tri"]) && $_GET["tri"]== "visit") {
    $recipes = $rep->findAllOrderedByVisits();
}else if( isset($_GET["tri"]) && $_GET["tri"]== "bookmarks") {
    $recipes = $bookm->findAllOderedByBookmarks();
    $isbookmark = true;
}
else if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $recipes = $rep->findByCategory($_GET['categorie']);
}
else {
    $recipes = $rep->findAll();
}
?>

    <?php

if (!$recipes) {
    echo "<div>No Recipes to display ..</div>";
} else {
    ?>
    <ul class="plats">
        <?php
        foreach ($recipes as $recipe) {
            if ($isbookmark == true) {
                $recipe = $rep->findById($recipe->recipeID);
            };
            ?>

            <div class="plat">
                <div class="plat-img">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                </div>
                <div class="plat-info">
                    <p class="plat-name"><strong><?= strtoupper($recipe->nom); ?> </strong></p>
                    <p class="plat-author"><strong>Author</strong> : <?= $recipe->author; ?> </p>
                    <p class="plat-admiration"><strong>Bookmarks </strong> : <?php if ($bookm->findBookmarksByRecipeId($recipe->id)) {
                        echo($bookm->findBookmarksByRecipeId($recipe->id)); }
                         else {
                             echo(0);
                         }   ?>
                    </p>
                    <p class="plat-visitors"><strong>Visits Overall</strong> :
                        <?= $recipe->visits ?>
                    </p>
                    <div class="plat-details">
                        <a href="details.php?id=<?= $recipe->id; ?>" class="see">See Details</a>
                    </div>
                </div>
            </div>
            </div>

        <?php } ?>
    </ul>
    <?php
}
?>
<?php
include 'fragments/footer.php';
?>
