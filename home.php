<?php
$pageTitle = 'Recipes | Home';
include 'fragments/header.php';
if (isset($_GET['success'])) {
    echo '<p>Recipe added successfully!</p>';
}
?>

<ul class="recipes">
    <a href="details.php">
    <li class="recipe">
        <img src="uploads/recipe1.jpeg" alt="recipe img">
        <h4>Makarouna bel djej</h4>
        <p>By Aymen</p>
    </li></a>

    <a href="details.php">
    <li class="recipe">
        <img src="uploads/recipe2.jpeg" alt="recipe img">
        <h4>Koskssi bl l7am </h4>
        <p>By Hbib</p>
    </li></a>

    <a href="details.php">
    <li class="recipe">
        <img src="uploads/recipe3.jpg" alt="recipe img">
        <h4>Kamounia</h4>
        <p>By Ala</p>
    </li></a>

</ul>

<?php
include 'fragments/footer.php';
?>

