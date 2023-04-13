<?php
$pageTitle = 'Recipes | Add-Recipe';
include 'fragments/header.php';
?>


<form action="ajouterRecipe.php" method="post" enctype="multipart/form-data">
    <h2>Add Recipe</h2>

    <label for="title">Nom</label>
    <input type="text" name="nom" id="title" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" required />

    <label for="ingredients">Ingrédients (separate with '-')</label>
    <textarea id="ingredients" name="ingredients"></textarea>

    <label for="etapes">Etapes (separate with '-')</label>
    <textarea id="etapes" name="etapes"></textarea>

    <label for="image">Image</label>
    <input id="image" class="form-control" type="file" name="image" required>

    <label for="rating">Rating</label>
    <input id="rating" class="form-control" type="number" name="rating">

    <label for="categories">Categories</label>
    <select id="categories" name="categories" class="form-select" aria-label="Default select example">
        <option selected>Open this select menu</option>
        <option value="Tounsia">Tounsia</option>
        <option value="Arbia">Arbia</option>
        <option value="Souri">Souri</option>
        <option value="7arra">7arra</option>
        <option value="7loua">7loua</option>
    </select>

    <button type="submit">Create</button>
</form>


<?php
include 'fragments/footer.php';
?>

