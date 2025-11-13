<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $connect= mysqli_connect(hostname:"localhost",username:"root",password:"",database:"admin_doner_db",port:"3301");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $e_mail = $_SESSION['email'];
    $breed = $_POST['breed'];
    $type = $_POST['type'];
    $origin = $_POST['origin'];
    $size = $_POST['size'];
    $lifespan = $_POST['lifespan'];
    $temperament = $_POST['temperament'];
    $coat = $_POST['coat'];
    $color = $_POST['color'];
    $care = $_POST['care'];
    $exercise = $_POST['exercise'];
    $training = $_POST['training'];
    $personality = $_POST['personality'];
    $health_concerns = $_POST['health_concerns'];
    $price = $_POST['price'];

if (isset($_POST['submit'])) {
   
    $target_dir = "C:/wamp64/www/pets/";
    
    
    $target_file = $target_dir . basename($_FILES["petimage"]["name"]);
    
    
    $uploadOk = 1;
    
    
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["petimage"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    
    
    if ($_FILES["petimage"]["size"] > 15000000) {
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
    
        if (move_uploaded_file($_FILES["petimage"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["petimage"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // passphotoimage

    $target_dir = "C:/wamp64/www/pets/donor_passphoto/";
    
    
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

    $target_dir = "C:/wamp64/www/pets/donor_aadhaar/";
    
    
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

    $target_dir = "C:/wamp64/www/pets/donor_pancard/";
    
    
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

    $sql = "INSERT INTO admin_doner (email, breed, type, origin, size, lifespan, temperament, coat, color, care, exercise, training, personality, health_concerns, price) 
            VALUES ('$e_mail','$breed', '$type', '$origin', '$size', '$lifespan', '$temperament', '$coat', '$color', '$care', '$exercise', '$training', '$personality', '$health_concerns', '$price')";

if (mysqli_query($connect, $sql)) {
    echo "Pet details submitted successfully!";
    header("location:sample.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
 
    $connect->close();
}
 ?>
