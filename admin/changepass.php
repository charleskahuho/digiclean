<?php
require 'php/session.php';

// if(!isset($_GET['email'])){
//     header('location:setting.php');
// } else{
//     $email = $_GET['email'];
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Password change</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/theme.css">

</head>
<body>
<div class="container">
        <?php require 'sidebar.php' ?>
        <div class="content" id="content">
            <div class="summary">
                <form action="php/changepass.php" method="post">
                    <h1>Password change</h1>
                <div class="input-box flex2">
                    <label for="oldpass">Old password</label>
                    <span>
                        <input type="password" name="oldpass" id="oldpass" class="password">
                        <button type="button" id="show" class="show">Show</button>
                        </span>
                </div>
                <div class="input-box flex2">
                    <label for="password">New password</label>
                    <span>
                        <input type="password" name="password" id="password" class="password">
                        <button type="button" id="show" class="show">Show</button>
                        </span>
                </div>
                <div class="input-box flex2">
                    <label for="cpass">Confirm password</label>
                    <span>
                        <input type="password" name="cpass" id="cpass" class="password">
                        <button type="button" id="show" class="show">Show</button>
                        </span>
                </div>
                <div class="btns">
                    <button type="submit" name="change">Change password</button>
                </div>
                <div class="notice">
                    <?php
                       if(isset($_SESSION['pass'])){
                            echo''.$_SESSION['pass'].'';
                            unset($_SESSION['pass']);
                       }
                       if(isset($_SESSION['old'])){
                        echo''.$_SESSION['old'].'';
                        unset($_SESSION['old']);
                        }
                        if(isset($_SESSION['error'])){
                            echo''.$_SESSION['error'].'';
                            unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['query'])){
                            echo''.$_SESSION['query'].'';
                            unset($_SESSION['query']);
                       }
                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/theme.js"></script>
    <script src="../js/duration.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/back.js"></script>
    <script src="../js/password.js"></script>
</body>
</html>