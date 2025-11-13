<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_buy_db";  
$buy_database = "buy_db";  
$port = "3301";  

$conn= mysqli_connect($servername, $username, $password, $database, $port);
$conn_pets= mysqli_connect($servername, $username, $password, $buy_database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
$sql = "SELECT * FROM admin_buy;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Buy Approval Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #555;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        p {
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>
    <h1> Buy Requests</h1>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
              <tr>
                <th>Pet Name</th>
                <th>Buyer Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Preference</th>
                <th>Action</th>

              </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['pet_name'] . "</td>";
            echo "<td>" . $row['buyer_name'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['preference'] . "</td>";
            
            ?>
            <td>
            <form action='admin_buyer_approve.php' method='POST'>
            <input type='hidden' name='pet_id' value='<?php echo $row['pet_id'] ?>'>
            <input type='submit' name='approve' value='Approve'>
        </form>
        <form action='admin_buyer_reject.php' method='POST'>
            <input type='hidden' name='pet_id' value='<?php echo $row['pet_id'] ?>'>
            <input type='submit' name='reject' value='Reject'></td>
        </form>
        <?php
            echo "</tr>";
    
        }
        echo "</table>";
    } else {
        echo "<p>No pending approvals.</p>";
    }
    $conn->close();
    ?>
</body>
</html>
