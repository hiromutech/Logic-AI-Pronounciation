<?php
require 'connect.php';

session_start();


if (isset($_POST['OK']))
{
    $sql = "INSERT INTO `users`(`user_id`, `fullName`, `userName`, `email`, `contactNum`, `password`, `q1`, `q2`, `q3`, `q4`, `q5`) VALUES ('','" . $_SESSION['fullName'] . "' , '" . $_SESSION['userName'] . "' , '" . $_SESSION['email'] . "' , '" . $_SESSION['contactNum'] . "' , '" . $_SESSION['password'] . "', '" . $_SESSION['Q1'] . "', '" . $_SESSION['Q2'] . "', '" . $_SESSION['Q3'] . "', '" . $_SESSION['Q4'] . "', '" . $_SESSION['Q5'] . "')";
    $result = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM users WHERE userName = '{$_SESSION["userName"]}'";
    $result = mysqli_query($conn, $sql);

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
        //   $userEmail = $row["email"];
        //   $userPass = $row["password"];
            $_SESSION['user'] = [
                'user_id' => $row['user_id'],
                'fullName' => $row['fullName'],
                'userName' => $row['userName'],
                'email' => $row['email'],
                'contactNum' => $row['contactNum'],
                'password' => $row['password'],
                'difficulty' => $row['q5'],
                'potions' => $row['potions'],
                'totalPotions' => $row['totalPotions'],
                'highscore' => $row['highscore'],
                'totalAnswered' => $row['totalAnswered'],
                'totalCorrect' => $row['totalCorrect'],
                'x2' => $row['x2'],
                'extraLife' => $row['extraLife'],
                'removeOptions' => $row['removeOptions'],
                'avatar' => $row['avatar']
            ];
        }

        foreach($_SESSION as $key => $val)
        {

            if ($key !== 'user')
            {

                unset($_SESSION[$key]);

            }

        }
    
    header('Location: userHomePage.php');
    }

}

?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="Sign_Up.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> SpeakWiz</title>
        <link rel="icon" type="image/png" href="images/Logo1.png">
	</head>

<body>
<center>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:500px"; width:500px; class="LOGO">
	<h1>Submit Survey? All answers in this response will be used in <br> customizing your own SpeakWiz gaming experience</h1>
    <h3 style="color:white">CLICK 'OK' TO CONTINUE</h3>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type = "submit" name = "OK" class="submit" value = "OK">
    <a href="userQ5.php" class="submit">BACK</a>
        </form>
    &nbsp;
</center>
</body>
</html>