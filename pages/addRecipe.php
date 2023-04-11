<?php
$pageTitle = 'Recipes | Add-Recipe';
include 'fragments/header.php';
?>


<form action="">
    <h2>Add Recipe</h2>
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

    <button type="submit">Create</button>
</form>


<?php
include 'fragments/footer.php';
?>

