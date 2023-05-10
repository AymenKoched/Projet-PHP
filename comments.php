<div class="comment_container">
    <?php include_once ("CommentRepository.php");
    $rep = new CommentRepository("comment");
    ?>

    <?php if ($rep->findNumberByRecipeId($recipe->id)) { ?>
    <h3>Comments - <?= ($rep->findNumberByRecipeId($recipe->id)) ?></h3>
        <?php } else { ?>
         <h3>Comments - 0 </h3>
         <?php } ?>

    <?php
    include_once ("CommentRepository.php");
    $rep = new CommentRepository("comment");
    $comments = $rep->findByRecipeId($recipe->id);
    foreach($comments as $comment){
    ?>

        <div class="comment_card">
            <div style="display: flex;justify-content: flex-start;gap: 15px;">
                <div><i class="fa-solid fa-user" style="color: #4b5061;font-size: 50px;"></i></div>
                <div>
                    <?php
                    if (isset($_SESSION["name"])){
                        if ($_SESSION["name"] == $comment->author) { ?>
                            <div >You</div>
                            <?php
                        } else { ?>
                            <div><?php echo $comment->author ?></div>
                        <?php }
                    } else { ?>
                        <div><?php echo $comment->author ?></div>
                    <?php } ?>
                <p><?php echo $comment->text ?></p>
                </div>
            </div>
    <div class="comment_footer">




                <!--Comment Author-->






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