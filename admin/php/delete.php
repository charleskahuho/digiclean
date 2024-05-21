<?php
/**
 * script for deleting admins from system
 */
require '../../config/config.php';
 if(isset($_GET['email'])){
    $email = $_GET['email'];
    echo $email;
    $user =$conn->query("delete from users where email='$email'");
    if($user){
        echo "deleted from users table";
        echo "<br>";
        $admin = $conn->query("delete from admin where email ='$email'");
        if($admin){
            echo "deleted from admin tables";
        }

    }
    $_SESSION['act'] = "admin deleted"; 
    header("location:".URL."admin/added.php");
    exit();

 }
