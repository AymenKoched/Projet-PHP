<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$pageTitle = 'Recipes | Update-Recipe';
include 'fragments/header.php';

$id = htmlentities($_GET['id']);

require_once ('database_access/RecipesRepository.php');
$rep= new RecipesRepository();
$recipe = $rep->findById($id);
$image = $recipe->image;
$DataUri='data:image/jpeg;base64,' . base64_encode($image)
?>
<form action="updateRecipeProcess.php" method="post" enctype="multipart/form-data" class="recipe-form">
    <h2>Update Recipe</h2>

    <label for="title">Recipe Name</label>
    <input type="text" name="name" id="title" value="<?=$recipe->name?>" maxlength="64" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" value="<?=$recipe->author?>" readonly required />

    <label for="ingredients">Ingredients (separated with new lines)</label>
    <textarea id="ingredients" name="ingrediants" rows="10"><?=$recipe->ingrediants?></textarea>

    <label for="steps">Steps (separated with new lines)</label>
    <textarea id="steps" name="steps" rows="10"><?=$recipe->steps?></textarea>

    <label for="cooktime">Cooking time (minutes)</label>
    <input type="number" name="cooktime" id="cooktime" value="<?=$recipe->cooktime?>" min="2" max="360" required>

    <label for="image">Image</label>
    <img src="<?= $DataUri ?>" height="100" width="100" alt="recipe image">
    <input id="image-upload" type="file" name="my_image" accept="image/*">

    <label for="region">Region (optional)</label>
    <select id="region" name="region">
        <option selected><?=$recipe->region?></option>
        <option value="Nabeul">Nabeul</option>
        <option value="Touzeur">Touzeur</option>
        <option value="Manubah">Manubah</option>
        <option value="Béja">Béja</option>
        <option value="Ben Arous">Ben Arous</option>
        <option value="Bizerte">Bizerte</option>
        <option value="Jendouba">Jendouba</option>
        <option value="Nabeul">Nabeul</option>
        <option value="Tunis">Tunis</option>
        <option value="Le Kef">Le Kef</option>
        <option value="Kasserine">Kasserine</option>
        <option value="Gabes">Gabes</option>
        <option value="Gafsa">Gafsa</option>
        <option value="Sidi Bouzid">Sidi Bouzid</option>
        <option value="Sfax">Sfax</option>
        <option value="Siliana">Siliana</option>
        <option value="Mahdia">Mahdia</option>
        <option value="Monastir">Monastir</option>
        <option value="Kairouan">Kairouan</option>
        <option value="Sousse">Sousse</option>
        <option value="Zaghouan">Zaghouan</option>
        <option value="Médenine">Médenine</option>
        <option value="Kebili">Kebili</option>
        <option value="Tatouine">Tatouine</option>
    </select>

    <input hidden="hidden" name="id" type="number" class="form-control" value="<?=$recipe->id?>" >

    <button type="submit">Update</button>
</form>


<?php
include 'fragments/footer.php';
?>

