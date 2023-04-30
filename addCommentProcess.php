<?php
include_once ("CommentRepository.php");
$rep=new CommentRepository("comment");
$rep->Create($_POST);
$previousPage = $_SERVER['HTTP_REFERER'];
header("Location: $previousPage");
?>