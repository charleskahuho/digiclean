<?php
require 'php/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile page</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/settings.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
<div class="container">
        <?php require 'sidebar.php' ?>
        <div class="content" id="content">
            <div class="summary">
                <h2>Setting page</h2>
                <div class="setting">
                    <div class="prof-pic">
                        <img src="../uploads/pm_1704150504187_cmp.jpg" alt="">
                    </div>
                    <div class="details">
                        
                        <div class="email">
                            <h3>User email</h3>
                            <h4><?php echo $adminemail; ?></h4>
                        </div>
                        <div class="password">
                            <h3>Password</h3>
                            <span>
                                <a href="changepass.php?email=<?php echo $adminemail; ?>">change password</a> 
                                <a href="../php/logout.php" id="logout" class="flex">Log out</a>
                                <!-- <a href="../php/logout.php" id="logout" class="flex">Log out</a> -->

                            </span>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="summary footer">
                <h4>Alaric creations</h4>
                <p>@ <?php echo date('Y');?>. All rights reserved</p>
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