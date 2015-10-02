<?php
require_once ("user.php");

$servername = "localhost";
$username = "root";
$password = "coderslab";
$baseName = "warsztaty";
// Tworzymy nowe po³¹czenie
$conn = new mysqli($servername, $username, $password, $baseName);
// Sprawdzamy czy po³¹czcenie siê uda³o

if ($conn == false){
    die("Cannot connect to database");
}
//echo ("Connection works");

User::setConnection($conn);
/*$createdUser = User::register("test@test.pl", "haslo1", "haslo1", "jakisopis");
var_dump ($createdUser);
*/

$logUser = User::logIn("test@test.pl", "haslo1");
//$logUser->setDescription("jakis nowy opis po zmianie");
//$logUser->saveToDB();

// var_dump ($logUser);

/*
if ($conn->connect_error) {
    die("Polaczenie nieudane. Blad: " . $conn->connect_error);
}
echo "Polaczenie udane.";
*/
