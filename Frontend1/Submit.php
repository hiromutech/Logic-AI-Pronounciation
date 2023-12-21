<?php
require 'connect.php';

session_start();


if (isset($_POST['OK']))
{
    $sql = "INSERT INTO `users`(`user_id`, `fullName`, `userName`, `email`, `contactNum`, `password`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES ('','" . $_SESSION['fullName'] . "' , '" . $_SESSION['userName'] . "' , '" . $_SESSION['email'] . "' , '" . $_SESSION['contactNum'] . "' , '" . $_SESSION['password'] . "', '" . $_SESSION['Q1'] . "', '" . $_SESSION['Q2'] . "', '" . $_SESSION['Q3'] . "', '" . $_SESSION['Q4'] . "', '" . $_SESSION['Q5'] . "')";
    $result = mysqli_query($conn, $sql);

    session_unset();
    header('Location: start.php');
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

            .btn_back {
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

            .btn_back {
                background-color: purple;
            }

            h1{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h3{color: magenta; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            
		</style>
	</head>

<body>
<center>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:500px"; width:500px; class="LOGO">
	<h1>Submit Survey? All answers in this response will be used in <br> customizing your own SpeakWiz gaming experience</h1>
    <h3>CLICK 'OK' TO CONTINUE</h3>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type = "submit" name = "OK" class="btn_ok" value = "OK">
    <a href="Q5.php" class="btn_back">BACK</a>
        </form>
    &nbsp;
</center>
</body>
</html>