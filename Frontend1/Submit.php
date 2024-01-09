<?php
require 'connect.php';

session_start();


if (isset($_POST['OK']))
{
    $sql = "INSERT INTO `users`(`user_id`, `fullName`, `userName`, `email`, `contactNum`, `password`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES ('','" . $_SESSION['fullName'] . "' , '" . $_SESSION['userName'] . "' , '" . $_SESSION['email'] . "' , '" . $_SESSION['contactNum'] . "' , '" . $_SESSION['password'] . "', '" . $_SESSION['Q1'] . "', '" . $_SESSION['Q2'] . "', '" . $_SESSION['Q3'] . "', '" . $_SESSION['Q4'] . "', '" . $_SESSION['Q5'] . "')";
    $result = mysqli_query($conn, $sql);

    session_unset();
    header('Location: homePage.php');
}

?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="Sign_Up.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> SpeakWiz</title>
        <link rel="icon" type="image/png" href="Logo1.png">
	</head>

<body>
<center>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:500px"; width:500px; class="LOGO">
	<h1>Submit Survey? All answers in this response will be used in <br> customizing your own SpeakWiz gaming experience</h1>
    <h3>CLICK 'OK' TO CONTINUE</h3>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type = "submit" name = "OK" class="submit" value = "OK">
    <a href="Q5.php" class="submit">BACK</a>
        </form>
    &nbsp;
</center>
</body>
</html>