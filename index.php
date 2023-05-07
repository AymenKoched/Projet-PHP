<?php
$pageTitle = 'Recipes | Home';
include 'fragments/header.php';

require_once 'RecipesRepository.php';
require_once 'BookmarkRepository.php';
$rep = new RecipesRepository('recipes');
$bookm = new BookmarkRepository("bookmarks");


?>

<h3 class="dishes">Dishes</h3>
Order By :
<a href="index.php?tri=visit" class="see" >Visits</a>
<a href="index.php?tri=bookmarks"  class="see">Bookmarks</a>
<?php
$isbookmark = false;
if (isset($_GET["tri"]) && $_GET["tri"]== "visit") {
    $recipes = $rep->findAllOrderedByVisits();
}else if( isset($_GET["tri"]) && $_GET["tri"]== "bookmarks") {
    $recipes = $bookm->findAllOderedByBookmarks();
    $isbookmark = true;
}
else if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $recipes = $rep->findByCategory($_GET['categorie']);
}
else {
    $recipes = $rep->findAll();
}
?>

    <?php

if (!$recipes) {
    echo "<div>No Recipes to display ..</div>";
} else {
    ?>
    <ul class="plats">
        <?php
        foreach ($recipes as $recipe) {
            if ($isbookmark == true) {
                $recipe = $rep->findById($recipe->recipeID);
            };
            ?>

            <div class="plat">
                <div class="plat-img">
                    <img src="data:image/jpeg;base64,<?= base64_encode($recipe->image); ?>" height="300" width="300" alt="recipe img">
                </div>
                <div class="plat-info">
                    <p class="plat-name"><strong><?= strtoupper($recipe->nom); ?> </strong></p>
                    <p class="plat-author"><strong>Author</strong> : <?= $recipe->author; ?> </p>
                    <p class="plat-admiration"><strong>Bookmarks </strong> : <?php if ($bookm->findBookmarksByRecipeId($recipe->id)) {
                        echo($bookm->findBookmarksByRecipeId($recipe->id)); }
                         else {
                             echo(0);
                         }   ?>
                    </p>
                    <p class="plat-visitors"><strong>Visits Overall</strong> :
                        <?= $recipe->visits ?>
                    </p>
                    <div class="plat-details">
                        <a href="details.php?id=<?= $recipe->id; ?>" class="see">See Details</a>
                    </div>
                </div>
            </div>
            </div>

        <?php } ?>
    </ul>
    <?php
}
?>
<div class="team-introduction">
    <div class="team-members"><span class="gradient-text">Meet</span> our Team</div>

<div class="subtitle">We are 5 INSAT pre-engineering students ,
                      hope you enjoy scorilling through our Website
</div>
</div>
<div class="team-container">
    <div class="member 1">
        <div class="card front-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
        </div>
        <div class="card back-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
            <div class="info">
                <div class="title">Mohamed Habib Triki</div>
                <p>Software engineering student</p>
            </div>
            <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </ul>
        </div>
    </div>
    <div class="member 2">
        <div class="card front-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
        </div>
        <div class="card back-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
            <div class="info">
                <div class="title">Mohamed Habib Triki</div>
                <p>Software engineering student</p>
            </div>
            <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </ul>
        </div>
    </div>
    <div class="member 3">
        <div class="card front-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
        </div>
        <div class="card back-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
            <div class="info">
                <div class="title">Mohamed Habib Triki</div>
                <p>Software engineering student</p>
            </div>
            <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </ul>
        </div>
    </div>
    <div class="member 4">
        <div class="card front-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
        </div>
        <div class="card back-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
            <div class="info">
                <div class="title">Mohamed Habib Triki</div>
                <p>Software engineering student</p>
            </div>
            <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </ul>
        </div>
    </div>
    <div class="member 5">
        <div class="card front-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
        </div>
        <div class="card back-face">
            <img src="https://scontent.ftun9-1.fna.fbcdn.net/v/t39.30808-6/342822986_226127490105071_3781577970052647618_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=lv5coebeC8gAX_w1QOK&_nc_ht=scontent.ftun9-1.fna&oh=00_AfDiwg2geQe9yfMK1YuMLvR3ABdwPt2Rdu8Df5xwpwW_Ag&oe=645935DE" alt="Flip Card">
            <div class="info">
                <div class="title">Mohamed Habib Triki</div>
                <p>Software engineering student</p>
            </div>
            <ul>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </ul>
        </div>
    </div>
</div>
<?php
include 'fragments/footer.php';
?>
