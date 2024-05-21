<?php
require 'php/session.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql ="select * from orders where id=$id";
$Result = $conn->query($sql);
$row = $Result->fetch_assoc();

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
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            
                <div class="summary">
                    <h2>Order details</h2>
                    <div class="details-order">
                        <div class="sender">
                            <span>Client:</span>
                            <span><?php echo $row['email']; ?></span>
                        </div>
                        <div class="pickup">
                            <span>Pickup location:</span>
                            <span><?php echo $row['pickup']; ?></span>
                        </div>
                        <div class="order-details">
                            <h4>Order details</h4>
                            <p><?php echo $row['content']; ?></p>
                        </div>
                        <!-- <div class="actions flexy">
                            <a href="php/process.php?id=<?php echo $row['id']; ?>">Process order</a>
                             <a href="#"></a> -->
                        <!-- </div> -->
                    </div>
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
