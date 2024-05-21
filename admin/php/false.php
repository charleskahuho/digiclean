<?php
/**
 * script for setting business quilty 
 * sets status to investigated and quilty to default
 * case is invalid here
 * adds admin responsible as mediator
 * 
 */
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "admin"){
    header("location:".URL."login.php");
}
$adminemail = $_SESSION['email'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = "update reportbs set quilty='no', status='investigated', mediator='$adminemail'  where id=$id";
$result = mysqli_query($conn, $sql);
if($result){
    echo "sucess";
}else{
    echo "fail";
}
header("location:".URL."admin/reports.php");
exit();