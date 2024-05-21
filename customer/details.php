<?php
require 'php/session.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}
$sql = "select * from business where id =$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$location = $row['location'];

$reccomend = "select * from business where location='$location' and id!=$id";
$rest = $conn->query($reccomend);

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
                        <?php if($row['state'] == "active"){ ?>
                        <a href="placeorder.php?email=<?php echo $row['bsmail']; ?>">order with us</a>
                        <?php } else { ?>
                         <span>business inactive</span>
                            <?php }?>
                        <a href="report.php?id=<?php echo $id; ?>"class="report">Report organisation</a>
                    </div>
                    <div class="support">
                        <a href="tel:+<?php echo $row['contact']; ?>">call for help</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="summary">
                <h2>Other recommendations</h2>
                
                <div class="reccomend">
                    <?php
                    if($rest->num_rows > 0){
                        $i = 1;
                            while($recrow = $rest->fetch_assoc()){  
                    
                    ?>

                    <a href="details.php?id=<?php echo $recrow['id']; ?>">
                        <div class="holder6">
                            <div class="img">
                                <img src="../uploads/Screenshot from 2024-05-02 22-47-17.png" alt="">
                            </div>
                            <p><?php echo $recrow['name']; ?></p>
                        </div>
                    </a>
                    <?php
                    $i++;
                    if($i >= 6){
                        break;
                    }
                            }
                        }else{
                    ?>

                        <div class="holder6">
                                <div class="img">
                                    <img src="../uploads/Screenshot from 2024-05-02 22-47-17.png" alt="">
                                </div>
                                <p>No recommendations</p>
                        </div>
                        <?php
                        }
                        ?>
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