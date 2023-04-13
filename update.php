<?php
$pageTitle = 'Recipes | Update-Recipe';
include 'fragments/header.php';
?>

<form action="">
    <h2>Update Recipe</h2>
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required />
    <label for="author">Author</label>
    <input type="text" name="author" id="author" required />
    <label for="ingredients">Ingrédients (separate with '-')</label>
    <textarea id="ingredients" name="ingredients"></textarea>
    <label for="etapes">Etapes (separate with '-')</label>
    <textarea id="etapes" name="etapes"></textarea>
    <label for="image">Image</label>
    <input id="image" class="form-control" type="file" name="image">

    <button type="submit">Update</button>
</form>


<?php
include 'fragments/footer.php';
?>

