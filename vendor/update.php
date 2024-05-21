<?php
require 'php/session.php';

if (isset($_POST['update'])) {
    $slogan = $_POST['slogan'];
    $desc = $_POST['desc'];
    $time = $_POST['time'];
    $days = $_POST['days'];
    $sql = "update business set slogan=? , description=?, opentime=?, opendays=? where bsmail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $slogan, $desc, $time, $days, $vendoremail);
    $stmt->execute();
    if ($stmt) {
        $_SESSION['update'] = "details update was sucessful";
    }else{
        $_SESSION["update"] = "details update failed";
    }
    header("location:updatedetails.php");
    exit();
}
