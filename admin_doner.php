<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "admin_doner_db";  
$pets_database = "pets"; 
$port = "3301";

$conn= mysqli_connect($servername, $username, $password, $database, $port);
$conn_pets= mysqli_connect($servername, $username, $password, $pets_database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM admin_doner;";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Doner</title>
</head>
<body>
    <h1>Admin Doner</h1>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        td {
            font-size: 15px;
            color: #555;
        }

        table caption {
            caption-side: top;
            font-size: 18px;
            margin-bottom: 10px;
            color: #666;
        }

        @media screen and (max-width: 768px) {
            table {
                width: 100%;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
    <?php
    if ($result->num_rows > 0) {
        echo "<h2>Pending Approvals</h2>";
        echo "<table border='1'>
              <tr>
                <th>Email</th>
                <th>Pet ID</th>
                <th>Breed</th>
                <th>Type</th>
                <th>Origin</th>
                <th>Size</th>
                <th>Lifespan</th>
                <th>Temperament</th>
                <th>Coat</th>
                <th>Color</th>
                <th>Care</th>
                <th>Exercise</th>
                <th>Training</th>
                <th>Personality</th>
                <th>Health Concerns</th>
                <th>Price</th>
                <th>Action</th>
              </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['pet_id'] . "</td>";
            echo "<td>" . $row['breed'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['origin'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['lifespan'] . "</td>";
            echo "<td>" . $row['temperament'] . "</td>";
            echo "<td>" . $row['coat'] . "</td>";
            echo "<td>" . $row['color'] . "</td>";
            echo "<td>" . $row['care'] . "</td>";
            echo "<td>" . $row['exercise'] . "</td>";
            echo "<td>" . $row['training'] . "</td>";
            echo "<td>" . $row['personality'] . "</td>";
            echo "<td>" . $row['health_concerns'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>
                  <form action='admin_doner_approve.php' method='POST'>
                      <input type='hidden' name='pet_id' value='" . $row['pet_id'] . "'>
                      <input type='submit' name='approve' value='Approve'>
                  </form>
                  <form action='admin_doner_reject.php' method='POST'>
                      <input type='hidden' name='pet_id' value='" . $row['pet_id'] . "'>
                      <input type='submit' name='reject' value='Reject'>
                  </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
        $sql = "SELECT * FROM pets;";
        $result = $conn_pets->query($sql);
        echo "<table border='1'>
              <tr>
                <th>Pet ID</th>
                <th>Breed</th>
                <th>Type</th>
                <th>Origin</th>
                <th>Size</th>
                <th>Lifespan</th>
                <th>Temperament</th>
                <th>Coat</th>
                <th>Color</th>
                <th>Care</th>
                <th>Exercise</th>
                <th>Training</th>
                <th>Personality</th>
                <th>Health Concerns</th>
                <th>Price</th>
                <th>Action</th>
              </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['pet_id'] . "</td>";
            echo "<td>" . $row['breed'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['origin'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['lifespan'] . "</td>";
            echo "<td>" . $row['temperament'] . "</td>";
            echo "<td>" . $row['coat'] . "</td>";
            echo "<td>" . $row['color'] . "</td>";
            echo "<td>" . $row['care'] . "</td>";
            echo "<td>" . $row['exercise'] . "</td>";
            echo "<td>" . $row['training'] . "</td>";
            echo "<td>" . $row['personality'] . "</td>";
            echo "<td>" . $row['health_concerns'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>
            <form action='admin_pets_delete.php' method='POST'>
                <input type='hidden' name='pet_id' value='" . $row['pet_id'] . "'>
                <input type='submit' value='Delete'>
            </form>
            </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p><h2>No pending approvals.</h2></p>";
        $sql = "SELECT * FROM pets;";
        $result = $conn_pets->query($sql);
        echo "<table border='1'>
              <tr>
                <th>Email</th>
                <th>Pet ID</th>
                <th>Breed</th>
                <th>Type</th>
                <th>Origin</th>
                <th>Size</th>
                <th>Lifespan</th>
                <th>Temperament</th>
                <th>Coat</th>
                <th>Color</th>
                <th>Care</th>
                <th>Exercise</th>
                <th>Training</th>
                <th>Personality</th>
                <th>Health Concerns</th>
                <th>Price</th>
                <th>Action</th>
              </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['pet_id'] . "</td>";
            echo "<td>" . $row['breed'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['origin'] . "</td>";
            echo "<td>" . $row['size'] . "</td>";
            echo "<td>" . $row['lifespan'] . "</td>";
            echo "<td>" . $row['temperament'] . "</td>";
            echo "<td>" . $row['coat'] . "</td>";
            echo "<td>" . $row['color'] . "</td>";
            echo "<td>" . $row['care'] . "</td>";
            echo "<td>" . $row['exercise'] . "</td>";
            echo "<td>" . $row['training'] . "</td>";
            echo "<td>" . $row['personality'] . "</td>";
            echo "<td>" . $row['health_concerns'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>
                  <form action='admin_pets_delete.php' method='POST'>
                      <input type='hidden' name='pet_id' value='" . $row['pet_id'] . "'>
                      <input type='submit' value='Delete'>
                  </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        if (isset($_POST['approve'])) {
            $sql = "SELECT * FROM admin_doner WHERE pet_id = '$id';";
            $result = $conn->query($sql);
            $pet = $result->fetch_assoc();
            $pets_conn = new mysqli($servername, $username, $password, $pets_database);
            if ($pets_conn->connect_error) {
                die("Connection failed: " . $pets_conn->connect_error);
            }
                if($result -> num_rows > 0){ 
                $pets_sql = "INSERT INTO pets (pet_id, breed, type, origin, size, lifespan, temperament, coat, color, care, exercise, training, personality, health_concerns, price) VALUES ('" . $pet['pet_id'] . "', '" . $pet['breed'] . "', '" . $pet['type'] . "', '" . $pet['origin'] . "', '" . $pet['size'] . "', '" . $pet['lifespan'] . "', '" . $pet['temperament'] . "', '" . $pet['coat'] . "', '" . $pet['color'] . "', '" . $pet['care'] . "', '" . $pet['exercise'] . "', '" . $pet['training'] . "', '" . $pet['personality'] . "', '" . $pet['health_concerns'] . "', '" . $pet['price'] . "')";
                $sql = "UPDATE admin_doner SET status = 'approved' WHERE pet_id = $id";
                $pets_conn->query($pets_sql);
                $conn->query($sql);
                echo "<p>Pet approved and moved to pets database successfully.</p>";
                }
            $pets_conn->close();
        } elseif (isset($_POST['reject'])) {
            $sql = "UPDATE admin_doner SET status = 'rejected' WHERE pet_id = $id";
            if ($conn->query($sql) === TRUE) {
                echo "<p>Pet rejected.</p>";
            } else {
                echo "<p>Error updating record: " . $conn->error . "</p>";
            }
            $conn -> query("delete from admin_doner where pet_id = '$id';");
        }
    }
    $conn->close();
    ?>
</body>
</html>
