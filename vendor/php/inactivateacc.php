<?php
 require '../../config/config.php';

 if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "vendor"){
    header("location:".URL."login.php");
}

$vendoremail = $_SESSION["email"];

$sql = $conn->query("update business set state='inactive' where bsmail='$vendoremail'");
if($sql){
    header("location:".URL."vendor/decisions.php");
    exit();
}