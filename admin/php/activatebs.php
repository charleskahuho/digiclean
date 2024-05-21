<?php
require '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->query("update business set suspended='no' where id=$id");

    if($sql){
        $_SESSION['update'] = "business approved";
    }
    header("location:".URL."admin/allbs.php");
}
