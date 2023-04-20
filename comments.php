<div class="comment_container">
    <div class="comment_card">
        <h3 class="comment_title">The first comment</h3>
        <p>hello</p>
        <div class="comment_footer">
            <div>By Aymen</div>
            <div>Likes 123</div>
            <a href="LikeProcess.php"><img src="heartLike.ico" width="20px" height="20px"></a>

        </div>
    </div> 
    <div class="comment_card">
        <h3 class="comment_title">The first comment</h3>
        <p>hello</p>
        <div class="comment_footer">
            <div>By Aymen</div>
            <div>Likes 123</div>
            <a href="LikeProcess.php"><img src="heartLike.ico" width="20px" height="20px"></a>
        </div>
    </div> 
    <div class="comment_card">
        <h3 class="comment_title">The first comment</h3>
        <p>hello</p>
        <div class="comment_footer">
            <div>By Aymen</div>
            <div>Likes 123</div>
            <a href="LikeProcess.php"><img src="heartLike.ico" width="20px" height="20px"></a>
        </div>
    </div>
</div>

<form action="addCommentProcess.php" method="post" enctype="multipart/form-data">
    <h2>Add Comment</h2>

    <label for="title">Title</label>
    <input type="text" name="nom" id="title" required />

    <label for="title">Text</label>
    <textarea type="text" name="text" id="text" required></textarea>

    <button type="submit">Add</button>

    <input hidden="hidden" name="author" type="text"  value="<?=$_SESSION["name"]?>" >
    <input hidden="hidden" name="RecipeId" type="number"  value="<?=$recipe->id?>" >
    <input hidden="hidden" name="Likes" type="number"  value=0 >

</form>

