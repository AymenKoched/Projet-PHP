<?php
$pageTitle = 'Recipes | Index';
include 'fragments/header.php';
?>

<!--<ul class="recipes">-->
<!--    <a href="details.php">-->
<!--    <li class="recipe">-->
<!--        <img src="uploads/recipe1.jpeg" alt="recipe img">-->
<!--        <h4>Makarouna bel djej</h4>-->
<!--        <p>By Aymen</p>-->
<!--    </li></a>-->
<!---->
<!--    <a href="details.php">-->
<!--    <li class="recipe">-->
<!--        <img src="uploads/recipe2.jpeg" alt="recipe img">-->
<!--        <h4>Koskssi bl l7am </h4>-->
<!--        <p>By Hbib</p>-->
<!--    </li></a>-->
<!---->
<!--    <a href="details.php">-->
<!--    <li class="recipe">-->
<!--        <img src="uploads/recipe3.jpg" alt="recipe img">-->
<!--        <h4>Kamounia</h4>-->
<!--        <p>By Ala</p>-->
<!--    </li></a>-->

    <?php
    require_once ('RecipesRepository.php');
    $rep= new RecipesRepository("recipes");
    $recipes = $rep->findAll();

    if(!$recipes){
        echo "<div>No Recipes to display ..</div>";
    }

    ?>

    <ul class="recipes">
    <?php
        foreach ($recipes as $recipe) {
        $nom=$recipe->nom;
        $author=$recipe->author;
        $image=$recipe->image;
        $dataUri = 'data:image/jpeg;base64,' . base64_encode($image);
        ?>
            <a href="details.php?id=<?= $recipe->id;?>">
            <li class="recipe">
                <img src="<?=$dataUri?>" height ="300" width="300" alt="recipe img">
                <h4><?= $nom?><h4>
                <p><?=$author?></p>
            </li>
            </a>
    <?php } ?>
    </ul>

<?php
include 'fragments/footer.php';
?>