<?php
require 'php/session.php';


#selecting the email from business details
$business = "select * from business where bsmail='$vendoremail'";
$bsnres  = $conn->query($business);
$bsnrow = $bsnres->fetch_assoc() ;
if($bsnrow["approval"] == "pending"){
    header("location:".URL."vendor/waitapproval.php");
    exit();
}
if($bsnrow["suspended"] === "yes"){
    header("location:".URL."vendor/suspended.php");
    exit();
}else{
    $vendoremail = $_SESSION['email'];
    header("location:".URL."vendor/vendor.php");
    exit();
}
// $conn->close();
