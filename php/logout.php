<?php

require "../config/config.php";

session_destroy();
header("location:".URL."login.php");
