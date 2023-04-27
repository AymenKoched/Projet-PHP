<?php
session_start();
// Get the comment ID and user ID from the query string or post data
$comment_id = $_GET['comment_id']; // or $_POST['comment_id']
$user_id = $_SESSION['user']; // or $_POST['user_id']

// Update the 'liked_by' property of the comment with the user ID
include_once ("CommentRepository.php");
$rep = new CommentRepository("comment");
$comment = $rep->findById($comment_id);
$liked_by = $comment->Likers ? explode(',', $comment->Likers) : [];
$likes=$comment->Likes;
if (!in_array($user_id, $liked_by)) {
    $liked_by[] = $user_id;
    $likes++;
    $params = ['Likes'=>$likes,'Likers' => implode(',', $liked_by)];
    $rep->UpdateById($comment_id, $params);
}
else{
    $index = array_search($user_id, $liked_by);
    array_splice($liked_by, $index, 1);
    $likes--;
    $params = ['Likes'=>$likes,'Likers' => implode(',', $liked_by)];
    $rep->UpdateById($comment_id, $params);
}

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
