<?php
require 'php/session.php';
// 
// require 'validate.php';

$email = $_SESSION['email'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="hello">
                <h1>Good <span id="time"></span>, <?php echo $vendoremail  ?> </h1>
                <h4>Answer to the calls of many and increase their favourability</h4>
                <a href="setting.php" class="account">Account</a>
            </div>
                <div class="summary">
                    <h2>add something here</h2>
                </div> 
            <div class="summary footer">
                    <h4>Alaric creations</h4>
                    <p>@ <?php echo date('Y');?>. All rights reserved</p>
            </div>
        </div>
    </div>
    <script src="../js/duration.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/back.js"></script>
</body>
</html>

