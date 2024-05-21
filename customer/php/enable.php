<?php

//  require 'session.php';
require '../../config/config.php';
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "update orders set state='pending' where id=$id";
    $result = $conn->query($sql);
    if(!$result){
        echo "fail";
        // die();
    }
    echo"sucess";
    header("location:".URL."customer/order.php");


 }
 require "../close.php";