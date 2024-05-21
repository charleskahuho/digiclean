<?php
require 'php/session.php';

$email = $_SESSION['email'];
$sql ="select * from admin where email='$email'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();



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
    <link rel="stylesheet" href="../css/placeorder.css">
    <link rel="stylesheet" href="../css/password.css">
    <link rel="stylesheet" href="../css/more.css">
    <link rel="stylesheet" href="../css/theme.css">

</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="summary border">
                <form action="php/adminadd.php" method="post">
                    <h1>Add admin</h1>
                    <div class="input-box flex-column">
                        <label for="fname">Firstname</label>
                        <input type="text" name="fname" id="fname" required>
                    </div>
                    <div class="input-box flex-column">
                        <label for="sname">Lastname</label>
                        <input type="text" name="sname" id="sname" required>
                    </div>
                    <div class="input-box flex-column">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="input-box flex-column">
                        <label for="contact">Phone number</label>
                        <input type="number" name="contact" id="contact">
                    </div>
                    <div class="input-box flex-column">
                        <label for="password">Default password</label>
                        <span>
                            <input type="password" name="password" class="password" required value="password">
                            <button type="button" class="show">Show</button>
                        </span>
                    </div>
                    <div class="btns">
                        <button type="submit" name="add">Add admin</button>
                    </div>
                </form>
                <div class="session">
                    <?php
                    if(isset($_SESSION['ok'])){
                        echo ''.$_SESSION['ok'].'';
                        unset($_SESSION['ok']);
                    }
                    ?>
                </div>
            </div>
                <div class="more ">
                    <a href="added.php?token=<?php $row['token'] ?>"> admins added by you</a>
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
    <script src="../js/password.js"></script>
</body>
</html>

