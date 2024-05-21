<?php
 require '../../config/config.php';

 if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "vendor"){
    header("location:".URL."login.php");
}

$email = $_SESSION["email"];
// echo"".$email."";
// die();
$sql = "delete from login where email='$email'";
$delete1 =$conn->query($sql);
$sql1 = "delete from vendor where bsmail='$email'";
$delete2 =$conn->query($sql1);
$sql2 = "delete from business where bsmail='$email'";
$delete3 =$conn->query($sql2);
$sql3 = "delete from users where email='$email'";
$delete4 =$conn->query($sql3);
if($delete1 && $delete2 && $delete3 && $delete4){
    session_destroy();
    $conn->close();
}
header("location".URL."index.php");
exit();