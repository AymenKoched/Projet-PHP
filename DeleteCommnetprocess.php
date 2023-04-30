<?php
$comment_id = htmlentities($_GET['comment_id']);

echo $comment_id;

include_once ("CommentRepository.php");
$rep=new CommentRepository("comment");

$rep->DeleteById($comment_id);

$previousPage = $_SERVER['HTTP_REFERER'];
header("Location: $previousPage");