<?php
require '../../config/config.php';


if(isset($_GET['id'])){
    $id = $_GET['id'];
    // $sql = "select from orders where id=$id";
    $sql = "SELECT * FROM `orders` WHERE orders.id = $id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            // var_dump($row);

            // $pdf = new PDF();
            echo "receipt number: {$row['id']} not available currently <hr>";
        }
    }else{
        echo "no receipt processing ";
    }
}
?>

<a href="../order.php">Go back</a>