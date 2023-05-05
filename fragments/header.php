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
    <script defer src="https://kit.fontawesome.com/79198b1732.js" crossorigin="anonymous"></script>
    <script defer src="scripts/bookmark.js"></script>
</head>

<body>
<nav id="nav-bar">
    <h1><a href="index.php"><img src="logo.png"></a></h1>
    <ul>
        <form method="GET" action="SearchRecipe.php" class="searchForm">
            <li><input class ="search" name="search" placeholder="Search your best dish!"></li>
        </form>
        <!-- we can add hover effect -->
        <?php if(isset($_SESSION["name"])) { ?>
        <li>Welcome, <?= $_SESSION["name"] ?></li>
        <?php } ?>
        <li><a href="addRecipe.php">Add a Recipe</a></li>
        <li><a href="../category.php">Search By Region</a></li>

        <!-- temchi ellouta -->
        <li><a href="#about">About</a></li>
        <?php  if(isset($_SESSION["user"])) {?>
            <!-- elpage hathy thezk lil bookmarks mta3ek-->
            <li><a href="bookmarks.php"><i class="fa-regular fa-bookmark" style="color: #fee996;"></i> BOOKMARKS</a></li>
            <li><a href="logout.php" class="btn">Log out</a></li>
        <?php }  else { ?>
            <li><a href="signUp.php" class="btn">Sign Up</a></li>
            <li><a href="login.php" class="btn">Log In</a></li>
        <?php  } ?>
    </ul>
</nav>