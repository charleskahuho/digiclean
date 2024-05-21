<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiClean contact</title>
    <link rel="stylesheet" href="./css/landing.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <div class="container" id="container">
        <?php require 'navbar.php'; ?>
        <div class="about-hero contact-hero">
            <h4>Get in touch</h4>
            <h2>Revolutionize Your Laundry Experience</h2>
        </div>
        <div class="holder form">
            <div class="content">
                <div class="left">
                    <h1>contact us</h1>
                    <form action="#" method="post">
                        <div class="input-box">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" required>
                        </div>
                        <div class="input-box">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" id="subject" required>
                        </div>
                        <div class="input-box">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="others">
                    <h2>find us on</h2>
                    <a href="#">
                        <img src="assets/icons/facebook.png" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/icons/new.png" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/icons/telegram.png" alt="">
                    </a>
                    <a href="#">
                        <img src="assets/icons/twitter (1).png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="footer">
            <h4>Alaric Creation</h4>
            <p>@<?php echo date('Y'); ?>. All rights reserved</p>
        </div>
    </div>
    <script src="js/navbar.js"></script>
</body>
</html>