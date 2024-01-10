<?php

session_start();


$confirmationErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["confirmation"]))
    {
        $confirmationErr = "Input your answer";
    }
    else
    {
        $_SESSION["Q1"] = $_POST["confirmation"];
        header("Location: userQ2.php");
    }

}


?>

<!DOCTYPE html>
<html>
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> SpeakWiz</title>
        <link rel="icon" type="image/png" href="images/Logo1.png">
        <link rel="stylesheet" href="Sign_Up.css">
	</head>

<body>
<center>
    <p>&nbsp;</p>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SURVEY</h1>
    <h3 style="color:white">1. HOW CONFIDENT ARE YOU IN YOUR ENGLISH PRONOUNCIATION?</h3>
    <h5 class = "error"><?php echo $confirmationErr; ?></h5>
    <h5>(CHECK WHICH APPLIES)</h5>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="radio" name="confirmation" id="confirmation" value="1"> 
    <label for="radio">
        Not confident at all
    </label>
    
    <p></p>


    <input type="radio" name="confirmation" id="confirmation" value="2"> 
    <label for="radio">
        Slightly Confident
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value="3"> 
    <label for="radio">
        Moderately Confident
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value="4"> 
    <label for="radio">
        Very confident
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value="5"> 
    <label for="radio">
        Extremely Confident
    </label>

    <p></p>

    &nbsp;
    <br>
    <input type = "submit" class="submit" value="NEXT">
    &nbsp;
    <a href="userSurvey.php" class="submit">BACK</a>

    </form>
	
</center>

</body>
</html>