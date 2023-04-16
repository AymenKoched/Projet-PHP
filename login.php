<?php
include_once 'fragments/header2.php';



?>
<form action="loginProcess.php" method="post" enctype="multipart/form-data">
    <h2>Log in</h2>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" required />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required />
    <button type="submit">Log in</button>
    <br>
    <?php
    if(isset($message)){ ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php } ?>
    <br>
    <br>
    <br>
    <p>You don't have an account? <button><a href="signUp.php">Sign Up</a></button></p>
</form>
<?php
include 'fragments/footer.php';
?>

