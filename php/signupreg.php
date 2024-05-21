<?php

require ("../config/config.php");



if(isset($_POST["signup"])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm =$_POST['cpass'];
    $contact = $_POST['contact'];
    $usertype = "customer";
    $passconf = $password == $confirm;
    if($passconf){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql ="insert into users(email, usertype, contact) values(?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $email, $usertype, $contact);
        $stmt->execute();
        $insert = "insert into login(email, password) values(?,?)";
        $stmt1 = $conn->prepare($insert);
        $stmt1->bind_param("ss", $email, $password);
        $stmt1->execute();
        $insert1 = "insert into customer(firstname, lastname, email) values(?,?,?)";
        $stmt2 = $conn->prepare($insert1);
        $stmt2->bind_param("sss", $fname, $lname, $email);
        $stmt2->execute();
        $_SESSION['fail'] = "registered successfully";
        $stmt->close();
        $stmt1->close();
        
        $stmt2->close();
        header("location:".URL."ss.php");
    }else{
        $_SESSION['fail'] = "Password not matching";
        header("location:".URL."signup.php");
    }

}
$conn->close();