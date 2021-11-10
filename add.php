<?php

//    if (isset($_GET['submit'])){
//        echo htmlspecialchars($_GET['email']);
//        echo htmlspecialchars($_GET['title']);
//        echo htmlspecialchars($_GET['ingredients']);
//    }

    if (isset($_POST['submit'])){
        echo htmlspecialchars($_POST['email']);
        echo htmlspecialchars($_POST['title']);
        echo htmlspecialchars($_POST['ingredients']);
    }

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="">Your Email</label>               <!--  we must put id in for-->
        <input type="email" name="email">
        <label for="">Pizza Title</label>
        <input type="text" name="title">
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php'?>

</html>
