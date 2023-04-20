<?php
require_once 'RecipesRepository.php';
$rep = new RecipesRepository('recipes');

$pageTitle = 'Recipes | Recipe';
include 'fragments/header.php';

$recipeNameWanted = isset($_GET['search']) ? $_GET['search'] : '';

if ($recipeNameWanted) {
    $recipe = $rep->findByNom($recipeNameWanted);
    if (!$recipe) {
        echo "<div>No Recipe to display ..</div>";
    } else {
        ?>
        <ul class="recipes">
            <a href="details.php?id=<?= $recipe->id; ?>">
                <li class="recipe">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                    <h4><?= $recipe->nom; ?><h4>
                    <p>By <?= $recipe->author; ?></p>
                </li>
            </a>
        </ul>
    <?php } ?>
<?php } ?>
