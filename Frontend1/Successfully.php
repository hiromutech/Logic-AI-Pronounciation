<?php
require 'connect.php';

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $contact = $_POST["contact"];
  $password = $_POST["password"];

  $query = "INSERT INTO users VALUES('', '$name', '$username', '$email', '$contact', '$password')";
  mysqli_query($conn,$query);
}

?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> SpeakWiz</title>
        <link rel="icon" type="image/png" href="Logo1.png">
        <style>
            body {background-image:url(https://e0.pxfuel.com/wallpapers/378/851/desktop-wallpaper-stars-purple-cosmos-space-cosmos-universe.jpg);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;}
            a {color: white; text-decoration: none;}

            a:hover {color: palevioletred; background-color: pink;}



            .LOGO {
                display: block;
                margin: 0;
                padding: 0;
            }


            .btn_ok {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 15%;
                text-align: center;
                padding : 8px 20px;
                border-radius: 25px;
                margin: 0 10px
            }

            .btn_ok {
                background-color: violet;
            }

            h1{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h3{color: magenta; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            
		</style>
	</head>

<body>
<center>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:500px"; width:500px; class="LOGO">
	<h1>New Accounted created successfully!</h1>
    <h3>CLICK 'OK' TO CONTINUE</h3>
    <a href="Survey.php" class="btn_ok">OK</a>
</center>
</body>
</html>