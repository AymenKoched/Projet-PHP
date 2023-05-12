<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$pageTitle = 'Bookmarks';
include 'fragments/header.php';
require_once 'database_access/BookmarkRepository.php';
require_once 'database_access/RecipesRepository.php';
$email = $_SESSION['user'];

$req= new BookmarkRepository();
$recipesIDs = $req->findRecipeByEmail($email);

if (!$recipesIDs) { ?>
    <div style='margin-top: 20px; text-align: center; font-weight: 700; font-size: 30px;'>No Recipes to display <i class="fa-solid fa-heart-crack" style="color: #514d47; font-size: 23px;"></i> ..</div>
   <?php } else { ?>
    <ul class="plats">
        <?php foreach ($recipesIDs as $recipesID) {
            $req1= new RecipesRepository();
            $recipe = $req1->findById($recipesID->recipeID);
            ?>
        <div class="plat">
            <div class="plat-img">
                <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
            </div>
        <div class="plat-info">
            <p class="plat-name"><strong><?= strtoupper($recipe->nom); ?> </strong></p>
            <p class="plat-author"><strong>Author</strong> : <?= $recipe->author; ?> </p>
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
                <a href="/details.php?id=<?= $recipe->id; ?>" class="see" style="font-weight: 600">See Details</a>
            </div>
        </div>
        </div>

        <?php } ?>
    </ul>
    <?php
}
include 'fragments/footer.php';
?>
