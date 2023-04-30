<div class="comment_container">
    <h3>Comments </h3>
    <?php
    include_once ("CommentRepository.php");
    $rep = new CommentRepository("comment");
    $comments = $rep->findByRecipeId($recipe->id);
    foreach($comments as $comment){
    ?>

        <div class="comment_card">

            <p><?php echo $comment->text ?></p>
            <div class="comment_footer">

                <!--Comment Author-->
                <?php
                if (isset($_SESSION["name"])){
                    if ($_SESSION["name"] == $comment->author) { ?>
                        <div>By You</div>
                    <?php
                    } else { ?>
                     <div>By <?php echo $comment->author ?></div>

                    <?php }
                        } else { ?>
                    <div>By <?php echo $comment->author ?></div>
                <?php } ?>

                <!--Comment Likes-->
                <div>Likes <?php echo $comment->Likes ?></div>

                <!--Delete Comment-->
                <?php
                if (isset($_SESSION["name"])) {
                    if ($_SESSION["name"] == $comment->author) { ?>
                        <a href="DeleteCommnetprocess.php?comment_id=<?php echo $comment->id?>"><img src="Delete_icon.ico" width="20px" height="20px"></a>
                <?php
                    }
                }
                ?>

                <!--Like Comment-->
                <?php
                $liked = false;
                if (isset($_SESSION["user"])) {
                    $user_id = $_SESSION["user"];
                    $liked = $rep->isLikedByUser($comment->id, $user_id);

                    if ($liked) {
                ?>
                <a href="LikeProcess.php?comment_id=<?php echo $comment->id?>"><img src="heartLike.ico" width="20px" height="20px"></a>
                <?php } else { ?>
                <a href="LikeProcess.php?comment_id=<?php echo $comment->id?>"><img src="heart%20empty.ico" width="20px" height="20px"></a>
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

    <label for="title">Text</label>
    <textarea style="resize:none" rows=7 type="text" name="text" id="text" required></textarea>

    <button type="submit">Add</button>

    <input hidden="hidden" name="author" type="text"  value="<?=$_SESSION["name"]?>" >
    <input hidden="hidden" name="RecipeId" type="number"  value="<?=$recipe->id?>" >
    <input hidden="hidden" name="Likes" type="number"  value=0 >
</form>
<?php
}
?>