<?php

include 'config/db_connect.php';

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

//$explode = (explode(',',$pizzas[0]['ingredients'])); // it splits string into an array
//
//print_r($explode);

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">

        <?php foreach ($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) :?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="#" class="brand-text"> More Info </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

<!--        --><?php //if (count($pizzas) >= 2) : ?>
<!--            <p>There are 2 or more pizzas</p>-->
<!--        --><?php // else : ?>
<!--            <p>There are less than 2 pizzas</p>-->
<!--        --><?php //endif; ?>

    </div>
</div>

<?php include 'templates/footer.php'?>

</html>
