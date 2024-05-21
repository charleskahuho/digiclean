<?php
require '../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "admin"){
    header("location:".URL."login.php");
}
$adminemail = $_SESSION['email'];