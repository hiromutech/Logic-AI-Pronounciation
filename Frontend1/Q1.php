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
        header("Location: Q2.php");
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
            .error {color: #FF0000;}

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

            .btn_next {
                display: block;
                margin-left: auto ;
                margin-right: auto;
                width: 15%;
                text-align: center;
                padding : 8px 20px;
                border-radius: 25px;
                margin: 0 10px
                
            }

            .btn_next {
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

            .btn_next {
                background-color: violet;
            }

            .btn_back {
                background-color: purple;
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
    <h3>1. HOW CONFIDENT ARE YOU IN YOUR ENGLISH PRONOUNCIATION?</h3>
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
    <input type = "submit" class="btn_next" value="NEXT">
    &nbsp;
    <a href="Survey.php" class="btn_back">BACK</a>

    </form>
	
</center>

</body>
</html>