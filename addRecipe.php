<?php
$pageTitle = 'Recipes | Add-Recipe';
include 'fragments/header.php';
include 'requireAuthenticated.php';
?>


<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Add Recipe</h2>

    <label for="title">Nom</label>
    <input type="text" name="nom" id="title" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" readonly required value="<?= $_SESSION["name"] ?>"/>

    <label for="ingredients">Ingredients (separated with new lines)</label>
    <textarea id="ingredients" name="ingredients"></textarea>

    <label for="etapes">Steps (separated with new lines)</label>
    <textarea id="etapes" name="etapes"></textarea>

    <label for="image">Image</label>
    <input id="image" type="file" name="my_image" accept="image/*" required>

    <label for="categories">Region</label>
    <select id="categories" name="categories" required>
        <option selected disabled>Open this select menu</option>
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

    <button type="submit">SUBMIT</button>

</form>

<?php
include 'fragments/footer.php';
?>
