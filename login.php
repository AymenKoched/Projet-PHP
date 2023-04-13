<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipes | Login</title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
<nav>
    <h1><a href="home.php">Cooking Recipes Collection</a></h1>
</nav>

<form action="">
    <h2>Log in</h2>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required />
    <button type="submit">Log in</button>
</form>



<?php
include 'fragments/footer.php';
?>

