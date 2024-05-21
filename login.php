<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiclean Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="container flex1">
        <div class="form internal ">
            <form action="php/loginverify.php" method="post" class="flex2">
                <h2> <a href="index.php">Digiclean</a></h2>
                <h1>Digiclean Login</h1>
                <div class="input-box flex2">
                    <label for="email">User Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input-box flex2">
                    <label for="pass">Password</label>
                    <!-- <div class="holder"> -->
                        <span>
                        <input type="password" name="pass" id="pass" class="password">
                        <button type="button" id="show" class="show">Show</button>
                        </span>
                    <!-- </div> -->
                    <a href="#">forgot password?</a>
                </div>
                <div class="btns grid-center">
                    <button type="submit" name="login">Login</button>
                    
                </div>
                <div class="link">
                    New to Digiclean? <a href="signup.php" type="button">Sign up</a>
                </div>
                <div class="state">
                    <?php
                    if(isset($_SESSION['fail'])){
                        echo''.$_SESSION['fail'].'';
                        unset($_SESSION['fail']);
                    }
                    ?>
                </div>
            </form>
        </div>
        
        <div class="image internal">
            <img src="assets/login side image.png" alt="">
        </div>
    </div>
    <script src="js/password.js"></script>
</body>
</html>