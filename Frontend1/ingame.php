<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Ingame</title>
        <link rel="icon" type="image/png" href="Logo1.png">
        <style>
            body {background-image:url(gamebg.png);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100%}
            a {color: white; text-decoration: none;}

            a:hover {background-color: rgb(212, 95, 27);}

            .LOGO {
                max-width: 100%;
                max-height: 100%;
                width: 200px;
                height: 200px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: -480px;
            }

            .tmer{
                max-width: 100%;
                max-height: 100%;
                width: 1200px;
                height: 1000px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: -450px;
            }

            .gamep {
                max-width: 100%;
                max-height: 100%;
                width: 1000px;
                height: 1000px;
                padding: 100px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-top: -450px;
    
            }

            .f {
                max-width: 100%;
                max-height: 100%;
                width: 150px;
                height: 80px;
                display: block;
                position: absolute;
                margin-left: -120px;
                margin-right: auto;
                margin-top: -410px;
            }

            .t {
                max-width: 100%;
                max-height: 100%;
                width: 120px;
                height: 120px;
                display: block;
                position: absolute;
                margin-top: -430px;
                margin-left: -130px;
                justify-content: center;
            }

            .btn_1 {
                display: block;
                margin-left: auto ;
                margin-right: auto;
                width: 15%;
                font-size: 30px;
                text-align: center;
                padding : 8px 20px;
                margin: 600px 20px
                
            }

            .btn_1 {
                background-color: rgb(146, 61, 11);
                margin-top: -10px;
            }

            .btn_2 {
                display: block;
                margin-left: auto ;
                margin-right: auto;
                width: 15%;
                font-size: 30px;
                text-align: center;
                padding : 8px 20px;
                margin: 600px 20px
                
            }

            .btn_2 {
                background-color: rgb(146, 61, 11);
                margin-top: -10px;
            }
            
            .btn_3 {
                display: block;
                margin-left: auto ;
                margin-right: auto;
                width: 15%;
                font-size: 30px;
                text-align: center;
                padding : 8px 20px;
                margin: 600px 20px
                
            }

            .btn_3 {
                background-color: rgb(146, 61, 11);
                margin-top: -550px;
            }

            .btns{
                display: inline-block;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .db{
                margin-left: -800px;
                margin-top: -180px;
                display: flex;  
                text-align: center;
                justify-content: center;
            }

            .db2{
                right: 10px;
                margin-top: 1px;
                margin-left: 850px;
                display: flex;  
                text-align: center;
                justify-content: center;
            }


            h1{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; 
                font-size: 60px;
                margin-top: -400px;
            }
            h3{font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h5{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}

		</style>
	</head>

<body>
<center>
    <img  src="timer.png" alt="Timer" class="tmer">
    <img  src="Logo.png" alt="SpeakWiz Logo" class="LOGO">
    <img  src="gamepic.png" alt="Game Picture" class="gamep">
 
    <h1>RESERVOIR</h1>
    
    <div class="btns">
    <a href="a" class="btn_1">Re-Serv-Wire</a>
    <a href="a" class="btn_2">Re-Serv-Our</a></div>
    <div class="btns">
    <a href="a" class="btn_3">Re-Serv-Your</a>
    <a href="a" class="btn_3">Re-Serv-Wah</a>
    </div>

    <div class="db">
    <img  src="fire.png" alt="Fire Logo" class="f">
    <h1>0</h1>
    </div>
    <div class="db2">
    <img  src="thunder.png" alt="Energy Logo" class="t">
    <h1>4/5</h1>
    </div>
    
</center>
</body>
</html>