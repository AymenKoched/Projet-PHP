<?php
session_start();
include_once 'UserRepository.php';
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["password"];
$UserRepository = new UserRepository('user');
$user = $UserRepository->findByEmail($email);
if($user){
    //var_dump(isset($user));
    header("location:signUp.php?erreur=Email déja existant !");
} else {
    $UserRepository->Create(['email' => $email,'pwd'=>$pwd,'name'=>$name]);
    $_SESSION["user"] = $email;
    $_SESSION["name"] = $name;
    header("location:index.php");
}
