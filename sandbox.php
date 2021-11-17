<?php

// ternary operators
$score = 50;

//if ($score>40){
//    echo "High Score!";
//} else {
//    echo "Low Score :(";
//}

$val = $score > 60 ? "High Score!" : "Low Score :(";  // ternary operators only return values!!!
//echo $val;

//echo $score > 40 ? "High Score!" : "Low Score :("; // its other way to echo it out!!!

// superglobals

// $_GET['name'], $_POST['name']

//echo $_SERVER['SERVER_NAME'] . '<br/>';
//echo $_SERVER['REQUEST_METHOD'] . '</br>';
echo $_SERVER['SCRIPT_FILENAME'] . '</br>';
//echo $_SERVER['PHP_SELF'] . '<br/>';

if(isset($_POST['submit'])){
    // cookie for gender
    setcookie('gender',$_POST['gender'], time() + 86400);

    session_start();

    $_SESSION['name'] = $_POST['name'];

    header('Location: index.php');
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Tuts</title>
</head>
<body>

<h2><?php echo $score > 40 ? "High Score!": "Low Score :("; ?></h2>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="text" name="name">
    <select name="gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <input type="submit" name="submit" value="submit">
</form>

</body>
</html>
