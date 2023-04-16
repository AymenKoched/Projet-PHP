<?php session_start();
include 'requireGuest.php';

include_once 'UserRepository.php';
$UserRepository = new UserRepository('user');
$admin = $UserRepository->findByEmail("admin@admin.com");
if (!isset($admin))
    $UserRepository->Create(['email' => "admin@admin.com", 'pwd' => "admin", 'name' => "admin"]);
if(isset($_GET["message"])) $message = $_GET["message"];
?>

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
    <h1><a href="index.php">Cooking Recipes Collection</a></h1>
</nav>

