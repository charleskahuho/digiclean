<?php
/**
 * script for invalidating a claim
 * sets status to investigated leaves quilty as default 
 * adds admin responsible for decision as mediator
 *  
 */
require '../../config/config.php';

if(!isset($_SESSION['email']) && $_SESSION['usertpye'] !== "admin"){
    header("location:".URL."login.php");
}
$adminemail = $_SESSION['email'];

