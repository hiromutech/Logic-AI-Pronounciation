<?php

session_start();

echo "Q1: " . $_SESSION["Q1"] . "<br>";
echo "Q2: " . $_SESSION["Q2"] . "<br>";

$confirmationErr = "";

if (isset($_POST['back']))
{
    $_SESSION["Q2"] = "";
    header("Location: Q2.php");
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

        header("location: Q4.php");
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
        <link rel="icon" type="image/png" href="Logo1.png">
        <style>
            .error{color: #FF0000}


            body {background-image:url(https://e0.pxfuel.com/wallpapers/378/851/desktop-wallpaper-stars-purple-cosmos-space-cosmos-universe.jpg);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;}
            a {color: white; text-decoration: none;}

            a:hover {color: palevioletred; background-color: pink;}

            .LOGO {
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .btn_log {
                display: block;
                margin-left: auto ;
                margin-right: auto;
                width: 15%;
                text-align: center;
                padding : 8px 20px;
                border-radius: 25px;
                margin: 0 10px
                
            }

            .btn_sign {
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

            .btn_log {
                background-color: indigo;
            }

            .btn_sign {
                background-color: violet;
            }

            .btn_back {
                background-color: purple;
            }

            .others {
                background: white;
                width: 50%;
                max-width: 150px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
            }

            .others input {
                width: 50%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }
            h1{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h3{color: violet; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h5{color: pink; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            label{color: white; font-size: 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}

            #confirmation {
            accent-color: #9b59b6;
            width: 15px;
            height: 15px;
            align-items: justify;
            }
		</style>
	</head>

<body>
<center>
    <p>&nbsp;</p>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SURVEY</h1>
    <h3>3. WHAT DO YOU HOPE TO ACHIEVE IN PLAYING THIS 'ENGLISH <BR> PRONOUNCIATION ENHANCEMENT GAME (SPEAKWIZ)?</h3>
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
    <input type = "submit" name = "submit" class="btn_sign" value = "NEXT">
    &nbsp;
    <input type = "submit" name = "back" class="btn_sign" value = "BACK">

    </form>
	
</center>

</body>
</html>