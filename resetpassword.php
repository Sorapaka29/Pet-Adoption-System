<?php 
$servername="localhost";
$username= "root";
$password= "";
$database="registration_db";
$port = "3301";
$email = $_POST["email"];
$pwd = $_POST["confirmPassword"];
$connect= mysqli_connect($servername, $username, $password, $database, $port);
$connect -> query("update reg set pwd = '$pwd', cpwd = '$pwd' where e_mail = '$email';");
header("location: petlogin.php");
?>