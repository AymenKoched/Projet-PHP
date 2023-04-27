<div class="comment_container">
    <?php
    include_once ("CommentRepository.php");
    $rep = new CommentRepository("comment");
    $comments = $rep->findByRecipeId($recipe->id);
    foreach($comments as $comment){
        ?>
        <div class="comment_card">
            <h3 class="comment_title"><?php echo $comment->nom ?></h3>
            <p><?php echo $comment->text ?></p>
            <div class="comment_footer">
                <div>By <?php echo $comment->author ?></div>
                <div>Likes <?php echo $comment->Likes ?></div>
                <?php
                $liked = false;
                if (isset($_SESSION["user"])) {
                    $user_id = $_SESSION["user"];
                    $liked = $rep->isLikedByUser($comment->nom, $user_id);

                if ($liked) {
                ?>
                <a href="LikeProcess.php?comment_name=<?php echo $comment->nom?>"><img src="heartLike.ico" width="20px" height="20px"></a>
                <?php } else { ?>
                <a href="LikeProcess.php?comment_name=<?php echo $comment->nom?>"><img src="heart%20empty.ico" width="20px" height="20px"></a>
                <?php } }?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
if(isset($_SESSION["name"]))
{
?>
<form action="addCommentProcess.php" method="post" enctype="multipart/form-data">
    <h2>Add Comment</h2>

    <label for="title">Title</label>
    <input type="text" name="nom" id="title" required />

    <label for="title">Text</label>
    <textarea style="resize:none" rows=7 type="text" name="text" id="text" required></textarea>

    <button type="submit">Add</button>

    <input hidden="hidden" name="author" type="text"  value="<?=$_SESSION["name"]?>" >
    <input hidden="hidden" name="RecipeId" type="number"  value="<?=$recipe->id?>" >
    <input hidden="hidden" name="Likes" type="number"  value=0 >
<?php
    }
?>
</form>