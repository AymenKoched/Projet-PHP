<?php
$pageTitle = 'Bookmarks';
include 'fragments/header.php';
require_once 'BookmarkRepository.php';
require_once 'RecipesRepository.php';
$email = $_SESSION['user'];

$req= new BookmarkRepository("bookmarks");
$recipesIDs = $req->findRecipeByEmail($email);
if (!$recipesIDs) {
    echo "<div>No Recipes to display ..</div>";
} else {
    ?>
    <ul class="recipes">
        <?php foreach ($recipesIDs as $recipesID) {
            $req1= new RecipesRepository("recipes");
            $recipe = $req1->findById($recipesID->recipeID);
            ?>
            <a href="details.php?id=<?= $recipe->id; ?>">
                <li class="recipe">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                    <h4><?= $recipe->nom; ?><h4>
                            <p>By <?= $recipe->author; ?></p>
                </li>
            </a>
        <?php } ?>
    </ul>
    <?php
}


include 'fragments/footer.php';
?>