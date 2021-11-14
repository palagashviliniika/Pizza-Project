<?php

//connecting to the database

$conn = mysqli_connect('localhost','nika','nika-125','ninja_pizza');

//checking connection

if (!$conn){
    echo "Connection Error ". mysqli_connect_error();  // it checks the current state and error-reason to the database connection
}

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>
<?php include 'templates/footer.php'?>

</html>
