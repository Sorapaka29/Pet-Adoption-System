<?php

$fname=$_POST["fullName"];
$e_mail=$_POST["email"];
$phno=$_POST["phone"];
$pwd=$_POST["password"];
$cpwd=$_POST["confirmPassword"];
$address_=$_POST["address"];
$pet_type=" ";

$servername="localhost";
$username= "root";
$password= "";
$database="registration_db";
$port = "3301";
$connect= mysqli_connect($servername, $username, $password, $database, $port);
$verify = $connect -> query("select * from reg where e_mail = '$e_mail';");
if($verify -> num_rows > 0){
echo "Account already exists with email: ".$e_mail;
header("location: petlogin.php");
}
else{
$connect -> query("insert into reg values('$fname','$e_mail','$phno','$pwd','$cpwd','$address_','$pet_type')");
echo"successful";
header("location: petlogin.php");
}
if(mysqli_connect_errno()){
    echo "Failed to connect!";
    exit();
}



?>