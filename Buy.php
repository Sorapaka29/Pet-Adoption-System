<?php
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
} 
else{
    header('location: petlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.5">
    <title>Pet Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('h.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: max-content;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            height: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"], input[type="tel"], input[type="email"], textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: none;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
        }
        .form-group1 {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="buysubmit.php" method="post" enctype="multipart/form-data">
       <center>
        <!-- Pet Name Field -->
        <div class="form-group">
            <label for="pet_name">Pet Name:</label>
            <input style="display:none;" type="text" name="pet_id" value="<?php echo $_POST['pet_id'] ?>">
            <input style="display:none;" type="text" name="pet_name" value="<?php echo $_POST['pet_name'] ?>">
            <?php
            echo "<h1>".$_POST['pet_name']."</h1>";
            ?>
        </div>

        <!-- Full Name Field -->
        <div class="form-group">
            <label for="name">adapter Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Phone Number Field -->
        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <!-- Why You Prefer Field -->
        <div class="form-group">
            <label for="why_prefer">Why Do You Prefer This Pet?</label>
            <textarea id="whyprefer" name="whyprefer" rows="3" cols="30" required></textarea>
        </div>
        <div class="form-group">
                <label for="image">Passphoto Image:</label>
                <input class="form-group1" type="file" id="passphotoimage" name="passphotoimage" required>
            </div>
            <div class="form-group">
                <label for="image">Aadhar Image:</label>
                <input class="form-group1" type="file" id="aadhaarimage" name="aadhaarimage" required>
            </div>
            <div class="form-group">
                <label for="image">Pancard Image:</label>
                <input class="form-group1" type="file" id="pancardimage" name="pancardimage" required>
            </div>
       </center>
       <div class="form-group">
                <button type="submit" name="submit" value="value of submit">Buy</button>
            </div>
            <center>
            <div>
                <p><b>To check updates--></b><a class="navbar-items" href="profile.php"><b>profile</b></a></p>
            </div>
            </center>
    </form>
</body>
</html>
