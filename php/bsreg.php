<?php

require ("../config/config.php");
// require ("../config/error.php");

if (isset($_POST["register"])) {

    $bsname =$_POST['name'];
    $bsemail = filter_var($_POST['bsemail'], FILTER_VALIDATE_EMAIL);
    $owemail = filter_var($_POST['owemail'], FILTER_VALIDATE_EMAIL);
    $location =  $_POST['location'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpass'];
    $contact = $_POST['contact'];
    $usertype = "vendor";
    $passconf = $pass == $cpass;
    $token = rand() . rand();

    if($passconf){
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "insert into users(email, usertype, contact) values(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $bsemail, $usertype, $contact);
        $stmt->execute();
        $insert = "insert into login (email, password) values(?,?)";
        $stmt1 = $conn->prepare($insert);
        $stmt1->bind_param("ss", $bsemail, $pass);
        $stmt1->execute();

        $insert1 = "insert into business (name, location, bsmail, ownermail,token) values(?,?,?,?,?)";
        $stmt2 = $conn->prepare($insert1);
        $stmt2->bind_param("ssssi", $bsname, $location, $bsemail, $owemail, $token);
        $stmt2->execute();
        $insert2 = "insert into vendor (email, bsmail) values(?,?)";
        $stmt3 = $conn->prepare($insert2);
        $stmt3->bind_param("ss", $owemail, $bsemail);
        $stmt3->execute();
        $_SESSION['fail'] = "business registered successfully";
        $stmt->close();
        $stmt1->close();
        $stmt2->close();
        $stmt3->close();

        
        header("location:".URL."bs.php");
        exit();
    }else{
        $_SESSION['fail'] = "password not matching";
        header("location".URL."business.php");
    }
}
$conn->close();