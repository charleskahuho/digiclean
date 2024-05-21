<?php
require '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

$sql = "update orders set state='completed' where id='$id'";
$result= $conn->query($sql);
if ($result) {
    header("location:".URL."vendor/placedorders.php");
    exit();
}