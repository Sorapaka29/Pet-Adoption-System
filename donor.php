<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Your Pet</title>
</head>
<style>
  body {
	font-family: Arial, sans-serif;
    background-size: cover; 
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 80vh;
    margin: 50;
}

#sell-pet-form {
	width: 40%;
	padding: 10px;
	border: 1px solid #090808;
	border-radius: 10px;
	box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: white;
}
.container{
    margin: 300px;
    height: 100%;
}

h1, h2 {
	margin-top: 0;
}

label {
	display: block;
	margin-bottom: 10px;
}
.file-input {
	margin-top: 10px;
}
input, select, textarea {
	width: 100%;
	padding: 5px;
	margin-bottom: 20px;
	border: 1px solid #0c0b0b;
}

input[type="submit"] {
	background-color: #4CAF50;
	color: #0c0a0a;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: #3e8e41;
}
.img-preview {
	margin-top: 15px;
}
.img-preview img {
	width: 150px;
	height: auto;
	border-radius: 4px;
	margin-top: 10px;
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
}

</style>
<body  background="adoptbc.jpg">
    <div class="container">
        <h2>Donate Your Pet</h2>
        <form action="donor_db.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required>
            </div>

            <div class="form-group">
                <label for="type">Type:</label>
                <select id="type" name="type" required>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                    <option value="Fish">Reptile</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="origin">Origin:</label>
                <input type="text" id="origin" name="origin" required>
            </div>

            <div class="form-group">
                <label for="size">Size:</label>
                <select id="size" name="size" required>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                </select>
            </div>

            <div class="form-group">
                <label for="lifespan">Lifespan:</label>
                <input type="text" id="lifespan" name="lifespan" required>
            </div>

            <div class="form-group">
                <label for="temperament">Temperament:</label>
                <textarea id="temperament" name="temperament" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="coat">Coat:</label>
                <input type="text" id="coat" name="coat" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" id="color" name="color" required>
            </div>

            <div class="form-group">
                <label for="care">Care Requirements:</label>
                <textarea id="care" name="care" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="exercise">Exercise Requirements:</label>
                <textarea id="exercise" name="exercise" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="training">Training:</label>
                <textarea id="training" name="training" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="personality">Personality:</label>
                <textarea id="personality" name="personality" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="health_concerns">Health Concerns:</label>
                <textarea id="health_concerns" name="health_concerns" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="petimage" name="petimage" required>
            </div>
            <div class="form-group">
                <label for="image">passphoto Image:</label>
                <input type="file" id="passphotoimage" name="passphotoimage" required>
            </div>
            <div class="form-group">
                <label for="image">adhar Image:</label>
                <input type="file" id="aadhaarimage" name="aadhaarimage" required>
            </div>
            <div class="form-group">
                <label for="image">pancard Image:</label>
                <input type="file" id="pancardimage" name="pancardimage" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="value of submit">Submit</button>
            </div>
            <center>
            <div>
                <p><b>To check updates--></b><a class="navbar-items" href="profile.php"><b>profile</b></a></p>
            </div>
            </center>
        </form>
    </div>
</body>
</html>
