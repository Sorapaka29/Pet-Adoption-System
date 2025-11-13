<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$reg_database = "registration_db";
$buy_database = "buy_db";
$port = "3301";
if (!isset($_SESSION['email'])) {
    echo "<center><h1>Please log in to view your profile.</h1></center>";
    exit;
}
$connect_reg = new mysqli($servername, $username, $password, $reg_database, $port);
$connect_buy = new mysqli($servername, $username, $password, $buy_database, $port);

if ($connect_reg->connect_error || $connect_buy->connect_error) {
    die("Connection failed: " . $connect_reg->connect_error . " " . $connect_buy->connect_error);
}
$e_mail = $_SESSION['email'];
$phone = $fname = $address_ = $pet_type = "";
$pet_name = $buyer_name = $preference = "";
$stmt_reg = "SELECT e_mail, phno, fname, address_, pet_type FROM reg WHERE e_mail = '$e_mail'";
$result_reg = $connect_reg -> query($stmt_reg);
if ($result_reg->num_rows > 0) {
    $row_reg = $result_reg->fetch_assoc();
    $fname = $row_reg['fname'];
    $phone = $row_reg['phno'];
    $address_ = $row_reg['address_'];
    $pet_type = $row_reg['pet_type'];
}


/*$new_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
$new_phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $update_sql_reg = "UPDATE reg SET email = ?, phno = ? WHERE email = ?";
    if (filter_var($new_email, FILTER_VALIDATE_EMAIL) && !empty($new_phone)) {
        $update_stmt_reg = $connect_reg->prepare($update_sql_reg);
        $update_stmt_reg->bind_param("sss", $new_email, $new_phone, $_SESSION['email']);
        if ($update_stmt_reg->execute()) {
            $_SESSION['email'] = $new_email;
            echo "<p>Profile updated successfully!</p>";
            header("Location: profile.php");
            exit;
        }else {
            echo "<p>Failed to update profile. Please try again.</p>";
        }
    } 
}
$connect_reg->close();
$connect_buy->close();*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('h.jpg') no-repeat center center/cover;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .profile-form label {
            font-weight: bold;
        }
        .profile-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .profile-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-form button:hover {
            background-color: #218838;
        }
        .profile-data {
            margin-top: 20px;
        }
        .pet-images {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }
        .pet-images img {
            max-width: 150px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="profile-form">
        <h2>Your Profile</h2>
            <h3>Email: <?php echo htmlspecialchars($e_mail); ?></h3>
            <h3>Phone: <?php echo htmlspecialchars($phone); ?></h3>
        <div class="profile-data">
            <h3> Registration Details:</h3>
            <p><strong>fname:</strong> <?php echo htmlspecialchars($fname); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($address_); ?></p>
            <p><strong>Preferred Pet Type:</strong> <?php echo htmlspecialchars($pet_type); ?></p>
        </div>
        <div class="profile-data">
        <h3>Buy Details:</h3>
        <?php
        $conn = new mysqli($servername, $username, $password, "admin_buy_db", $port);
            $result = $conn -> query("select * from admin_approved_orders where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Approved Orders</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $approved_pet_name = $row['pet_name'];
                
                echo "<tr> <td>  $approved_pet_name </td> </tr>";
            }
        }
        echo "</table>";
        $conn = new mysqli($servername, $username, $password, "admin_buy_db", $port);
        $result = $conn -> query("select * from admin_buy where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Pending Orders</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $pending_pet_name = $row['pet_name'];
                echo "<tr> <td>  $pending_pet_name </td> </tr>";
            }
        }
        echo "</table>";
        $conn = new mysqli($servername, $username, $password, "admin_buy_db", $port);
        $result = $conn -> query("select * from admin_rejected_orders where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Rejected Orders</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $rejected_pet_name = $row['pet_name'];
                echo "<tr> <td> $rejected_pet_name </td> <td><a href='reject_buyer.html'>Details</a></td> </tr>";
            }
        }
        echo "</table>";
            ?>
            <h3>Donated Details:</h3>
        <?php
        $conn = new mysqli($servername, $username, $password, "admin_doner_db", $port);
        $result = $conn -> query("select * from admin_doner_approved where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Approved Donations</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $approved_pet_name = $row['breed'];
                echo "<tr> <td>  $approved_pet_name </td> </tr>";
            }
        }
        echo "</table>";
        $conn = new mysqli($servername, $username, $password, "admin_doner_db", $port);
        $result = $conn -> query("select * from admin_doner where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Pending Donations</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $pending_pet_name = $row['breed'];
                echo "<tr> <td>  $pending_pet_name </td> </tr>";
            }
        }
        echo "</table>";
        $conn = new mysqli($servername, $username, $password, "admin_doner_db", $port);
        $result = $conn -> query("select * from admin_doner_rejected where email = '$e_mail'");
            if($result -> num_rows > 0){
                echo " <h2>Rejected Doantions</h2> <table>";
            while($row = $result -> fetch_assoc()){
                $rejected_pet_name = $row['breed'];
                echo "<tr> <td> $rejected_pet_name </td> <td><a href='reject_doner.html'>Details</a></td> </tr>";
            }
        }
        echo "</table>";
            ?>
        </div>
    </div>
</body>
</html>
