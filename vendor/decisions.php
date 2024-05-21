<?php
require 'php/session.php';

$sql = "select * from business where bsmail='$vendoremail'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

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
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            
                <div class="summary border">
                    <h2>Delete business account</h2>
                    <a href="php/deleteacc.php" class="report decide">Delete</a>
                </div>
                <div class="summary border">
                    <h2>Set active state</h2>
                    <?php 
                    if($row['state'] == "active"){
                    ?>
                    <a href="php/inactivateacc.php" class="decide">Set inactive</a>
                    <?php
                    }else{
                    ?>
                    <a href="php/activateacc.php" class="decide">Set active</a>
                    <?php
                    }
                    ?>
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

