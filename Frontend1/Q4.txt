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
    <h3>4.HOW LONG IS YOUR DAILY ALLOTED <br> TIME IN PLAYING SPEAKWIZ?</h3>
    <h5>(CHECK WHICH APPLIES)</h5>

    <input type="radio" name="confirmation" id="confirmation"> 
    <label for="radio">
        <b>Light:</b> 5 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation"> 
    <label for="radio">
        <b>Moderate:</b> 10 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation"> 
    <label for="radio">
        <b>Dedicated:</b> 15 minutes a day
    </label>

    <p></p>

    <input type="radio" name="confirmation" id="confirmation"> 
    <label for="radio">
        <b>Intensive:</b> 20 minutes a day
    </label>

    <p></p>&nbsp;

    <a href="Q5.html" class="btn_sign">NEXT</a>
    &nbsp;
    <a href="Q3.html" class="btn_back">BACK</a>
</center>

</body>
</html>