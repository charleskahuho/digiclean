<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from customer where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$pending = "select count(id) as cnt from orders where state='pending' and email='$email'";
$completed = "select count(id) as cnt from orders where state='completed' and email='$email'";
$canceled = "select count(id) as cnt from orders where state='canceled' and email='$email'";

$result1 = $conn->query($pending);
$row1 = $result1->fetch_assoc();

$result2 = $conn->query($completed);
$row2 = $result2->fetch_assoc();

$result3 = $conn->query($canceled);
$row3 = $result3->fetch_assoc();

$vendor = "select * from business order by id DESC";
$soln = $conn->query($vendor);

$bsnlist = $conn->query("select * from business");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/more.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="hello">
                <h1>Good <span id="time"></span>, <?php echo $row['firstname']; ?>.</h1>
                <h4>Manage your laundry and track their progress</h4>
                <a href="setting.php" class="account">Account</a>
            </div>
            <div class="summary border">
                <h2>Order summary</h2>
                <div class="holder2">
                    <div class="internal pending">
                        <div class="number number1"><?php echo $row1['cnt']; ?></div>
                        <div class="desc">Pending order(s)</div>
                    </div>
                    <div class="internal canceled">
                        <div class="number number2"><?php echo $row3['cnt']; ?></div>
                        <div class="desc">Canceled order(s)</div>
                    </div>
                    <div class="internal completed">
                        <div class="number number3"><?php echo $row2['cnt']; ?></div>
                        <div class="desc">Completed order(s)</div>
                    </div>
                </div>
            </div>
            <div class="summary ">
                <h2>Vendors summary</h2>
                <div class="holder1">
                    <?php
                    if($soln->num_rows > 0){
                        $i = 0;
                        while($solnrow = $soln->fetch_assoc()){

                    ?>
                    <div class="vendor-mini">
                        <div class="label">
                            <img src="../uploads/61CiqVTRBEL._SX3000_.jpg" alt="image">
                        </div>
                        <div class="detail">
                            <p>
                            <!-- Atremis cleaners -->
                            <span class="name"><?php echo $solnrow['name']; ?></span>
                            <span class="state" class="state"><?php echo $solnrow['state']; ?></span>
                            </p>
                        </div>
                    </div>
                    <?php
                        $i++;
                        if($i >= 4){
                            break;
                        }
                        }
                    }else{

                        ?>
                        <div class="empty">
                            
                            <div class="details flexy">
                                <p>Sorry no vendors are currently available</p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    
                </div>
                
            </div>
            <?php
            if($bsnlist->num_rows > 0) {
            ?>
            <div class="more ">
                    <a href="explore.php">See more</a>
            </div>
            <?php } ?>
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

