<?php
$pageTitle = 'Recipes | Home';
include 'fragments/header.php';

require_once 'RecipesRepository.php';
$rep = new RecipesRepository('recipes');

if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $recipes = $rep->findByCategory($_GET['categorie']);
} else {
    $recipes = $rep->findAll();
}

if (!$recipes) {
    echo "<div>No Recipes to display ..</div>";
} else {
    ?>
    <ul class="recipes">
        <?php foreach ($recipes as $recipe) { ?>
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
