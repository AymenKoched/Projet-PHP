<?php

include_once 'UserRepository.php';
session_start();

$email = $_POST["email"];
$password = $_POST["password"];
$isAuthenticated = false ;
$userRepository= new UserRepository('user');
$user = $userRepository->findByEmail($email);

if(isset($user)) {
    if (password_verify($password, $user->pwd)) {
        $_SESSION["user"] = $email;
        $_SESSION["name"] = $user->name;
        $isAuthenticated = true;
        header("location:index.php");
    }
}

if(!$isAuthenticated)
    header('location:login.php?message=Wrong credentials ! Try again .');

?>
