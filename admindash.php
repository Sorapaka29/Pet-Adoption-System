<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_buy_db";  // Replace with your database name

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get the total number of orders
$total_orders_sql = "SELECT COUNT(*) AS total_orders FROM orders"; 
$total_orders_result = $conn->query($total_orders_sql);
if($total_orders_result) {
    $total_orders = $total_orders_result->fetch_assoc()['total_orders'];
}

// Query to get the total sales amount
$total_sales_sql = "SELECT SUM(total_amount) AS total_sales FROM orders";
$total_sales_result = $conn->query($total_sales_sql);
if($total_sales_result) {
    $total_sales = $total_sales_result->fetch_assoc()['total_sales'];
}


// Query to get the number of approved orders
$approved_orders_sql = "SELECT COUNT(*) AS approved_orders FROM orders WHERE status='approved'";
$approved_orders_result = $conn->query($approved_orders_sql);
if ($approved_orders_result) {
    $approved_orders = $approved_orders_result->fetch_assoc()['approved_orders'];
}


// Query to get the number of pending orders
$pending_orders_sql = "SELECT COUNT(*) AS pending_orders FROM orders WHERE status='pending'";
$pending_orders_result = $conn->query($pending_orders_sql);
if ($pending_orders_result) {
    $pending_orders = $pending_orders_result->fetch_assoc()['pending_orders'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
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

<header>
    <h1>Admin Dashboard</h1>
</header>
<br>
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

        <!-- Total Sales -->
        <div class="stat-box">
            <h3>Total Sales</h3>
            <p>$<?php $sum=NULL;
            echo number_format($sum ? $sum : 0, 2); ?></p>
        </div>
    </div>
</div>

</body>
</html>
