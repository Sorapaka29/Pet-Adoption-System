<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("adoptbc.jpg");
        }
        nav {
            margin: 0;
            padding: 0;
            float: left;
            list-style: none;
        }
        nav ul {
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            margin: 0;
        }
        .navbar-items{
            display: block;
            padding: 15px 20px;
            color: rgb(15, 14, 14);
            float: right;
            text-decoration: none;
        }
        .navbar-items:hover {
            background-color: #f8f8fa;
            float: right;
        }
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .gallery-item {
            background-color: #dcdbd5;
            padding: 20px;
            margin: 20px;
            border: 1px solid #e2dfd6;
            border-radius: 10px;
            width: 150px;
        }
        .gallery-item img {
            width: 150px;
            height: 100px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .gallery-item img:hover {
            transform: scale(1.05);
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            text-align: center;
        }
        .modal-content h2 {
            margin-top: 0;
        }
        .modal-close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: white;
        }
        body {
      font-family: Arial, sans-serif;
    } 
      .pet-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
      }
     
      .pet-box {
        background-color: #dcdbd5;
        padding: 20px;
        margin: 20px;
        border: 1px solid #e2dfd6;
        border-radius: 10px;
        width: 300px;
        
      }
      .pet-box:hover {
        cursor: pointer;
      }
      nav ul li {
        display: inline;

    }
    
    .Model {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      justify-content: center;
      align-items: center;
      z-index: 1000;
  }
  .Model-content { 
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 800px;
      text-align: center;
  }
  .Model-content h2 {
      margin-top: 0;
  }
  .Model-close {
      position: absolute;
      top: 10px;
      right: 20px;
      font-size: 24px;
      cursor: pointer;
      color: white;
  }
      .adopt-button {
        background-color: #4CAF50;
        color: #fff;
        padding: 10px 20px;
        border: none;  
        border-radius: 5px;
        cursor: pointer;
      }

      
      .adopt-button:hover {
        background-color: #3e8e41;
      }
      
    </style>
</head>
<body>
<nav>
            <ul>
                <a class="navbar-items" href="home.php"><b>Home &#127968</b></a>
            </ul>
        </nav>
    <center>
        <div class="search-bar">
        <form action="sample.php" method="post">
        <input type="text" name="searchterm" class="search-input" placeholder="Search for a pet..." id="searchInput" >
        <button type ="submit" id="search_button" class="search-button">Search</button>
        <select name="category" oninput="document.getElementById('search_button').click();">
            <option value="Category">Category</option>
            <option value="Cat">Cats</option>
            <option value="Dog">Dogs</option>
            <option value="Bird">Birds</option>
            <option value="Fish">Fishes</option>
        </select>
        <input style="position: absolute; right: 15px;" type="button" value="logout" onclick="location.href='logout.php'">
    </form>
    </div>
</center>

   <center><h1>Pet animals</h1></center>
    <div id="searchresults">

    </div>
    <form action="Buy.php" method="post"> 
        <div id="gallery">
    <div class="gallery">
        <input type="text" name="pet_name" id="pet_name" style="display:none">
        <input type="text" name="pet_id" id="pet_id" style="display:none">
<?php
$connect= mysqli_connect(hostname:"localhost",username:"root",password:"",database:"pets",port:"3301");
if(isset($_POST['category'])){
    $category = $_POST['category'];
    if($category != "Category"){
    if($category == "Cat"){
        echo "<h1 style=\"width:100%\">Cats</h1>";
        $result = $connect -> query("select * from pets where type='Cat';");
        while($row = $result -> fetch_assoc()){
            echo "<div class=\"gallery-item\"><div id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    if($category == "Dog"){
        echo "<h1 style=\"width:100%\">Dogs</h1>";
        $result = $connect -> query("select * from pets where type='Dog';");
        while($row = $result -> fetch_assoc()){
            echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    if($category == "Bird"){
        echo "<h1 style=\"width:100%\">Bird</h1>";
        $result = $connect -> query("select * from pets where type='Bird';");
        while($row = $result -> fetch_assoc()){
            echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    if($category == "Fish"){
        echo "<h1 style=\"width:100%\">Fish</h1>";
        $result = $connect -> query("select * from pets where type='Fish';");
        while($row = $result -> fetch_assoc()){
            echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    return;
    }
    if(isset($_POST['searchterm'])){
        $searchterm = $_POST['searchterm'];
        if($searchterm == ""){
    echo "<h1 style=\"width:100%\">Cats</h1>";
    $result = $connect -> query("select * from pets where type='Cat';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Dogs</h1>";
    $result = $connect -> query("select * from pets where type='Dog';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Bird</h1>";
    $result = $connect -> query("select * from pets where type='Bird';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Fish</h1>";
    $result = $connect -> query("select * from pets where type='Fish';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
        }
        else{
        $result = $connect -> query("select * from pets where breed like'%$searchterm%';");
        }
        while($row = $result -> fetch_assoc()){
            echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    else{
    $result = $connect -> query("select * from pets");
    echo "<h1 style=\"width:100%\">Cats</h1>";
    $result = $connect -> query("select * from pets where type='Cat';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Dogs</h1>";
    $result = $connect -> query("select * from pets where type='Dog';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Bird</h1>";
    $result = $connect -> query("select * from pets where type='Bird';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Fish</h1>";
    $result = $connect -> query("select * from pets where type='Fish';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
}
}
else{
    if(isset($_POST['searchterm'])){
        $searchterm = $_POST['searchterm'];
        if($searchterm == ""){
    echo "<h1 style=\"width:100%\">Cats</h1>";
    $result = $connect -> query("select * from pets where type='Cat';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Dogs</h1>";
    $result = $connect -> query("select * from pets where type='Dog';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Bird</h1>";
    $result = $connect -> query("select * from pets where type='Bird';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Fish</h1>";
    $result = $connect -> query("select * from pets where type='Fish';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
        }
        else{
        $result = $connect -> query("select * from pets where breed like'%$searchterm%';");
        }
        while($row = $result -> fetch_assoc()){
            echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
            echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
        }
    }
    else{
    $result = $connect -> query("select * from pets");
    echo "<h1 style=\"width:100%\">Cats</h1>";
    $result = $connect -> query("select * from pets where type='Cat';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Dogs</h1>";
    $result = $connect -> query("select * from pets where type='Dog';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Bird</h1>";
    $result = $connect -> query("select * from pets where type='Bird';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
    echo "<h1 style=\"width:100%\">Fish</h1>";
    $result = $connect -> query("select * from pets where type='Fish';");
    while($row = $result -> fetch_assoc()){
        echo "<div><div class=\"gallery-item\" id = \"".$row['breed']."\" onclick=\"openModal('".$row['breed']."')\"><img src=\"".$row['breed'].".jpg\" alt=\"".$row['breed']."\"><p>".$row['breed']."</p><h3>RS.".$row['price']."</h3><input type=\"button\" class = \"adopt-button\" onclick=\"document.getElementById('pet_name').value = '".$row['breed']."'; document.getElementById('pet_id').value = '".$row['pet_id']."';document.getElementById('buy_submit').click(); \" value=\"Buy\"><input type=\"submit\" id=\"buy_submit\" style=\"display:none;\"></div></div>";
        echo "<div id=\"modal-".$row['breed']."\" class=\"modal\"><div class=\"modal-content\"><span class=\"modal-close\" onclick=\"closeModal('".$row['breed']."')\">&times;</span><h2>".$row['breed']."</h2><p><strong>Origin:</strong>".$row['origin']."</p><p><strong>Size:</strong>".$row['size']."</p><p><strong>Lifespan:</strong>".$row['lifespan']."</p><p><strong>Temperament:</strong>".$row['temperament']."</p><p><strong>Coat:</strong>".$row['coat']."</p><p><strong>Colors:</strong>".$row['color']."</p><p><strong>Care:</strong>".$row['care']."</p><p><strong>Exercise:</strong>".$row['exercise']."</p><p><strong>Training:</strong>".$row['training']."</p><p><strong>Personality:</strong>".$row['personality']."</p><p><strong>Health Concerns:</strong>".$row['health_concerns']."</p></div></div>";
    }
}
  }
?>
<script>
        function searchPet(){
            searchterm = document.getElementById('searchterm').value;
            searchterm = searchterm.toLowerCase();
            if(searchterm == ""){
                document.getElementById('gallery').style.display = "initial";
                document.getElementById('searchresults').style.display = "none";
            }
            else{
                document.getElementById('gallery').style.display = "none";
                document.getElementById('searchresults').style.display = "initial";
                document.getElementById('searchresults').innerHTML = "<div class=\"gallery-item\" onclick=\"openModal('dogModal1')\"><img src=\""+ searchterm +".png\" alt="+ searchterm +"><p>"+ searchterm +"</p><button type=\"submit\">Buy</button></div>";
            }
        }
        function openModal(modalId) {
            document.getElementById("modal-"+modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById("modal-"+modalId).style.display = 'none';
        }
    </script>
</body>
</html>