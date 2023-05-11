<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$pageTitle = 'Recipes | Add-Recipe';
include 'fragments/header.php';
include 'authentication/requireAuthenticated.php';
?>


<form action="addRecipeProcess.php" method="post" enctype="multipart/form-data" class="recipe-form">
    <h2>Add Recipe</h2>

    <label for="title">Recipe Name</label>
    <input type="text" name="nom" id="title" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" readonly required value="<?= $_SESSION["name"] ?>"/>

    <label for="ingredients">Ingredients (separated with new lines)</label>
    <textarea id="ingredients" name="ingredients" rows="10"></textarea>

    <label for="etapes">Steps (separated with new lines)</label>
    <textarea id="etapes" name="etapes" rows="10"></textarea>

    <label for="image">Image</label>
    <input id="image" type="file" name="my_image" accept="image/*" required>

    <label for="categories">Region</label>
    <select id="categories" name="categories" required>
        <option selected disabled>Open this select menu</option>
        <option value="Béja">Béja</option>
        <option value="Ben Arous">Ben Arous</option>
        <option value="Bizerte">Bizerte</option>
        <option value="Le Kef">El Kef</option>
        <option value="Gabes">Gabes</option>
        <option value="Gafsa">Gafsa</option>
        <option value="Jendouba">Jendouba</option>
        <option value="Kairouan">Kairouan</option>
        <option value="Kasserine">Kasserine</option>
        <option value="Kebili">Kebili</option>
        <option value="Mahdia">Mahdia</option>
        <option value="Manubah">Manubah</option>
        <option value="Médenine">Médenine</option>
        <option value="Monastir">Monastir</option>
        <option value="Nabeul">Nabeul</option>
        <option value="Sfax">Sfax</option>
        <option value="Sidi Bouzid">Sidi Bouzid</option>
        <option value="Siliana">Siliana</option>
        <option value="Sousse">Sousse</option>
        <option value="Tatouine">Tatouine</option>
        <option value="Touzeur">Touzeur</option>
        <option value="Tunis">Tunis</option>
        <option value="Zaghouan">Zaghouan</option>
    </select>

    <button type="submit">SUBMIT</button>

</form>

<?php
include 'fragments/footer.php';
?>
