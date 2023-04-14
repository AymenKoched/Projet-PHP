<?php
$pageTitle = 'Recipes | Update-Recipe';
include 'fragments/header.php';

$id = htmlentities($_GET['id']);

require_once ('RecipesRepository.php');
$rep= new RecipesRepository("recipes");
$recipe = $rep->findById($id);
?>

<form action="mofifierRecipe.php" method="post" enctype="multipart/form-data">
    <h2>Update Recipe</h2>

    <label for="title">Nom</label>
    <input type="text" name="nom" id="title" value="<?=$recipe->nom?>" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="<?=$recipe->author?>" required />

    <label for="ingredients">Ingrédients (separate with '-')</label>
    <textarea id="ingredients" name="ingrediants"><?=$recipe->ingrediants?></textarea>

    <label for="etapes">Etapes (separate with '-')</label>
    <textarea id="etapes" name="etapes"><?=$recipe->etapes?></textarea>

    <label for="rating">Rating</label>
    <input id="rating"  type="number" name="rating" value="<?=$recipe->rating?>" required>

    <label for="categories">Categories</label>
    <select id="categories" name="categories"  required>
        <option selected><?=$recipe->categorie?></option>
        <option value="Tounsia">Tounsia</option>
        <option value="Arbia">Arbia</option>
        <option value="Souri">Souri</option>
        <option value="7arra">7arra</option>
        <option value="7loua">7loua</option>
    </select>

    <input hidden="hidden" name="id" type="number" class="form-control" value="<?=$recipe->id?>" >

    <button type="submit">Update</button>
</form>


<?php
include 'fragments/footer.php';
?>

