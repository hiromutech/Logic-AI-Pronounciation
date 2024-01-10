<?php

session_start();


$confirmationErr = "";

if (isset($_POST['back']))
{
    $_SESSION["Q2"] = "";
    header("Location: userQ2.php");
}

if (isset($_POST['submit']))
{
    var_dump(!empty($_POST['confirmation']));
    var_dump(!empty($_POST['others']));
    if (!empty($_POST['confirmation']) || !empty($_POST['others']))
    {
        if (!empty($_POST['confirmation']))
        {
            $checked_count = count($_POST['confirmation']);

            foreach($_POST['confirmation'] as $selected)
            {
                $_SESSION["Q3"] = $_SESSION["Q3"] . " " . $selected;
            }
        }

        if (!empty($_POST['others']))
        {
            $_SESSION["Q3"] = $_SESSION["Q3"] . " " . $_POST['others'];

        }

        header("location: userQ4.php");
    }

    if (empty($_POST['confirmation']) && empty($_POST['others']))
    {
        $confirmationErr = "Please select at least one option";
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
    <p>&nbsp;</p>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SURVEY</h1>
    <h3 style="color:white">3. WHAT DO YOU HOPE TO ACHIEVE IN PLAYING THIS 'ENGLISH <BR> PRONOUNCIATION ENHANCEMENT GAME (SPEAKWIZ)?</h3>
    <h5 class = "error"><?php echo $confirmationErr; ?> </h5>
    <h5>(CHECK WHICH APPLIES)</h5>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Pronounciation"> 
    <label for="checkbox">
        Improve Pronounciation
    </label>
    
    <p></p>


    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Accent"> 
    <label for="checkbox">
        Reduce Accent
    </label>

    <p></p>

    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Fluency"> 
    <label for="checkbox">
        Enhance Fluency
    </label>

    <p></p>

    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Confidence"> 
    <label for="checkbox">
        Increase Confidence
    </label>

    <p></p>

    <div class="others">
        <input type="text" name="others" placeholder=" Others: (Please Specify)" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    &nbsp;
    <input type = "submit" name = "submit" class="submit" value = "NEXT">
    &nbsp;
    <input type = "submit" name = "back" class="submit" value = "BACK">

    </form>
	
</center>

</body>
</html>