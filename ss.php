<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucess</title>
    <link rel="stylesheet" href="css/login.css">
    <style>
        html{
            width: 100dvw;
            height: 100dvh;
            display: grid;
            place-items: center;
        }
        body{
            width: 100%;
            height: 100%;
            display: grid;
            place-items: center;
        }
        .sucess{
            width: 300px;
            /* height: 100px; */
            height: max-content;
            margin: 50px auto;
            box-shadow: 4px 3px 10px black;
            border: 1px solid black;
            text-align: center;
            padding: 20px;
            border-radius: 20px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<div class="sucess">

<div class="state">
    <?php
    if(isset($_SESSION['fail'])){
        echo''.$_SESSION['fail'].'';
        unset($_SESSION['fail']);
    }
    ?>
    </div>
    <p>registration sucessfull</p>
    <a href="login.php">login now</a>
</div>
    </div>
</body>
</html>