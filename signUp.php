<?php
include_once 'fragments/header2.php';



?>
<form action="signupProcess.php" method="post">
    <label for="name">Display Name</label>
    <input type="text" name="name" id="name" required />
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required />
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required/>
    <button type="submit">Sign Up</button>
    <br>
    <?php if(isset($_GET["erreur"])) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $_GET["erreur"]?>
    </div>
    <?php } ?>
</form>
<?php
include_once 'fragments/footer.php'?>