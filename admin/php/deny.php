<?php
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "admin"){
    header("location:".URL."login.php");
}
$adminemail = $_SESSION['email'];



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = $conn->query("update business set approval='denied' where id=$id");
    if($sql){

        $sql1 = "select * from business where id='$id'";
        $result1 = $conn->query($sql1);
        // $row1 = $result1->fetch_assoc();
        $row = $result1->fetch_assoc() ;
        $ids = $row["id"];
        $email = $row["bsmail"];
        $check = "select * from denials where bsemail='$email'";
        $checkres = $conn->query($check);
        if ($checkres->num_rows >= 1) {
            $checkrow = $checkres->fetch_assoc();
            $count = $checkrow["count"];
            $newid = $checkrow["id"];
            $count = $count + 1;
            $insert = "UPDATE `denials` SET `count` = $count WHERE `denials`.`id` = $newid;";
            $rest = $conn->query($insert);
        }else{
            $count = 1;
            $insert = "insert into denials(bsemail, admin, count) values('$email', '$adminemail', $count)";
        $rest = $conn->query($insert);

        }
        // $rest = $conn->query($insert);
        // $state = "denied";
        if($rest){
            $_SESSION['update'] = "appplication denied for the $count time";
        }
    }

    header("location:".URL."admin/businesses.php");
}
