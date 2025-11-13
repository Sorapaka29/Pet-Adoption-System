<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_buy_db";  
$buy_database = "pets";
$pet_id = $_POST['pet_id'];
$port = "3301";
$conn= mysqli_connect($servername, $username, $password, $database, $port);
$conn_pets= mysqli_connect($servername, $username, $password, $buy_database,$port);
$sql = "SELECT * FROM admin_buy where pet_id='$pet_id';";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
$e_mail = $_SESSION['email'];
$pet_name = $row['pet_name'];
$Buyer_name = $row['buyer_name'];
$phone = $row['phone'];
$preference = $row['preference'];
$sql = "Insert into admin_approved_orders(email, pet_id, pet_name, buyer_name, phone, preference) values('$e_mail','$pet_id','$pet_name','$Buyer_name','$phone','$preference')"; 
$conn -> query($sql);
$sql = "Delete from admin_buy where pet_id = '$pet_id'"; 
$conn -> query($sql);
$conn= mysqli_connect($servername, $username, $password, "buy_db", $port);
$sql = "Insert into buy(email, pet_name, buyer_name, phone, preference) values('$e_mail','$pet_name','$Buyer_name','$phone','$preference')"; 
$conn -> query($sql);
header('location: admin_buy.php');
?>