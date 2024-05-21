<?php
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "admin"){
    header("location:".URL."login.php");
}
$adminemail = $_SESSION['email'];

if(isset($_POST['add']) ){
    $adminemail = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['sname'];
    $contact = $_POST['contact'];
    $defpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $usertype = "admin";
    $token = rand();



    // echo ''.$adminemail.''.$fname.''.$lname.''.$defpass.'';

    $check = "select * from users where email='$adminemail'";
    $checkres = $conn->query($check);
    if($checkres->num_rows == 0){
        // echo "luck";
        $insertuser = "insert into users(email, usertype, contact) values(?,?,?) ";
        $userstmt = $conn->prepare($insertuser);
        $userstmt->bind_param("ssi", $adminemail, $usertype, $contact);
        $userstmt->execute();
        // $userstmt->close();
        if($userstmt->affected_rows == 1){
            $insertadmin = "insert into admin(firstname, lastname, email,addedby, token) values(?,?,?,?,?)";
            $adminstmt = $conn->prepare($insertadmin);
            $adminstmt->bind_param("ssssi", $fname,$lname, $adminemail, $adminemail, $token);
            $adminstmt->execute();
            // $userstmt->close();
            if($adminstmt->affected_rows == 1){
                $insertlogin = "insert into login(email, password) values(?,?)";
                $loginstmt = $conn->prepare($insertlogin);
                $loginstmt->bind_param("ss", $adminemail, $defpass);
                $loginstmt->execute();
                // $userstmt->close();
                if($loginstmt->affected_rows == 1){
                    $_SESSION['ok'] = "admin added sucessully";                    
                }else{
                    $_SESSION["ok"] = "login not enabled";
                }
            }else{
                $_SESSION["ok"] = "admin add failed";
            }
        }else{
            $_SESSION["ok"] = "user registration failed";
        }
    }else{
        $_SESSION["ok"] = "email arleady exists";
    }
    header("location:".URL."admin/adminadd.php");
    // $conn

}