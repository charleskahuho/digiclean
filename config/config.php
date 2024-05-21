<?php

require ("error.php");

session_start();
define('SERVER', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'digiclean');
define('URL', 'http://localhost/digiclean/');

$conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
if(!$conn){
    die("connection error" . $conn->connect_error);
}
