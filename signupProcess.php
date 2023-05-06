<?php
session_start();
include_once 'UserRepository.php';

$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["password"];
$UserRepository = new UserRepository('user');
$user1 = $UserRepository->findByEmail($email);
$user2 = $UserRepository->findByName($name);

if($user1) {
    header("location:signUp.php?erreur=Email déja existant !");
} elseif ($user2){
    header("location:signUp.php?erreur=Display Name déja existant !");
} else {
    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    $UserRepository->Create(['email' => $email,'pwd'=>$hash,'name'=>$name]);
    $_SESSION["user"] = $email;
    $_SESSION["name"] = $name;
    header("location:index.php");
}

?>
