<?php
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "customer"){
    header("location:".URL."login.php");
}
$customeremail = $_SESSION['email'];

if(isset($_POST['change'])){
    #confirm old password
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['password'];
    $confpass = $_POST['cpass'];
    $confirm = "select * from login where email='$customeremail'";
    $confres = $conn->query($confirm);
    if($confres->num_rows == 1){
        $confrow = $confres->fetch_assoc();
        $olderpassverify = password_verify($oldpass, $confrow['password']);
        // echo $olderpassverify;
        // die();
        if($olderpassverify ){
            $match = $newpass === $confpass;
            if($match){
                $newpass = password_hash($newpass, PASSWORD_DEFAULT);

                $sql = "update login set password='$newpass' where email='$customeremail'";
                $result = $conn->query($sql);
                if($result){
                    //insert cde here to mail user alerting password change and issue recovery link

                    //end of email code
                    $_SESSION['pass'] = "password updated sucessfully";
                    header("location:".URL."customer/changepass.php");
                }else{
                    $_SESSION['pass'] = "password not updated";
                    header("location:".URL."customer/changepass.php");
                }

            }else{
                $_SESSION['error'] = "new password not matching";
                header("location:".URL."customer/changepass.php");
            } 
        }else{
            $_SESSION['old'] = "entered old password is wrong";
            header("location:".URL."customer/changepass.php");
        }
    }else{
        $_SESSION['query'] = "Passing sql query has an error";
         header("location:".URL."customer/changepass.php");
    }
}


require "../close.php";