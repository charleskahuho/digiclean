<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from admin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();

$investigate = "select * from reportbs where status='pending'";
$invresult = $conn->query($investigate);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported businesses</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/reports.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="summary">
                <h2>Reported businesses</h2>
                <?php
                    if($invresult->num_rows > 0){
                        $i = 1;
                        while($invrow = $invresult->fetch_assoc()){

                    
                ?>
                <div class="busn">
                    <div class="num flex1">
                        <?php echo $i; ?>
                    </div>
                    <div class="details flex1">
                        <span>
                            complaint by: <?php echo $invrow['accuser'] ?>
                        </span>
                        <span>
                            target: <?php echo $invrow['bsemail'] ?>
                        </span>
                    </div>
                    <div class="act flex1">
                        <a href="investigate.php?token=<?php echo $invrow['token'] ?>" class="dive">investigate</a>
                        <a href="#">dismiss</a>
                    </div>
                </div>
                <?php
                $i++;
                        }
                    }else{
                ?>
                <div class="busn empty">
                    No filed reports currently. All reports have been investigated
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

