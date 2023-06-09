<?php
$pageTitle = 'Recipes | Home';
include 'fragments/header.php';

require_once 'database_access/RecipesRepository.php';
require_once 'database_access/BookmarkRepository.php';
$rep = new RecipesRepository();
$bookm = new BookmarkRepository();
?>

<h5 class="dishes">Dishes</h5>
<?php
if(isset($_GET["region"])) { ?>
    <h3 class="cat-below-title">Of <?=$_GET["region"] ?> </h3>
<?php } ?>

<?php if(!isset($_GET["region"])) { ?>
<div class="orderby" ><div class="title">Tap to Order Recipes by:</div>
    <div class="order">
        <a href="index.php?tri=visit" class="see" >Visits</a>
        <a href="index.php?tri=bookmarks"  class="see">Bookmarks</a>
        <a href="index.php"  class="see">Most Recently Added</a>
    </div>
</div>
<?php } else { ?>
        <div class="order" style="justify-content: center">
            <a href="index.php"  class="see" >See All Recipes</a>
        </div>
<?php } ?>



<?php
$isbookmark = false;
if (isset($_GET["tri"]) && $_GET["tri"]== "visit") {
    $recipes = $rep->findAllOrderedByVisits();
}else if( isset($_GET["tri"]) && $_GET["tri"]== "bookmarks") {
    $recipes = $bookm->findAllOderedByBookmarks();
    $isbookmark = true;
}
else if (isset($_GET['region']) && !empty($_GET['region'])) {
    $recipes = $rep->findByRegion($_GET['region']);
}
else {
    $recipes = $rep->findAll();
}
?>

<?php
if (!$recipes) { ?>
    <div style='margin-top: 20px; text-align: center; font-weight: 700; font-size: 30px;'>No Recipes to display <i class="fa-solid fa-heart-crack" style="color: #514d47; font-size: 23px;"></i> ..</div>

   <?php } else {
    ?>
    <ul class="plats">
        <?php


        $count = 0;

        foreach ($recipes as $recipe) {
            if ($isbookmark == true) {
                $recipe = $rep->findById($recipe->recipeId);
            }

            $count++;

            if($count<=9) {

                ?>
            <div class="plat">
                <div class="plat-img">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" object-fit="cover"; alt="recipe img">
                </div>
                <div class="plat-info">
                    <p class="plat-name"><strong><?= strtoupper($recipe->name); ?> </strong></p>
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
                    <p class="plat-region"><strong>Region : </strong><?= $recipe->region ?></p>
                    <div class="plat-details">
                        <a href="/details.php?id=<?= $recipe->id; ?>" class="see" style="font-weight: 600">See Details</a>
                    </div>
                </div>
            </div>

        <?php }  else  {  ?>
                <div class="plat hide">
                    <div class="plat-img">
                        <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                    </div>
                    <div class="plat-info">
                        <p class="plat-name"><strong><?= strtoupper($recipe->name); ?> </strong></p>
                        <p class="plat-author"><strong>Author</strong> : <?= $recipe->author; ?> </p>
                        <p class="plat-admiration"><strong>Bookmarks </strong> : <?php if ($bookm->findBookmarksByRecipeId($recipe->id)) {
                            echo($bookm->findBookmarksByRecipeId($recipe->id)); }
                            else {
                                echo(0);
                            }      ?>
                        </p>
                        <p class="plat-visitors"><strong>Visits Overall</strong> :
                        <?= $recipe->visits ?>
                        </p>
                        <p class="plat-region"><strong>Region : </strong><?= $recipe->region ?></p>
                        <div class="plat-details">
                        <a href="/details.php?id=<?= $recipe->id; ?>" class="see" style="font-weight: 600">See Details</a>
                        </div>
                </div>
            </div>
        <?php } } ?>
    </ul>
    <div class="below">
        <div class="prv"> &laquo; Previous</div>
        <div class="nbr">1</div>
        <div class="next">Next &raquo;</div>
    </div>
    <?php
}
?>
<?php
include 'fragments/footer.php';
?>
