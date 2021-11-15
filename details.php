<?php

include "config/db_connect.php";

// check GET request id parameter

if (isset($_GET['id'])){

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // write a query
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // make query and get the result
    $result = mysqli_query($conn, $sql);

    // fetch the result in an array format
    $pizza = mysqli_fetch_assoc($result);

    //free the result and close the connection
    mysqli_free_result($result);
    mysqli_close($conn);

//    print_r($pizza);

}

?>

<!doctype html>
<html lang="en">

    <?php include 'templates/header.php'; ?>

    <div class="container center">
        <?php if ($pizza): ?>

            <h4 class=""><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p> Created by: <?php echo htmlspecialchars($pizza['email']); ?> </p>
            <p> <?php echo date($pizza['created_at']); ?> </p>
            <h5> Ingredients: </h5>
            <p> <?php echo htmlspecialchars($pizza['ingredients']); ?> </p>


        <?php else: ?>

            <h5>No such pizza exists!</h5>

        <?php endif; ?>
    </div>

    <?php include 'templates/footer.php'; ?>

</html>
