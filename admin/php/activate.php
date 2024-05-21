<?php
require '../../config/config.php';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $result = $conn->query("update admin set state='active' where email='$email'");
    if($result){
        header("location:".URL."admin/added.php");
        exit();
    }
}