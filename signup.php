<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiclean signup</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="container flex1 max spacial">
        <div class="form internal">
            <form action="php/signupreg.php" method="post" class="flex2 ">
                <h2> <a href="index.php">Digiclean</a></h2>
                <h1>Digiclean Signup</h1>
                <div class="input-box flex2">
                    <label for="fname">Firstname</label>
                    <input type="text" name="fname" id="fname">
                </div>
                <div class="input-box flex2">
                    <label for="lname">Lastname</label>
                    <input type="text" name="lname" id="lname">
                </div>
                <div class="input-box flex2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="input-box flex2">
                    <label for="password">Password</label>
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
                <div class="input-box flex2">
                    <label for="contact">Phone number</label>
                    <input type="number" name="contact" id="contact" required>
                </div>
                <div class="btns grid-center">
                    <button type="submit" name="signup">Sign up</button>
                </div>
                <div class="link">
                    <span>
                        Already have an account  <a href="login.php">Log in</a>
                    </span>
                    <span>     </span>
                    <span>
                        Register a business <a href="business.php">here</a>
                    </span>
                    
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
        
        <!-- <div class="image internal spacial">
            <img src="assets/Screenshot from 2024-05-02 22-46-15.png" alt="">
        </div> -->
    </div>
    <script src="js/password.js"></script>
</body>
</html>