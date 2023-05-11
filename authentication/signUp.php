<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
$pageTitle = 'Recipes | Sign up';
include 'requireGuest.php';
include_once 'fragments/header.php';
?>

<form action="signupProcess.php" method="post">
    <h2>Sign up</h2>
    <label for="name">Display Name</label>
    <input type="text" name="name" id="name" required />
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" minlength="8" required/>
    <button type="submit">Sign Up</button>
    <br>
</form>
<?php
include_once 'fragments/footer.php'?>
