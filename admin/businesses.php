<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from admin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$approve = "select * from business where approval='pending'";
$approvalrslt = $conn->query($approve);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approving business applications</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/more.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="summary notice">
                <?php
                    if(isset($_GET['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
            </div>
            <div class="summary">
                <h2>Vendor applicants</h2>
                <?php 
                  if($approvalrslt->num_rows >0){
                    $i = 1;
                    while($approw = $approvalrslt->fetch_assoc()){
                        // $id = $approw['token'];
                        $id = $approw['id'];
                        
                ?>
                <div class="holder7">
                    <div class="num flexy">
                        <?php echo $i; ?>
                    </div>
                    <div class="email flexy">
                    <?php echo $approw['name']. " - " .$approw['location']; ?>
                    </div>
                    <div class="act flex1">
                        <a href="bsdetails.php?id=<?php echo $id; $_SESSION['approve']="approve"; ?>">details</a>
                        <a href="php/approve.php?id=<?php echo $id; ?>">Approve</a>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                }else{
                ?>
                <div class="empty">
                    you currently have no pending business applications. laze around
                </div>
                <?php
                }
                ?>
            </div>
            <div class="more">
                <a href="allbs.php">See all businesses</a>
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

