<?php

session_start();
$pet_id = $_POST["pet_id"];
$pet_name = $_POST["pet_name"];
$Buyer_name = $_POST["name"];
$phone = $_POST["phone"];
$e_mail = $_SESSION['email'];
$preference = $_POST["whyprefer"];
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_buy_db";
$port = "3301";
$connect = mysqli_connect($servername, $username, $password, $database, $port);
$connect->query("INSERT INTO admin_buy (pet_id, pet_name, Buyer_name, phone, email, preference)VALUES ('$pet_id', '$pet_name', '$Buyer_name', '$phone', '$e_mail', '$preference');");
$sql = "Delete from pets where pet_id = '$pet_id'"; 
$conn_pets = mysqli_connect($servername, $username, $password, "pets", $port);
$conn_pets -> query($sql);

if (isset($_POST['submit'])) {
   
    // passphotoimage

    $target_dir = "C:/wamp64/www/pets/buyer_passphoto/";
    
    
    $target_file = $target_dir.$e_mail."_passphoto_".basename($_FILES["passphotoimage"]["name"]);
    
    
    $uploadOk = 1;
    
    
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["passphotoimage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    
    if ($_FILES["passphotoimage"]["size"] > 15000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
    
        if (move_uploaded_file($_FILES["passphotoimage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["passphotoimage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // aadhaarimage

    $target_dir = "C:/wamp64/www/pets/buyer_aadhaar/";
    
    
    $target_file = $target_dir.$e_mail."_aadhaar_".basename($_FILES["aadhaarimage"]["name"]);
    
    
    $uploadOk = 1;
    
    
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["aadhaarimage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    
    if ($_FILES["aadhaarimage"]["size"] > 15000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
    
        if (move_uploaded_file($_FILES["aadhaarimage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["aadhaarimage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    //pancardimage

    $target_dir = "C:/wamp64/www/pets/buyer_pancard/";
    
    
    $target_file = $target_dir.$e_mail."_pancard_".basename($_FILES["pancardimage"]["name"]);
    
    
    $uploadOk = 1;
    
    
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pancardimage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    
    if ($_FILES["pancardimage"]["size"] > 15000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
    
        if (move_uploaded_file($_FILES["pancardimage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["pancardimage"]["name"])) . " has been uploaded.";
        } else { 
            echo "Sorry, there was an error uploading your file.";
        }
    }

}

if(mysqli_connect_errno()) {
    echo "Failed to connect!";  
}
else{
    header("Location: sample.php");
}
  ?>