<?php
 require 'php/session.php';

// if(!isset($_GET['token'])){
//     header('location:'.URL.'admin/admin.php');
// }

$added = "select * from admin where addedby='$adminemail' and state='active'";
$addedreslt = $conn->query($added);

$suspended = "select * from admin where addedby='$adminemail' and state='inactive'";
$suspendedreslt = $conn->query($suspended);


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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/theme.css">

    <!-- <link rel="stylesheet" href="../css/password.css"> -->
    <!-- <link rel="stylesheet" href="../css/more.css"> -->
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <!-- <h2>Admins accounts created by you</h2> -->
            <div class="summary border">
                <h2>Active</h2>
                <?php
                if($addedreslt->num_rows > 0){
                    $i = 1;
                    while($rowadded = $addedreslt->fetch_assoc()){
                ?>
                <div class="holder7">
                    <div class="num flexy">
                        <?php echo $i; ?>
                    </div>
                    <div class="email flexy">
                    <?php echo $rowadded['email']; ?>
                    </div>
                    <div class="act flex1">
                        <a href="php/suspend.php?email=<?php echo $rowadded['email']; ?>">Suspend</a>
                        <a href="php/delete.php?email=<?php echo $rowadded['email']; ?>">Delete</a>
                    </div>
                </div>
                <?php
                $i++;
                    }
                }else{
                ?>
                <div class="holder7 empty">
                    No active admin added by you;
                </div>
                <?php }?>

            </div>
            <div class="summary">
                <h2>Suspended admins</h2>
                <?php
                if($suspendedreslt->num_rows > 0){
                    $i = 1;
                    while($rowsuspended = $suspendedreslt->fetch_assoc()){
                ?>
                <div class="holder7">
                    <div class="num flexy">
                    <?php echo $i; ?>
                    </div>
                    <div class="email flexy">
                    <?php echo $rowsuspended['email']; ?>
                    </div>
                    <div class="act flex1">
                        <a href="php/activate.php?email=<?php echo $rowsuspended['email']; ?>">activate</a>
                        <a href="php/delete.php?email=<?php echo $rowsuspended['email']; ?>">Delete</a>
                    </div>
                </div>
                <?php
                $i++;
                    }
                }else{
                ?>
                <div class="holder7 empty">
                    No suspended admins
                </div>
                <?php } ?>


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

