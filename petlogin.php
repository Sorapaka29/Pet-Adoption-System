<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Login</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-size: cover; 
    background-repeat: no-repeat;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}
label {
    display: block;
    margin: 10px 0 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
}

button {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body background="h.jpg">
<?php
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $connect_reg = new mysqli(hostname:"localhost", username:"root", password:"", database:"registration_db",port: "3301");
    $result = $connect_reg -> query("select * from reg where e_mail = '$email'");
    if($result -> num_rows > 0){
?>
<div><h1>Already Logged in</h1></div>
<form action="logout.php" method="post" enctype="multipart/form-data"><input type="submit" value="click here to logout"></form>
    <?php }
else{
    ?>
    <div class="container">
        <h2>Pet Adoption Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
            <div class="forgot-password">
            <a href="forgot_password.html">Forgot Password?</a>
        </div>
        </form>
        <div class="register-link">
            Don't have an account? <a href="registration.html">Register here</a>
            
        </div>
    </div>
    <?php
}
} else { ?>
        <div class="container">
        <h2>Pet Adoption Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
            <div class="forgot-password">
            <a href="forgot_password.html">Forgot Password?</a>
        </div>
        </form>
        <div class="register-link">
            Don't have an account? <a href="registration.html">Register here</a>
            
        </div>
    </div>
        <?php } ?>
</body>
<script>

</script>
</html>