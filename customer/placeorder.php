<?php
require 'php/session.php';

// <!-- $email = $_SESSION['email']; -->

if(isset($_GET['email'])){
    $vendor = $_GET['email'];
    $_SESSION['enable'] = "readonly";
}else{
    $vendor = "";
}

if(isset($_POST['order'])){
    $vendormail = $_POST['bsmail'];
    $location = $_POST['location'];
    $content = $_POST['content'];

    $sql = "insert into orders(email, pickup, content, vendoremail) values(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $customeremail, $location, $content, $vendormail);
    $stmt->execute();
    if($stmt){
        header("location:order.php");
    }else{
        echo "failed";

    }
}



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
    <link rel="stylesheet" href="../css/placeorder.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="summary">
                <form action="" method="post">
                    <h1>Place order</h1>
                    <div class="input-box flex-column">
                        <label for="cmail">Customer email</label>
                        <input type="email" name="cmail" id="cmail" value="<?php echo $customeremail; ?>" readonly>
                    </div>
                    <div class="input-box flex-column">
                        <label for="bsmail">Vendor mail</label>
                        <input type="email" name="bsmail" id="bsmail" value="<?php echo $vendor; ?>" 
                        <?php if(isset($_SESSION['enable'])){ echo $_SESSION['enable']; } ?>>
                    </div>
                    <div class="input-box flex-column">
                        <label for="location">Pickup location</label>
                        <input type="text" name="location" id="location">
                    </div>
                    <div class="input-box flex-column">
                        <label for="content">Order details</label>
                        <!-- <input type="text" name="content" id="content"> -->
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>
                    </div>
                    <div class="btns flex-column">
                        <button type="submit" name="order">Place order</button>
                    </div>
                </form>
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
