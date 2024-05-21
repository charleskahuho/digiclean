<?php

require ("../config/config.php");

if(isset($_POST['login'])){
    // echo "sucess here";
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['pass'];
    #check fouser in databases
    $sql = "select * from users where email='$email'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $useremail = $row["email"];
        $_SESSION['email'] = $useremail;
        $usertype = $row["usertype"];
        $_SESSION['usertype'] = $usertype;
        $check = "select * from login where email='$useremail'";
        $checkres = $conn->query($check);
        if($checkres->num_rows == 1){
            $checkrow = $checkres->fetch_assoc();
            $passhash = password_verify($password, $checkrow["password"]);
            if($passhash){
                if($usertype == "admin"){
                    
                    header("location:".URL."admin/admin.php");
                    exit();
                }elseif($usertype == "customer"){
                    header("location:".URL."customer/customer.php");
                    exit();
                }elseif($usertype == "vendor"){
                    header("location:".URL."vendor/validate.php");
                    exit();
                }
            }else{
                $_SESSION['fail'] = "invalid details";
                header("location:".URL."login.php");
                exit();
            }
        }else{
            $_SESSION['fail'] = "invalid details";
            header("location:".URL."login.php");
            exit();
        }
            
    }else{
        $_SESSION['fail'] = "invalid details";
        header("location:".URL."login.php");
        exit();
    }


    
}

