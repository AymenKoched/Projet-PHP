<?php

require_once 'RecipesRepository.php';
require_once 'BookmarkRepository.php';
$rep = new RecipesRepository('recipes');
$pageTitle = 'Recipes | Recipe';
include 'fragments/header.php';
$req= new BookmarkRepository("bookmarks");
$recipeNameWanted = isset($_GET['search']) ? $_GET['search'] : '';
if ($recipeNameWanted) {
    $recipes = $rep->searchByName($recipeNameWanted);
    if (!$recipes) { ?>
        <div style='margin-top: 20px; text-align: center; font-weight: 700; font-size: 30px;'>No Recipes to display <i class="fa-solid fa-heart-crack" style="color: #514d47; font-size: 23px;"></i> ..</div>
    <?php } else { ?>
        <ul class="plats">
            <?php foreach ($recipes as $recipe) { ?>
            <div class="plat">
                <div class="plat-img">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                </div>
                <div class="plat-info">
                    <p class="plat-name"><strong><?= strtoupper($recipe->nom); ?> </strong></p>
                    <p class="plat-author"><strong>Author</strong> : <?= $recipe->author; ?></p>
                    <p class="plat-admiration"><strong>Bookmarks </strong> : <?php if ($req->findBookmarksByRecipeId($recipe->id)) {
                            echo($req->findBookmarksByRecipeId($recipe->id)); }
                        else {
                            echo(0);
                        }   ?>
                    </p>
                    <p class="plat-visitors"><strong>Visits Overall</strong> :
                        <?= $recipe->visits ?>
                    </p>
                    <p class="plat-region"><strong>Region : </strong><?= $recipe->categorie ?></p>
                    <div class="plat-details">
                        <a href="details.php?id=<?= $recipe->id; ?>" class="see" style="font-weight: 600">See Details</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } ?>
<?php
include 'fragments/footer.php';
?>