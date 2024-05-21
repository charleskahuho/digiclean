<?php
require '../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "customer"){
    header("location:".URL."login.php");
}
$customeremail = $_SESSION['email'];