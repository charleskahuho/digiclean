<?php
require 'php/session.php';

$pending = "select * from orders where email='$customeremail' and state='pending'";
$canceled = "select * from orders where email='$customeremail' and state='canceled'";
$completed = "select * from orders where email='$customeremail'";
//results for pending query
$pendres = $conn->query($pending);
//result for canceled query
$cancres = $conn->query($canceled);
//results for completed query
$campres = $conn->query($completed);

$bsnlist = $conn->query("select * from business");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer orders</title>
    <link rel="stylesheet" href="../css/design.css">
    <link rel="stylesheet" href="../css/customer.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/more.css">
</head>
<body>
    <div class="container">
        <?php require 'sidebar.php';  ?>
        <div class="content" id="content">
            <div class="summary order-summary border">
                <h2>Pending orders</h2>
                <?php
                    if($pendres->num_rows > 0) {
                        $i = 1;
                        while($rowpend = $pendres->fetch_assoc()) {
                            $id = $rowpend['id'];     
                ?>
                <div class="holder3">
                    <div class="id interior">
                        <?php echo $i; ?>
                    </div>
                    <div class="details interior flexy">
                    <?php echo $rowpend['content']; ?>
                    </div>
                    <div class="actions interior flexy">
                        <a href="./php/cancel.php?id=<?php echo $id;?>">Cancel order</a>
                        <a href="./php/delete.php?id=<?php echo $id; ?>">Delete order</a>

                    </div>
                </div>
                <?php
                    $i++;
                        }
                    }else{
                        ?>
                    <div class="holder3 lack">
                        <div class="interior id flexy">
                            0
                        </div>
                        <div class="details interior flexy">
                            You currently have no pending orders
                        </div>
                        <div class="actions interior flexy">
                            no actions to take
                        </div>
                    </div>
                    <?php
                    }
                    ?>
            </div>
            <div class="summary order-summary border">
                <h2>Completed orders</h2>
                <?php
                if($campres->num_rows > 0) {
                    $i = 1;
                    while($rowcomp = $campres->fetch_assoc()) {
                        $id = $rowcomp['id'];
                        $paid = $rowcomp['paid'];
                        $receive = $rowcomp['received'];
                        ?>
                <div class="holder3">
                    <div class="id interior">
                        <?php echo $i; ?>
                    </div>
                    <div class="details interior flexy">
                        <?php echo $rowcomp['content']; ?>
                    </div>
                    <div class="actions interior flexy">
                        <!-- <a href="#">Rorder</a> -->
                        <a href="./php/receipt.php?id=<?php echo $id; ?>">Receipt</a>
                        <?php 
                           if($paid == "no" || $receive == "no"){
                            ?>
                        <a href="./php/receive.php?id=<?php echo $id;?>">Receive order</a>
                        <?php } else{
                            echo "order completed";
                        }  ?>
                    </div>
                </div>
                <?php
                $i++;
                    }
                }else{
                    ?>
                    <div class="holder3 lack">
                        <div class="interior id flexy">
                            0
                        </div>
                        <div class="details interior flexy">
                            You currently have no completed orders
                        </div>
                        <div class="actions interior flex1">
                            no actions to take
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="summary order-summary border">
            <h2>Cancelled orders</h2>
            <?php 
            if($cancres->num_rows > 0) {
                $i = 1;
                while($rowcanc = $cancres->fetch_assoc()) {
                    $id = $rowcanc['id'];
            ?>
                <div class="holder3">
                    <div class="id interior">
                    <?php echo $i; ?>
                    </div>
                    <div class="details interior flexy">
                    <?php echo $rowcanc['content']; ?>
                    </div>
                    <div class="actions interior flexy">
                        <a href="./php/enable.php?id=<?php echo $id; ?>">Enable order</a>
                        <a href="./php/delete.php?id=<?php echo $id; ?>">Delete order</a>
                    </div>
                </div>
                <?php
                $i++;
                }
            }else{
                ?>
                <div class="holder3 lack">
                        <div class="interior id flexy">
                            0
                        </div>
                        <div class="details interior flexy">
                            You currently have no canceled orders
                        </div>
                        <div class="actions interior flexy">
                            no actions to take
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
            <?php
            if($bsnlist->num_rows > 0) {
            ?>
            <div class="more">
                <a href="placeorder.php">Place order</a>
            </div>
            <?php
            }else{
            ?>
            <div class="more">
                no vendors registerd currrently hence you cannot make an order.
            </div>
            <?php }?>
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
