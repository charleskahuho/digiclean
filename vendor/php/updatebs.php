<?php
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "vendor"){
    header("location:".URL."login.php");
}

$vendoremail = $_SESSION["email"];

if(isset($_POST["update"])){
    $fname =$_POST['fname'];
    $lname =$_POST['lname'];
    $desc =$_POST['desc'];
    $slogan =$_POST['slogan'];
    $hour =$_POST['hours'];
    $days = $_POST['days'];

    $sql = "update business set opentime=?, opendays=?, description=?, slogan=? where bsmail=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $hour, $days, $desc, $slogan, $vendoremail);
    $stmt->execute();
    if($stmt){
        $sql1 = "update vendor set firstname=?, lastname=? where bsmail=?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sss", $fname, $lname, $vendoremail);
        $stmt1->execute();
        if( $stmt1 ){
            $_SESSION['update'] = "details updated";
            $stmt1->close();
            header("location:".URL."vendor/validate.php");
            exit();
        }

    }
    $stmt->close();
    $_SESSION['fail'] = "failed ";
    header("location:".URL."login.php");
    exit();
}