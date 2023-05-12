<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']);
session_start();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the comment ID and user ID from the request
    $commentId = $_POST['comment_id'];
    $userId = $_SESSION['user'];

    // Update the likes count and liked_by property of the comment
    include_once("database_access/CommentRepository.php");
    $rep = new CommentRepository("comment");
    $comment = $rep->findById($commentId);
    $likedBy = $comment->likers ? explode(',', $comment->likers) : [];
    $likes = $comment->likes;
    if (!in_array($userId, $likedBy)) {
        $likedBy[] = $userId;
        $likes++;
    } else {
        $index = array_search($userId, $likedBy);
        array_splice($likedBy, $index, 1);
        $likes--;
    }

    $params = ['likes' => $likes, 'likers' => implode(',', $likedBy)];
    $rep->UpdateById($commentId, $params);

    // Prepare the response
    $response = [
        'success' => true,
        'likes' => $likes,
    ];

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If it's not a POST request, handle the error or redirect as necessary
    // For example, you could show an error message or redirect the user back to the previous page
    // Implement your own logic here based on your application's requirements
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
