<?php
require 'php/session.php';

$sql = "select * from business where bsmail='$vendoremail'";
$result = $conn->query($sql);
$row= $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiting for approval</title>
    <link rel="stylesheet" href="../css/validate.css">
</head>
<body>
    <div class="container">
        <?php
        if($row['opentime'] == null || $row['opendays'] == null || $row['description'] == null || $row['slogan'] == null){

    
        ?>
        <div class="notice">
            <p class="intro">Hello <?php echo $vendoremail; ?> welcome to the approval page</p>
            <p>
                here you are require to provide more detaild to aid the approval of your business 
            </p>
            <p>KIndly fill all the requested details in the form below.</p>
            <em>All details are required. leaving any empty will not aid the approval process and you won't be approved</em>
        </div>
        <div class="form">
            <form action="php/updatebd.php" method="post">
                <div class="input-box">
                    <label for="fname">Owner firstname</label>
                    <input type="text" name="fname" id="fname" required>
                </div>
                <div class="input-box">
                    <label for="lname">Lastname</label>
                    <input type="text" name="lname" id="lname" required>
                </div>
                <div class="input-box">
                    <label for="desc">Business description</label>
                    <textarea name="desc" id="desc" cols="30" rows="10" minlength="40" required></textarea>
                </div>
                <div class="input-box">
                    <label for="slogan">Business slogan</label>
                    <input type="text" name="slogan" id="slogan" required>
                </div>
                <div class="input-box">
                    <label for="pic">Profile picture</label>
                    <input type="file" name="pic" id="pic">
                </div>
                <div class="input-box">
                    <label for="hours">Business hours</label>
                    <input type="text" name="hours" id="hours" placeholder="8Am - 8PM etc... recomended capital letters" required>
                </div>
                <div class="input-box">
                    <label for="days">Business days</label>
                    <input type="text" name="days" id="days" required placeholder="monday-friday , all week recomended do not list days">
                </div>
                <div class="btns">
                    <button type="submit" name="update">Submit details</button>
                </div>
            </form>
        </div>
        
        <?php
        }else{

        
        ?>
        <div class="wait">
            Your details have been submitted please wait for the admin to review them. <br>
            <a href="./validate.php">Check now</a>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>