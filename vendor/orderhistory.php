<?php
require 'php/session.php';
// 

$orders = "select * from orders where vendoremail='$vendoremail' order by id DESC";
$ordersres = $conn->query($orders);


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
                    <h2>Orders recency sort</h2>
                    <?php  
                        if($ordersres->num_rows >0){
                            $i =1;
                            while($orderrow = $ordersres->fetch_assoc()){

                            
                        
                    ?>
                    <div class="order">
                        <div class="num flexy">
                                <?php echo $i; ?>
                        </div>
                        <div class="details flex1">
                            <span>customer: <?php echo $orderrow['email']; ?></span>
                            <span>Pickup:<?php echo $orderrow['pickup']; ?></span>
                        </div>
                        <div class="actions flexy">
                            <a href="details.php?id=<?php echo $orderrow['id']; ?>">details</a>
                            <!-- <a href="#">Process</a> -->
                        </div>  
                    </div>
                    <?php
                            $i++;
                            }
                        }else{
                    ?>
                    <div class="order empty">
                        no orders currently <?php echo $vendoremail ?>
                    </div>
                    <?php }?>
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

