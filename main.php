<?php

require_once ("src/connection.php");
session_start();


if(isset($_SESSION['user'])== false) {
    header("Location: login.php");
    }

$myUser = $_SESSION['user'];
echo ("Witaj {$myUser->getEmail()}");
