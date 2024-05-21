<?php
require 'php/session.php';
// 

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
    <link rel="stylesheet" href="../css/vendor.css">
    <link rel="stylesheet" href="../css/more.css">
    <link rel="stylesheet" href="../css/placeorder.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            
                <div class="summary">
                    <h2>Update business details</h2>

                      <form action="update.php" method="post">
                        <div class="input-box">
                            <label for="slogan">New slogan</label>
                            <input type="text" name="slogan" id="slogan">
                        </div>
                        <div class="input-box">
                            <label for="time">Business hours</label>
                            <input type="text" name="time" id="time">
                        </div>
                        <div class="input-box">
                            <label for="days">Work days</label>
                            <input type="text" name="days" id="days">
                        </div>
                        <div class="input-box">
                            <label for="desc">description</label>
                            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                        </div>
                        <div class="btns">
                            <button type="submit" name="update">Update</button>
                        </div>
                      </form>
                      <h2>
                        <?php
                        if (isset($_SESSION['update'])) {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                        ?>
                      </h2>
                    
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

