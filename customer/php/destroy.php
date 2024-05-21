<?php
require '../../config/config.php';
if(isset($_GET['email'])){
    session_destroy();
    header('location:'.URL.'business.php');
}

require "../close.php";