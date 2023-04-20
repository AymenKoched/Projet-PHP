<?php
session_start();
?>
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
    <h1><a href="index.php">Cooking Recipes Collection</a></h1>
    <ul>
        <li><input class ="search" placeholder="Search your best dish!"></li>
        <!-- we can add hover effect -->
        <?php if(isset($_SESSION["name"])) { ?>
        <li>Welcome, <?= $_SESSION["name"] ?></li>
        <?php } ?>
        <li><a href="addRecipe.php">Add a Recipe</a></li>
        <li><a href="../about.php">About</a></li>
        <li><a href="../contact.php">Contact</a></li>
        <?php  if(isset($_SESSION["user"])) {?>
        <li><a href="logout.php" class="btn">Log out</a></li>
        <?php }  else { ?>
            <li><a href="signUp.php" class="btn">Sign Up</a></li>
            <li><a href="login.php" class="btn">Log In</a></li>
        <?php  } ?>
    </ul>
</nav>
