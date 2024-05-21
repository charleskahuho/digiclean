<?php
require '../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "vendor"){
    header("location:".URL."login.php");
}

$vendoremail = $_SESSION["email"];
