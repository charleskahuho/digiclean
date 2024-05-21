<?php
require 'php/session.php';

if(isset($_GET['email'])){
    $email = $_GET['email'];
    echo 'booyah';;
    $array = ['users', 'customer', 'login'];
    foreach ($array as $table) {
        echo $table;
        $sql = "delete from $table where email='$email'";
        $result = $conn->query($sql);
        if($result){
            session_destroy();
            // header("location:customer.php");
            header("location:".URL."login.php");

        }else{
            echo "failed delete";
        }   
    }
}
