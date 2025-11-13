<?php
// Start the session to check if admin is logged in
session_start();

// Check if admin is logged in, otherwise redirect to login page
if (!isset($_SESSION['email'])) {
    header('Location: petlogin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-size: cover;              
    background-position: center;         
    background-repeat: no-repeat;        
    background-attachment: fixed;        
    color: #333;
    line-height: 1.6;
    padding: 20px;
    height: 100vh;                    
.navbar {
    background-color: rgba(44, 62, 80, 0.8); 
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 15px 20px;
    position: relative;
    z-index: 1;                          
}

.navbar a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 25px;
    margin-right: 26px;
    transition: color 0.3s ease;
}

.navbar a:hover {
    color: #1abc9c;
}


.container {
    max-width: 1200px;
    margin: 50px auto;
    padding: 40px;
    border-radius: 8px;
    background: rgba(255, 255, 255, 0.3);  
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    z-index: 1;                           
    position: relative;
    color: black;                         
    font-weight: bold;
}

h1 {
    font-size: 32px;
    color: #34495e;
    margin-bottom: 20px;
}

p {
    font-size: 18px;
    color: #7f8c8d;
}
.navbar a:hover {
    color: #1abc9c;
    background-color: #34495e;
    padding: 12px 18px;
    border-radius: 4px;
    transition: background-color 0.3s ease, color 0.3s ease;
}
@media (max-width: 768px) {
    .navbar a {
        display: block;
        margin: 10px 0;
    }
    .container {
        padding: 20px;
    }
}
}
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 15px 0;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        .stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .stat-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 22%;
        }
        .stat-box h3 {
            margin: 50px 0;
        }
        .stat-box p {
            font-size: 30px;
            color: #333;
            font-weight: bold;
        }
    </style>
</head>
<body background="b.jpg">
<form action="logout.php" method="post" enctype="multipart/form-data"><input type="submit" value=" logout" style="position: fixed; right: 3%;"></form>
    <center><h1>Admin Panel</h1></center>
<div class="navbar">
    <center>
    <a href="admin_doner.php" style="margin-right: 200px;">Donor</a>
    <a href="admin_buy.php" style="margin-left: 200px;">Buyer</a>
    </center>
</div>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "pets";  // Replace with your database name
$port = "3301";
$conn = mysqli_connect($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn = mysqli_connect($servername, $username, $password, "admin_buy_db", $port);
// Query to get the total number of orders
$approved_orders_sql = "SELECT COUNT(*) AS approved_orders FROM admin_approved_orders"; 
$approved_orders_result = $conn->query($approved_orders_sql);
if($approved_orders_result) {
    $approved_orders = $approved_orders_result->fetch_assoc()['approved_orders'];
}

$conn = mysqli_connect($servername, $username, $password, "admin_buy_db", $port);
// Query to get the number of pending orders
$pending_orders_sql = "SELECT COUNT(*) AS pending_orders FROM admin_buy";
$pending_orders_result = $conn->query($pending_orders_sql);
if ($pending_orders_result) {
    $pending_orders = $pending_orders_result->fetch_assoc()['pending_orders'];
}

$total_orders = $approved_orders + $pending_orders;

$conn->close();
?>
<div class="container">
    <div class="stats">
        <!-- Total Orders -->
        <div class="stat-box">
            <h3>Total Orders</h3>
            <p><?php echo $total_orders; ?></p>
        </div>

        <!-- Approved Orders -->
        <div class="stat-box">
            <h3>Approved Orders</h3>
            <p><?php echo $approved_orders; ?></p>
        </div>

        <!-- Pending Orders -->
        <div class="stat-box">
            <h3>Pending Orders</h3>
            <p><?php echo $pending_orders; ?></p>
        </div>
    </div>
</div>




</body>
</html>
