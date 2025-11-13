<?php
session_start();
$email = $_POST['email'];
$_SESSION['email'] = $email;
$pwd = $_POST['password'];
$connect = new mysqli(hostname:"localhost", username:"root", password:"", database:"registration_db",port: "3301");
$result =  $connect -> query("select * from reg where e_mail = '$email';");
$row = $result -> fetch_assoc();
if($row['pwd'] == $pwd){
        echo "login successful";
        header("location: home.php");
    }
else{
$email = $_POST['email'];
$_SESSION['email'] = $email;
$pwd = $_POST['password'];
$connect = new mysqli(hostname:"localhost", username:"root", password:"", database:"admin_db",port: "3301");
$result =  $connect -> query("select * from admin where email = '$email';");
$row = $result -> fetch_assoc();
if(isset($row['pwd'])){
    if($row['pwd'] == $pwd){
        echo "admin login successful";
        $_SESSION['admin_logged_in'] = "loggedin";
        header("location: admin_home.php");
    }
    }
else{
    echo "incorrect email or password";
    header("location: petlogin.php");
}
}

?>