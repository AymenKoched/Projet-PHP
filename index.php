<?php
$pageTitle = 'Recipes | Index';
include 'fragments/header.php';
?>
    <?php if(isset($_GET["welcome"])) { ?>
        <div style="text-align: center"><strong>Welcome, <?=$_GET["welcome"]?></strong></div>
    <?php } ?>
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
