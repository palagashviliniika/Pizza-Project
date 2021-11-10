<?php

//    if (isset($_GET['submit'])){
//        echo $_GET['email'];
//        echo $_GET['title'];
//        echo $_GET['ingredients'];
//    }

    if (isset($_POST['submit'])){
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingredients'];
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
