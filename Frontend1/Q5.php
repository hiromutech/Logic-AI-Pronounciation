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
        $_SESSION["Q5"] = $_POST["confirmation"];
        header("Location: Submit.php");
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
    <h3>5.CHOOSE YOUR LEVEL OF DIFFICULTY</h3>
    <h5 class = "error"><?php echo $confirmationErr; ?></h5>
    <h5>(CHECK WHICH APPLIES)</h5>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="radio" name="confirmation" id="confirmation" value = "Very Easy"> 
    <label for="radio">
        <b>Novice:</b> Very Easy
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "Easy"> 
    <label for="radio">
        <b>Magician:</b> Easy
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "Moderate"> 
    <label for="radio">
        <b>Sourcerer:</b> Moderate
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "Hard"> 
    <label for="radio">
        <b>Wizard:</b> Hard
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation" value = "Very Hard"> 
    <label for="radio">
        <b>Magus:</b> Very Hard
    </label>

    <p></p>

    &nbsp;
    <input type = "submit" name = "submit" class="submit" value = "NEXT">
    &nbsp;
    <a href="Q4.php" class="submit">BACK</a>

        </form>
	
</center>

</body>
</html>