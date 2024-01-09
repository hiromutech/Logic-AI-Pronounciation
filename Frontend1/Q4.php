<?php

session_start();


if (isset($_POST['back']))
{
    $_SESSION['Q3'] = "";
    header("Location: Q3.php");
}

$confirmationErr = "";
if (isset($_POST['submit']))
{
    if (empty($_POST["confirmation"]))
    {
        $confirmationErr = "Input your answer";
    }
    else
    {
        $_SESSION["Q4"] = $_POST["confirmation"];
        header("Location: Q5.php");
    }

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
    <p>&nbsp;</p>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SURVEY</h1>
    <h3>4.HOW LONG IS YOUR DAILY ALLOTED <br> TIME IN PLAYING SPEAKWIZ?</h3>
    <h5 class = "error"><?php echo $confirmationErr; ?></h5>
    <h5>(CHECK WHICH APPLIES)</h5>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="radio" name="confirmation" id="confirmation" value = "5"> 
    <label for="radio">
        <b>Light:</b> 5 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "10"> 
    <label for="radio">
        <b>Moderate:</b> 10 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "15"> 
    <label for="radio">
        <b>Dedicated:</b> 15 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "20"> 
    <label for="radio">
        <b>Intensive:</b> 20 minutes a day
    </label>

    <p></p>&nbsp;

    <input type = "submit" name = "submit" class="submit" value = "NEXT">
    &nbsp;
    <input type = "submit" name = "back" class="submit" value = "BACK">
    </form>
</center>

</body>
</html>