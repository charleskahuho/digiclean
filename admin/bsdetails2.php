<?php
require 'php/session.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
// else{
//     $id = rand(1, 9);
// }
$sql = "select * from business where id=$id";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name']; ?> Details </title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php' ?>
        <div class="content" id="content">
            <div class="summary">
            <h1><?php echo $row['name']; ?> shop</h1>
            <div class="holder5">
                <div class="picture inner">
                    <img src="../assets/Screenshot from 2024-05-02 22-46-15.png" alt="picture">
                </div>
                <div class="description inner">
                    <h2><?php echo $row['name']; ?> - <?php echo $row['location']; ?></h2>
                    <h3><?php echo $row['slogan']; ?></h3>
                    <div class="bsdesc">
                        <h4>About us</h4>
                        <p><?php echo $row['description']; ?></p>
                    </div>
                    <div class="open">
                        <p class="hours">Business hours : <span><?php echo $row['opentime']; ?></span> </p>
                        <p class="days">Business days: <span><?php echo $row['opendays']; ?></span></p>
                    </div>
                    <div class="emails">
                        <h5>Business email: <span class="offc"><?php echo $row['bsmail']; ?></span></h5>
                        <h5>Owner email:   <span class="owm"><?php echo $row['ownermail']; ?></span></h5>
                        
                    </div>
                    <div class="mail">
                        <p><a href="mailto:<?php echo $row['bsmail']; ?>">Mail business</a></p>
                        <p><a href="mailto:<?php echo $row['ownermail']; ?>">Mail owner</a></p>
                    </div>
                    <div class="decision">
                        <a href="php/activatebs.php?id=<?php echo $row['id']; ?>">Activate</a>
                        <!-- <a href="php/deny.php?id=<?php echo $row['id']; ?>"class="report">delete</a> -->
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
    <script src="../js/duration.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/back.js"></script>
</body>
</html>