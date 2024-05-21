<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digiclean</title>
    <link rel="stylesheet" href="css/landing.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <div class="container" id="container">
        <?php require 'navbar.php'; ?>
        <div class="hero" id="hero">
            <h1>Welcome to Digiclean</h1>
            <h3>your online laundry stop</h3>
            <a href="about.php">Learn more</a>
            
        </div>
        <div class="about holder">
            <h1>about digiclean</h1>
            <div class="content">
                <div class="left">
                    DigiClean is revolutionizing the laundry industry by providing a digital 
                    platform that connects customers with laundry service providers. Our user-friendly interface 
                    allows customers to easily place cleaning orders, make payments upon delivery, and rate our services 
                    for a seamless experience. Both customers and 
                    providers can register accounts to access our convenient and efficient laundry solutions.
                </div>
                <div class="image">
                    <img src="uploads/pm_1704150504187_cmp.jpg" alt="image1">
                </div>
            </div>
        </div>
        <div class="services holder">
            <h1>Our services</h1>
            <div class="content">
                <h3>Introduction</h3>
                Digiclean your go-to digital laundry service provider. 
                We offer a seamless and convenient way for you to connect with 
                top-notch laundry services in your area. Whether you need a professional 
                dry cleaning service or smart laundry solutions, we've got you covered. With 
                our easy-to-use platform, you can place your cleaning order, make secure payments 
                upon delivery, and even leave ratings and feedback for the services you receive. 
                Join our community today, and experience the future of laundry services at your fingertips.
                <h3>Smart Laundry Solutions</h3>
                Our professional dry cleaning service ensures that your garments are handled with 
                the utmost care and expertise. Using state-of-the-art equipment and premium cleaning 
                products, we guarantee a thorough and meticulous cleaning process, leaving your clothes 
                looking and feeling brand new. Trust DigiClean for all your dry cleaning needs, and enjoy 
                unparalleled quality and convenience in every order.

            </div>
        </div>
        <div class="additional-services holder">
            <h1>Additional services</h1>
            <div class="content">
                <div class="content-holder">
                    <div class="img">
                        <img src="assets/Pin.svg" alt="">
                    </div>
                    <div class="details">
                        <h4>Premium Dry-Cleaning</h4>
                        <p>
                            The first additional service we offer is our premium dry-cleaning service, 
                            perfect for delicate fabrics and garments that require extra care and attention
                            . Let us take care of your special items with the utmost precision and expertise.
                        </p>
                    </div>
                </div>
                <div class="content-holder">
                    <div class="img">
                        <img src="assets/Pin.svg" alt="">
                    </div>
                    <div class="details">
                        <h4>Express Cleaning</h4>
                        <p>
                            For our second additional service, we offer a special express 
                            cleaning option for those in a hurry. Your clothes will be cleaned and delivered in record time, 
                            ensuring you never have to wait long for your favorite outfit.
                        </p>
                    </div>
                </div>
                <div class="content-holder">
                    <div class="img">
                        <img src="assets/Pin.svg" alt="">
                    </div>
                    <div class="details">
                        <h4>
                            Eco-Friendly Cleaning
                        </h4>
                        <p>Our third additional service is our eco-friendly cleaning option, 
                            using only environmentally friendly detergents and processes to ensure minimal impact on the 
                            environment while delivering top-quality cleaning results.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq holder">
            <h1>FAQ's</h1>
            <div class="content">
                <div class="question">
                    <div class="btn qn">
                        <span>
                            Do you offer same-day laundry service?
                        </span>
                        <span class="sign">+</span>
                    </div>
                    <div class="ans shown">
                        Yes, we offer same-day laundry service for your convenience. 
                    </div>
                </div>
                <div class="question">
                    <div class="btn qn">
                        <span>
                            Can I trust the quality of the laundry service providers?
                        </span>
                         <span class="sign">+</span>
                    </div>
                    <div class="ans shown">
                        Our laundry service providers are carefully vetted to ensure high quality and reliability.
                    </div>
                </div>
                <div class="question">
                    <div class="btn qn">
                        <span>
                            Can I track my laundry order? 
                        </span>
                        <span class="sign">+</span>
                    </div>
                    <div class="ans shown">
                        You can easily track the status of your laundry order through our online platform.
                        
                    </div>
                </div>
                <div class="question">
                    <div class="btn qn">
                        <span>
                            How does the payment process work? 
                        </span>
                        <span class="sign">+</span>
                    </div>
                    <div class="ans shown">
                        All payment processes are handled directly between the customer and the provider.
                    </div>
                </div>
            </div>
        </div>
        <div class="holder contact">
            <h1>Contact us</h1>
            <div class="content">

                Get in touch with DigiClean today to experience the convenience of 
                digital laundry services. With our platform, you can easily connect with laundry service 
                providers in your area, place cleaning orders, make payments upon delivery, and provide feedback 
                on the service received . Both customers and providers can register accounts to streamline the process. 
                Contact us now to simplify your laundry experience! <br>
                <br>
                <a href="#">contact us</a>
            </div>


        </div>
        <div class="footer">
            <h4>Alaric creations</h4>
            <p>@ <?php echo date('Y'); ?>.  All rights reserved.</p>

        </div>
    </div>
    <script src="js/navbar.js"></script>
    <script src="js/faq.js"></script>
</body>
</html>