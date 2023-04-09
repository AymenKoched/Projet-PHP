<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes | Update Recipe </title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
<nav>
    <h1><a href="home.php">Cooking Recipes Collection</a></h1>
    <ul>
        <li>Welcome, foulen@google.com</li>
        <li><a href="addRecipe.php">Add a Recipe</a></li>
        <li><a href="logout.php">Log out</a></li>
    </ul>
</nav>

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


<footer>Copyright &copy; Team 2023</footer>

</body>
</html>
