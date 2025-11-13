<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_doner_db";  
$pet_id = $_POST['pet_id'];
$port = "3301";
$conn= mysqli_connect($servername, $username, $password, $database, $port);
$sql = "SELECT * FROM admin_doner where pet_id='$pet_id';";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
$e_mail = $_SESSION['email'];
$breed = $row["breed"];
$type = $row["type"];
$origin = $row["origin"];
$size = $row["size"];
$lifespan = $row["lifespan"];
$temperament = $row["temperament"];
$coat = $row["coat"];
$color = $row["color"];
$care = $row["care"];
$exercise = $row["exercise"];
$training = $row["training"];
$personality = $row["personality"];
$health_concerns = $row["health_concerns"];
$price = $row["price"];
$sql = "Insert into admin_doner_approved(email, breed, type, origin, size, lifespan, temperament, coat, color, care, exercise, training, personality, health_concerns, price) values('$e_mail','$breed', '$type', '$origin', '$size', '$lifespan', '$temperament', '$coat', '$color', '$care', '$exercise', '$training', '$personality', '$health_concerns', '$price')"; 
$conn -> query($sql);
$sql = "Delete from admin_doner where pet_id = '$pet_id'";
$conn -> query($sql);
$conn= mysqli_connect($servername, $username, $password, "pets", $port);
$sql = "Insert into pets(email, breed, type, origin, size, lifespan, temperament, coat, color, care, exercise, training, personality, health_concerns, price) values('$e_mail','$breed', '$type', '$origin', '$size', '$lifespan', '$temperament', '$coat', '$color', '$care', '$exercise', '$training', '$personality', '$health_concerns', '$price')"; 
$conn -> query($sql);
header('location: admin_doner.php');

?>