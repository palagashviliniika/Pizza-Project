<?php

session_start();

if ($_SERVER['QUERY_STRING'] == 'noname' ){
//    unset($_SESSION['name']); // it unsets single variable

    session_unset(); // it unsets all variables
}

$name = $_SESSION['name']  ?? "Guest"; // its called null coalescing and it will choose one of the options

// get cookie
$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Project</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>

</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Test Page</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down"></li>
            <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?>!</li>
            <li class="grey-text">(<?php echo $gender; ?>)</li>
            <li><a href="add.php" class="btn brand z-depth-0">ADD</a> </li>
            <li><a href="#" id="delete-product-btn" class="btn brand z-depth-0">MASS DELETE</a> </li>
            </ul>
        </div>
    </nav>