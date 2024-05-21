<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from admin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$approved = "select * from business where approval='approved' and suspended='no'";
$approvedrslt = $conn->query($approved);

$suspended = "select * from business where suspended='yes'";
$suspendedrslt = $conn->query($suspended);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All businesses</title>
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
                <h2>Approved businesses</h2>
                <?php 
                  if($approvedrslt->num_rows >0){
                    $i = 1;
                    while($approw = $approvedrslt->fetch_assoc()){
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
                        <a href="bsdetails1.php?id=<?php echo $id; ?>">details</a>
                        <a href="php/suspendbs.php?id=<?php echo $id; ?>" class="report">Suspend</a>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                }else{
                ?>
                <div class="empty">
                    no business records of this category
                </div>
                <?php
                }
                ?>
            </div>
            <div class="summary">
                <h2>Suspended businesses</h2>
                <?php 
                  if($suspendedrslt->num_rows >0){
                    $i = 1;
                    while($susrow = $suspendedrslt->fetch_assoc()){
                        // $id = $approw['token'];
                        $id = $susrow['id'];
                        
                ?>
                <div class="holder7">
                    <div class="num flexy">
                        <?php echo $i; ?>
                    </div>
                    <div class="email flexy">
                    <?php echo $susrow['name']. " - " .$susrow['location']; ?>
                    </div>
                    <div class="act flex1">
                        <a href="bsdetails2.php?id=<?php echo $id; ?>">details</a>
                        <a href="php/activatebs.php?id=<?php echo $id; ?>" class="ok">Activate</a>
                    </div>
                </div>
                <?php
                    $i++;
                    }
                }else{
                ?>
                <div class="empty">
                    no business records of this category
                </div>
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
    <script src="../js/theme.js"></script>
    <script src="../js/duration.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/back.js"></script>
</body>
</html>

