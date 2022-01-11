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
//mysqli_close($conn);

//print_r($pizzas);

//$explode = (explode(',',$pizzas[0]['ingredients'])); // it splits string into an array
//
//print_r($explode);

if (isset($_POST['delete-product-btn'])){
    if(empty($_POST['delete-checkbox'])){
        header('Location: index.php');
    } else {
        $numberOfCheckboxes = count($_POST['delete-checkbox']);
        echo $numberOfCheckboxes . "<br>";

        foreach ($_POST['delete-checkbox'] as $id_to_delete) {
            echo $id_to_delete;
            $delete_sql = "DELETE FROM pizzas WHERE id=$id_to_delete";
            mysqli_query($conn, $delete_sql);
            if (mysqli_query($conn, $delete_sql)) {
                header('Location: index.php');
            } else {
                echo 'Querry Error ' . mysqli_error($conn);
            }
        }
    }
}

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>


<h4 class="center grey-text">Browse Items</h4>
<div class="container">
    <div class="row">

    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="delete-product-form">

        <?php foreach ($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">

                        <label>
                            <input type="checkbox" class="delete-checkbox filled-in" name="delete-checkbox[]" value="<?php echo htmlspecialchars($pizza['id']); ?>">
                            <span>Choose to Delete</span>
                        </label>
<!--                        <input type="submit" name="delete-product-btn" value="Delete">-->
<!--                        <label for="delete-multiple-checkbox">Choose to delete (NOT VISIBLE!!!)</label>-->



                    <img src="images/pizza.svg" alt="Pizza" class="pizza">
                    <div class="card-content center">
                        <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                        <ul>
                            <?php foreach (explode(',', $pizza['ingredients']) as $ing) :?>
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id'];?>" class="brand-text"> More Info </a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </form>

<!--        --><?php //if (count($pizzas) >= 2) : ?>
<!--            <p>There are 2 or more pizzas</p>-->
<!--        --><?php // else : ?>
<!--            <p>There are less than 2 pizzas</p>-->
<!--        --><?php //endif; ?>

    </div>
</div>

<?php include 'templates/footer.php'?>

</html>
