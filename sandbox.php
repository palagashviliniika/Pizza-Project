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

echo $_SERVER['SERVER_NAME'] . '<br/>';
echo $_SERVER['REQUEST_METHOD'] . '</br>';
echo $_SERVER['SCRIPT_FILENAME'] . '</br>';
echo $_SERVER['PHP_SELF'] . '<br/>';


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

</body>
</html>
