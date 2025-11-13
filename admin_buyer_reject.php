<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_buy_db";  
$pet_id = $_POST['pet_id'];
$port = "3301";
$conn= mysqli_connect($servername, $username, $password, $database, $port);
$sql = "SELECT * FROM admin_buy where pet_id='$pet_id';";
$result = $conn->query($sql);
$row = $result -> fetch_assoc();
$e_mail = $_SESSION['email'];
$pet_name = $row['pet_name'];
$Buyer_name = $row['buyer_name'];
$phone = $row['phone'];
$preference = $row['preference'];
$sql = "INSERT INTO admin_rejected_orders(email, pet_id, pet_name, Buyer_name, phone, preference) 
        VALUES('$e_mail','$pet_id','$pet_name','$Buyer_name','$phone','$preference') 
        ON DUPLICATE KEY UPDATE 
        email = '$e_mail', pet_name = '$pet_name', Buyer_name = '$Buyer_name', phone = '$phone', preference = '$preference'";
$conn -> query($sql);
$conn= mysqli_connect($servername, $username, $password, "pets", $port);
$result = $conn -> query("select * from original_pets where pet_id = '$pet_id';");
$row = $result -> fetch_assoc();
$email = $row['email'];
$pet_id = $row['pet_id'];
$breed = $row['breed'];
$type = $row['type'];
$origin = $row['origin'];
$size = $row['size'];
$lifespan = $row['lifespan'];
$temperament = $row['temperament'];
$coat = $row['coat'];
$color = $row['color'];
$care = $row['care'];
$exercise = $row['exercise'];
$training = $row['training'];
$personality = $row['personality'];
$health_concerns = $row['health_concerns'];
$price = $row['price'];
$sql = "Insert into pets(email, pet_id, breed, type, origin, size, lifespan, temperament, coat, color, care, exercise, training, personality, health_concerns, price) values('$e_mail','$pet_id', '$breed', '$type', '$origin', '$size', '$lifespan', '$temperament', '$coat', '$color', '$care', '$exercise', '$training', '$personality', '$health_concerns', '$price')"; 
$conn -> query($sql);
$conn= mysqli_connect($servername, $username, $password, $database, $port);
$sql = "Delete from admin_buy where pet_id = '$pet_id'"; 
$conn -> query($sql);
header('location: admin_buy.php');

?>