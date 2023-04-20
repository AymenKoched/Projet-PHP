<form action="addCommentProcess.php" method="post" enctype="multipart/form-data">
    <h2>Add Recipe</h2>

    <label for="title">Nom</label>
    <input type="text" name="nom" id="title" required />

    <label for="author">Author</label>
    <input type="text" name="author" id="author" readonly required value="<?= $_SESSION["name"] ?>"/>

    <label for="ingredients">Ingrédients (separate with '-')</label>
    <textarea id="ingredients" name="ingredients"></textarea>

    <label for="etapes">Etapes (separate with '-')</label>
    <textarea id="etapes" name="etapes"></textarea>

    <label for="image">Image</label>
    <input id="image" type="file" name="my_image" required>

    <label for="rating">Rating</label>
    <input id="rating"  type="number" name="rating" required>

    <label for="categories">Categories</label>
    <select id="categories" name="categories" required>
        <option selected>Open this select menu</option>
        <option value="Tounsia">Tounsia</option>
        <option value="Arbia">Arbia</option>
        <option value="Souri">Souri</option>
        <option value="7arra">7arra</option>
        <option value="7loua">7loua</option>
    </select>

    <button type="submit">Create</button>
    <input type="hidden" name="recipe_added" value="1">

</form>