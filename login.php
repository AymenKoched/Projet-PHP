<?php
session_start();
$pageTitle = 'Recipes | Login';
include 'requireGuest.php';
include_once 'fragments/header.php';

if(isset($_SESSION["erreur"])){
	$erreur = $_SESSION["erreur"];
	unset($_SESSION["erreur"]);
}
?>

<form action="loginProcess.php" method="post" enctype="multipart/form-data">
    <h2>Log in</h2>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required />
    <button type="submit">Log in</button>
    <br>
    <?php
    if(isset($erreur))
	 echo "<script type='text/javascript'>alert('$erreur');</script>";
    ?>
    <br>
    <br>
    <p>Don't have an account yet?<button><a href="signUp.php">Sign Up</a></button></p>
</form>
<?php
include 'fragments/footer.php';
?>

