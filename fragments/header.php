<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($pageTitle)){echo $pageTitle;} else {echo 'Home';}?> </title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
<nav>
    <h1><a href="home.php">Cooking Recipes Collection</a></h1>
    <ul>
        <li>Welcome, Admin</li>
        <li><a href="addRecipe.php">Add a Recipe</a></li>
        <li><a href="../about.php">About</a></li>
        <li><a href="../contact.php">Contact</a></li>
        <li><a href="logout.php" class="btn">Log out</a></li>
    </ul>
</nav>
