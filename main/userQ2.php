<?php
session_start();



$confirmationErr = "";

if (isset($_POST['submit']))
{
    if (!empty($_POST['confirmation']) || !empty($_POST['others']))
    {
        if (!empty($_POST['confirmation']))
        {
            $checked_count = count($_POST['confirmation']);

            foreach($_POST['confirmation'] as $selected)
            {
                $_SESSION["Q2"] = $_SESSION["Q2"] . " " . $selected;
            }
        }

        if (!empty($_POST['others']))
        {
            $_SESSION["Q2"] = $_SESSION["Q2"] . " " . $_POST['others'];

        }

        header("location: userQ3.php");
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
    <h3 style="color:white">2. WHY ARE YOU LEARNING ENGLISH PRONOUNCIATION?</h3>
    <h5 class = "error"><?php echo $confirmationErr; ?></h5>
    <h5>(CHECK WHICH APPLIES)</h5>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Fun"> 
    <label for="checkbox">
        Just For Fun
    </label>
    
    <p></p>


    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Occupation"> 
    <label for="checkbox">
        Occupational Requirement
    </label>

    <p></p>

    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Educational"> 
    <label for="checkbox">
        Educational Purpose
    </label>

    <p></p>

    <input type="checkbox" name="confirmation[]" id="confirmation" value = "Productivity"> 
    <label for="checkbox">
        Productivity
    </label>

    <p></p>

    <div class="others">
        <input type="text" name="others" placeholder=" Others: (Please Specify)" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    &nbsp;
    <input type = "submit" name = "submit" class="submit" value = "NEXT">
    &nbsp;
    <a href="userQ1.php" class="submit">BACK</a>

        </form>
	
</center>

</body>
</html>