<?php
$pageTitle = 'Recipes | Details';
include 'fragments/header.php';

?>

    <div class="container">
        <div class="details">
            <h2>Makarouna bel djej</h2>
            <div class="img">
                <div class="inside-img">
                <!--<img src="recipe1.jpeg" alt="recipe img"> -->
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="recipe1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="recipe1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="recipe1.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <p class="by">By Aymen</p>

            <h5>Ingrédients:</h5>
            <div class="ingredients">
                <ul class="ingrediants" >
                    <li>500 g de pâtes au choix</li>
                    <li>4 morceaux de poulet</li>
                    <li>3 cs de concentré de tomates</li>
                    <li>1 cs de piment moulu</li>
                    <li>1 cc de curcuma</li>
                    <li>1 cs rase de tabel karouia</li>
                    <li>8 gousses d'ail</li>
                    <li>4 piments</li>
                    <li>huile d'olive</li>
                    <li>sel</li>
                </ul>
            </div>

            <h5>Etapes:</h5>


            <div class="row">
                <div class="col-4">
                    <div id="list-example" class="list-group">
                        <a class="list-group-item list-group-item-action" href="#list-item-1">Item 1</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-2">Item 2</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-3">Item 3</a>
                        <a class="list-group-item list-group-item-action" href="#list-item-4">Item 4</a>
                    </div>
                </div>
                <div class="col-8">
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
                        <h4 id="list-item-1">Item 1</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <h4 id="list-item-2">Item 2</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <h4 id="list-item-3">Item 3</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <h4 id="list-item-4">Item 4</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
            <!--<ul class="etapes">
                <li>Dans un généreux fond d'huile d'olive, faire revenir le poulet, le concentré de tomates et les épices (sauf le tabel karouia) pendant 2 minutes max, puis verser un grand bol d'eau chaude.</li>
                <li>Pendant que cela mijote à feu doux, éplucher les gousses d'ail, et les piler avec le tabel karouia.</li>
                <li>Ajouter le tout à la préparation, ainsi qu'une cs de sel.</li>
                <li>Ajouter un litre d'eau bouillante, puis laisser cuire à feu moyen pendant 30 minutes environ.</li>
                <li>Une fois la sauce réduite, ajouter 4 piments fendus sur leur longueur, et laisser cuire 10 minutes de plus.</li>
                <li>Cuire les pâtes, mélanger à la sauce, décorer avec la viande et les piments.</li>
                <li>Servir immédiatement.</li>
            </ul>-
           -->
        </div>
        <div class="btns">
        <button class="btn btn-primary"><a href="update.php">Update</a></button>
        <button class="btn btn-danger"><a href="delete.php" >Delete</a></button>
        </div>
    </div>

<?php
include 'fragments/footer.php';
?>

