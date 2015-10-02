<?php

require_once ("src/connection.php");
session_start();

if($_SERVER[REQUEST_METHOD]=='POST'){
    $user = User::logIn($_POST['mail'], $_POST['password']);
    if ($user != false){
        $_SESSION['user'] = $user;
        header('Location: main.php');
    }
    echo("Z³y login lub haslo");
}

?>

<form action = "login.php" method="post">
    <input type="text" name="mail" placeholder="Enter email">
    <input type="text" name="password" placeholder="Enter password">
    <input type="submit" value="login">
</form>
