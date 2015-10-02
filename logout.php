<?php
require_once("src/connection.php");

session_start();

unset($_SESSION['user']);
header("Location: login.php");