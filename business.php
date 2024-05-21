<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiclean vendor registration</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container max spacial">
        <div class="form internal">
            <form action="php/bsreg.php" method="post">
                <h2> <a href="index.php">Digiclean</a></h2>
                <h1>Business registration</h1>
            <div class="input-box">
                <label for="name">Business name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-box">
                <label for="location">location</label>
                <input type="text" name="location" id="location" required>
            </div>
            <div class="input-box">
                <label for="bsemail">Business email</label>
                <input type="email" name="bsemail" id="bsemail" required>
            </div>
            <div class="input-box">
                <label for="owemail">Owner email</label>
                <input type="email" name="owemail" id="owemail" required>
            </div>
            <div class="input-box flex2">
                <label for="password">Password</label>
                <span>
                    <input type="password" name="password" id="password" class="password" required>
                    <button type="button" id="show" class="show">Show</button>
                    </span>
            </div>
            <div class="input-box flex2">
                <label for="cpass">Confirm password</label>
                <span>
                    <input type="password" name="cpass" id="cpass" class="password" required>
                    <button type="button" id="show" class="show">Show</button>
                    </span>
            </div>
            <div class="input-box flex2">
                    <label for="contact">Phone number</label>
                    <input type="number" name="contact" id="contact" required>
                </div>
            <div class="btns grid-center">
                <button type="submit" name="register">Register</button>
            </div>
            <div class="links flex3">
                Already have an account <a href="login.php">Login here</a>
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
    </div>
    <script src="js/password.js"></script>
</body>
</html>