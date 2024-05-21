<?php
require 'php/session.php';

$sql = "select * from business";
$result =$conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php'; ?>
        <div class="content" id="content">
            <div class="summary border">
                <h2>Marketplace</h2>
                <div class="holder4 special ">
                    <div class="profile interior">
                        <img src="../assets/Screenshot from 2024-05-02 22-46-15.png" alt="logo">
                    </div>
                    <div class="name interior flexy">
                        Service provider
                    </div>
                    <div class="status interior flexy">
                        <span>Status</span>
                        <span>Action</span>
                    </div>
                </div>
                <?php 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                ?>
                <div class="holder4">
                    <div class="profile interior">
                        <img src="../assets/Screenshot from 2024-05-02 22-46-15.png" alt="logo">
                    </div>
                    <div class="name interior flexy">
                        <?php echo $row['name'];?>
                    </div>
                    <div class="status interior flexy">
                        <span><?php echo $row['state'] ?></span>
                        <span><a href="details.php?id=<?php echo $row['id']; ?>">Visit</a></span>
                    </div>
                </div>
                <?php
                    }
                } else {
                ?>
                <div class="holder4 fail ">
                    NO LISTED VENDORS 
                    <!-- you can register as a vendor to see yourself <br>
                    <a href="php/destroy.php?email=<?php $customeremail; ?>">Here</a>  to see yourself listed . -->
                </div>
                <?php
                }
                ?>
            </div>
            <div class="summary">
                <div class="holder4 interest">
                    Intresed in being a vendor or want to register as a vendor? <br>
                    <a href="php/destroy.php?email=<?php $customeremail; ?>">Visit here to register</a>
                    <em>Be warned you will be logged out if you click the link, login again to 
                        resume your activites</em>
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