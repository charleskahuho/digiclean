<?php
/**
 * script for updating a business approval
 */
require '../../config/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->query("update business set approval='approved' where id=$id");

    if($sql){
        $_SESSION['update'] = "business approved";
    }
    header("location:".URL."admin/businesses.php");
}
