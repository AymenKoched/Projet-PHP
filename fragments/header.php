<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($pageTitle)){echo $pageTitle;} else {echo 'Home';}?> </title>
    <link rel="stylesheet" href="/assets/styles.css">
    <link rel="icon" href="/assets/favicon.svg">
    <script defer src="https://kit.fontawesome.com/79198b1732.js" crossorigin="anonymous"></script>
    <script defer src="/scripts/bookmark.js"></script>
    <script defer src="/scripts/seeAll.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<nav id="nav-bar">
    <h1><a href="/index.php"><img src="/assets/logo.png"></a></h1>
    <ul>
        <form method="GET" action="/search/SearchRecipe.php" class="searchForm">
            <li><input class ="search" name="search" placeholder="Search your best dish!"></li>
        </form>
        <!-- we can add hover effect -->
        <?php if(isset($_SESSION["name"])) { ?>
        <li>Welcome, <?= $_SESSION["name"] ?></li>
        <?php } ?>
        <li><a href="/recipes_crud/addRecipe.php">Add a Recipe</a></li>
        <li><a href="/search/region.php">Search By Region</a></li>

        <li><a href="/about.php">About</a></li>
        <?php  if(isset($_SESSION["user"])) {?>
            <!-- elpage hathy thezk lil bookmarks mta3ek-->
            <li><a href="/bookmarks/bookmarks.php"><i class="fa-regular fa-bookmark" style="color: #fee996;"></i> BOOKMARKS</a></li>
            <li><a href="/authentication/logout.php" class="btn">Log out</a></li>
        <?php }  else { ?>
            <li><a href="/authentication/signUp.php" class="btn">Sign Up</a></li>
            <li><a href="/authentication/login.php" class="btn">Log In</a></li>
        <?php  } ?>
    </ul>
</nav>

<?php
if(isset($_SESSION["erreur"])){
	$erreur = $_SESSION["erreur"];
	unset($_SESSION["erreur"]);
}
?>
