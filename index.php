<?php

//connecting to the database

$conn = mysqli_connect('localhost','nika','nika-125','ninja_pizza');

//checking connection

if (!$conn){
    echo "Connection Error ". mysqli_connect_error();  // it checks the current state and error-reason to the database connection
}

// write querry for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// make querry and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free the result from the memory
mysqli_free_result($result);

// close the connection
mysqli_close($conn);

//print_r($pizzas);

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza){ ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text"> More Info </a>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<?php include 'templates/footer.php'?>

</html>
