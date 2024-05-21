<?php
require 'php/session.php';


if(isset($_GET['token'])){
    $token = $_GET['token'];
}

$investigate = "select * from reportbs where token='$token'";
$invresult = $conn->query($investigate);
$invrow = $invresult->fetch_assoc();

$accuser = $invrow["accuser"];
$accused = $invrow['bsemail'];
$reason = $invrow['reason'];
$date = $invrow['date'];
$caseid = $invrow['id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigating </title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/theme.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/reports.css">
    <link rel="stylesheet" href="../css/complaint.css">

</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content dark" id="content">
            <div class="summary">
                <h2>Complaint Details</h2>
                <div class="complaint">
                    <h2>mediator: <?php echo $adminemail; ?></h2>
                    <h3>Complainer: <?php echo $accuser; ?></h3>
                    <h3>Accused: <?php echo $accused; ?></h3>
                    <h3>Date: <?php echo $date; ?></h3>

                    <h3>Reason</h3>
                    <p><?php echo $reason; ?></p>
                    <div class="actions flex1">
                        <a href="php/quilty.php?id=<?php echo $caseid; ?>">quilty</a>
                        <a href="php/false.php?id=<?php echo $caseid; ?>">false claim</a>
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

