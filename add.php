<?php

include ('config/db_connect.php');

$email = $ingredients = $title = '';
$errors = ['email'=>'', 'title'=>'', 'ingredients'=>''];

//    if (isset($_GET['submit'])){
//        echo htmlspecialchars($_GET['email']);
//        echo htmlspecialchars($_GET['title']);
//        echo htmlspecialchars($_GET['ingredients']);
//    }

    if (isset($_POST['submit'])){

//        check email
        if (empty($_POST['email'])){
            $errors['email'] = "Email is required <br/>";
        }else{
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){  //it validates email!!
                $errors['email'] = "Email must be a valid email address <br/>";
            }
        }

        //        check title
        if (empty($_POST['title'])){
            $errors['title'] =  "Title is required <br/>";
        }else{
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s\']+$/', $title)){  //it checks if the title has a-z, A-Z, spaces, ' - s
                $errors['title'] = "Title must be letters and spaces only <br/>";
            }
        }

        //        check ingredients
        if (empty($_POST['ingredients'])){
            $errors['ingredients'] = "At least one ingredient is required <br/>";
        }else{
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z]+)(,\s*[a-zA-Z]*)*$/', $ingredients)){
                $errors['ingredients'] = "Ingredients must be a comma separated list <br/>";
            }
        }

        if(array_filter($errors)){
            //echo "There are errors in the form";
        } else {

            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            //create sql
            $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES ('$title', '$email', '$ingredients')";

            //save to db and check
            if (mysqli_query($conn, $sql)){
                //success
                header('location: index.php');
            } else{
                //error
                echo "Query Error: ". mysqli_error($conn);
            }

            //echo "Form is valid";

        }

    }

    function value($value, $name){
        global $errors;
        if (empty($errors[$name])){
            echo htmlspecialchars($value);
        } else {echo '';
        }

    } // end of the basic POST check. If the want to check whether html form inputs are empty, we can use "required" attribute in them

?>

<!doctype html>
<html lang="en">

<?php include 'templates/header.php'?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="">Your Email</label>               <!--  we must put id in for-->
        <input type="text" name="email" value="<?php value($email, 'email'); ?>">
        <div class="red-text"> <?php echo $errors['email'];?> </div>
        <label for="">Pizza Title</label>
        <input type="text" name="title" value="<?php value($title, 'title'); ?>">
        <div class="red-text"> <?php echo $errors['title'];?> </div>
        <label for="">Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php value($ingredients, 'ingredients'); ?>">
        <div class="red-text"> <?php echo $errors['ingredients'];?> </div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include 'templates/footer.php'?>

</html>
