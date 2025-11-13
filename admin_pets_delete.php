<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "pets";  
$pet_id = $_POST['pet_id'];
$port = "3301";
$conn= mysqli_connect($servername, $username, $password, $database, $port);
$sql = "Delete from pets where pet_id = '$pet_id'"; 
$conn -> query($sql);
header('location: admin_doner.php');

?>