<?php
require 'php/session.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('location:customer.php');
}



$sql = "select * from business where id =$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


if(isset($_POST['lodge'])){
    $rcpt = $row['bsmail'];
    $msg = $_POST['reason'];
    $token = rand() . rand() . rand();
    $rpt = "insert into reportbs(bsemail, accuser, reason, token) values(?,?,?,?)";
    $stmt =$conn->prepare($rpt);
    $stmt->bind_param("sssi", $rcpt, $customeremail, $msg, $token);
    $stmt->execute();

    header("location:explore.php");


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporting <?php echo $row['name']; ?> </title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/report.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php' ?>
        <div class="content warn" id="content">
            <div class="summary"></div>
            <!-- reporting <?php echo $row['name']; ?> -->
            <div class="warning">
                <h3>You are attempting to report <?php echo $row['name']; ?> shop</h3>
                <p>If this is a false allegation you will likely be subdugated to law charges by the organisation</p>
                <em>Remember Digiclean has nothing to do with your complaint/report we will check into it and hand matter over to the 
                    law to deal with.</em>
                <p>For fairness you are required to provide a reason as to why you are reporting this organisation</p>
                <form action="#" method="post">
                    <textarea name="reason" id="reason" cols="40" rows="10" required minlength="50"></textarea> <br>
                    <button type="submit" name="lodge">Report</button>
                </form>
            </div>
        </div>
    </div>
    <script src="../js/duration.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/back.js"></script>
</body>
</html>
<?php
unset($_GET['id']);