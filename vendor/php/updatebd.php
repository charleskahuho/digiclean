<?php
require '../../config/config.php';

if(!isset($_SESSION['email']) || $_SESSION['usertype'] !== "vendor"){
    header("location:".URL."login.php");
    exit; // Add exit after header redirect
}

$vendoremail = $_SESSION["email"];

// Handle form submission
if(isset($_POST["update"])){
    // Check if the file upload has no errors
    if($_FILES['pic']['error'] == UPLOAD_ERR_OK){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $desc = $_POST['desc'];
        $slogan = $_POST['slogan'];
        $hour = $_POST['hours'];
        $days = $_POST['days'];
        $profile = $_FILES['pic']['name'];
        $folder = "../../uploads/";

        if(!file_exists($folder)){
            mkdir($folder, 0755, true);
        }

        $source = $_FILES['pic']['tmp_name'];
        $profile = "pic_" . rand(1, 1000) . $profile;
        $destination = $folder . $profile;

        $upload = move_uploaded_file($source, $destination);
        if($upload){
            $sql = "update business set opentime=?, opendays=?, description=?, slogan=?, image=? where bsmail=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $hour, $days, $desc, $slogan, $profile, $vendoremail);
            $stmt->execute();
            if($stmt){
                $sql1 = "update vendor set firstname=?, lastname=? where bsmail=?";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("sss", $fname, $lname, $vendoremail);
                $stmt1->execute();
                if($stmt1){
                    $_SESSION['update'] = "details updated";
                    $stmt1->close();
                    header("location:".URL."vendor/validate.php");
                    exit();
                }
            }
            $stmt->close();
            $_SESSION['fail'] = "failed ";
            header("location:".URL."login.php");
            exit();
        } else {
            die("File upload failed");
        }
    } else {
        die("File upload error: " . $_FILES['pic']['error']);
    }
} else {
    die("Invalid form submission");
}
?>

