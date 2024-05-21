<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from admin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$pending = "select count(userid) as cnt from customer";
$completed = "select count(id) as cnt from orders";
$canceled = "select count(id) as cnt from business";

$result1 = $conn->query($pending);
$row1 = $result1->fetch_assoc();

$result2 = $conn->query($completed);
$row2 = $result2->fetch_assoc();

$result3 = $conn->query($canceled);
$row3 = $result3->fetch_assoc();

$vendor = "select * from business order by id DESC";
$soln = $conn->query($vendor);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/theme.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="hello">
                <h1>Good <span id="time"></span>, <?php echo $row['firstname']; ?>.</h1>
                <h4>Create a favourable environment for the community</h4>
                <a href="setting.php" class="account">Account</a>
            </div>
            <div class="summary border">
                <h2>Progress summary</h2>
                <div class="holder2">
                    <div class="internal pending">
                        <div class="number number1"><?php echo $row1['cnt']; ?></div>
                        <div class="desc">Customers enrolled</div>
                    </div>
                    <div class="internal canceled">
                        <div class="number number2"><?php echo $row3['cnt']; ?></div>
                        <div class="desc">Businesses registered</div>
                    </div>
                    <div class="internal completed">
                        <div class="number number3"><?php echo $row2['cnt']; ?></div>
                        <div class="desc">Orders made</div>
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
</body>
</html>

