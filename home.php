<?php 
session_start();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Finder</title>
</head>
<body background="h.jpg">
    <header>
    <input style="position: absolute;right: 15px;" type="button" value="&#128100" onclick="location.href='profile.php'">
        <div class="container">
          <h1><center>Pet Adoption System</center></h1>>
            <nav>
                <ul><center>
                <li id="home"><a class="navbar-items" href="home.php"><b>Home &#127968</b></a></li>
                <li id="adopt"><a class="navbar-items" href="sample.php"><b>Adopt a Pet &#128054</b></a></li>
                <li id="about"><a class="navbar-items" href="about.html"><b>About &#128224</b></a></li>
                <li id="contact"><a class="navbar-items" href="contact.html"><b>Contact &#128224</b></a></li>
		<?php if(isset($_SESSION['email'])) { ?><li id="sell"><a class="navbar-items" href="donor.php"><b>donor &#128722 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></L><a class="navbar-items" href="logout.php"><b>logout &#128100</b></a></li><?php } else { ?><li id="login"><a href="petlogin.php"><b>login &#128100</b></a></li> <?php } ?>
            </ul></center>
            </nav>
        </div>
    </header>
    <section id="home">
        <div class="container">
            <h2 ><center >Welcome to Our Pet Adoption Center</center></h2>
         <p><center>"Open your heart and home to a deserving pet. Welcome to our adoption community!"</center></p>
        
        </div>
    </section>
    <footer>
        <div class="container">
           <h3><p>&copy; 2024 Pet Adoption System. All rights reserved.</p></h3>
        </div>
    </footer>
</body>
<style>
   body {
    font-family: Arial;
    background-size: cover; 
     background-repeat: no-repeat; 
 }
header {
    color: rgb(12, 12, 12);
    padding: 20px 0;
}
header h1 {
    margin: 0;
    font-size: 2em;
}
nav ul {
    list-style: none;
    padding: 1cm;
}
nav ul li {
    display: inline;
    margin: 0 15px;
    padding: 30px;;
}
nav ul li a {
    color: rgb(2, 2, 2);
    text-decoration: none;

}
nav ul li a:hover {
    color: rgb(255, 255, 255);

}
footer {
    color: rgb(9, 9, 10);
    padding: 10px 0;
    text-align: center;
    font-size: 0.9em;
    position: fixed;
    width: 100%;
    bottom: 0;
}

    </style>
</html>