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
                background-color: violet;
            }

            .btn_sign {
                background-color: indigo;
            }

            .btn_back {
                background-color: purple;
            }

            .name {
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
            }

            .name input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .username {
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
            }

            .username input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .email {
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
            }

            .email input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .contact {
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
            }

            .contact input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .pass{
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
                align-items: center;
            }

            .pass input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .pass img {
                cursor: pointer;
                width: 25px; 
                height: 25px;
            }

            
            .pass1{
                background: white;
                width: 90%;
                max-width: 265px;
                border-radius: 5px;
                padding: 10px 20px;
                margin: auto;
                display: flex;
                align-items: center;
            }

            .pass1 input {
                width: 100%
                padding: 10px 0;
                border: 0;
                outline: 0;
                color: #555
            }

            .pass1 img {
                cursor: pointer;
                width: 25px; 
                height: 25px;
            }
            

            .Noaccount{
                display: grid;
                grid-template-columns: repeat(3,1fr);
                align-items: center;
                column-gap: 3rem;
                margin: 1% 25%;
            }

            .Noaccount::before, .Noaccount::after{
                content: "";
                height: 2px;
                background-color: white;
                display: flex;
            }

            .g_id_signin {
                width: 300px;
            }

            h1{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}
            h5{color: white; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;}

            #confirmation {
            accent-color: #9b59b6;
            }

            label {
            color:palevioletred;
            }

		</style>
	</head>

<body>
<center>
    <p>&nbsp;</p>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SIGN-UP</h1>

    <form action = "connect.php" method="POST">
    <div class="name">
        <input type="text" name="name" placeholder=" Full Name (FN, MI, LN)" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <div class="username">
        <input type="text" name="name" placeholder=" Username" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <div class="email">
        <input type="text" name="email" placeholder=" Email" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <div class="contact">
        <input type="number" maxlength="11" name="contact" placeholder=" Contact No." style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <div class="pass">
        <input type="password" name="password" placeholder=" Password" style="width: 300px; height: 25px;" id="password">
        <img src="eyeclose" id="eyeicon">
    </div>

    <p></p>

    <div class="pass1">
        <input type="password" name="password1" placeholder=" Re-type Password" style="width: 300px; height: 25px;" id="password1">
        <img src="eyeclose" id="eyeicon1">
    </div>
        </form>

    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function(){
            if (password.type =="password"){
                password.type = "text";
                eyeicon.src = "eyeopen";
            }else {
                password.type = "password";
                eyeicon.src = "eyeclose";
            }
        }
    </script>

<script>
    let eyeicon1 = document.getElementById("eyeicon1");
    let password1 = document.getElementById("password1");

    eyeicon1.onclick = function(){
        if (password1.type =="password"){
            password1.type = "text";
            eyeicon1.src = "eyeopen";
        }else {
            password1.type = "password";
            eyeicon1.src = "eyeclose";
        }
    }
</script>

    <p></p>

    <input type="checkbox" name="confirmation" id="confirmation"> 
    <label for="checkbox">By clicking on Sign Up, you agree to our</label><br>
    <a href="Terms.php" style="color: palevioletred;"><u>Terms, Policies, & Conditions</u></a>
    <p></p>

    <a href="Successfully.php" background-color:pink; class="btn_log">SIGN UP</a>
    <p style="color: white;font-size: 12px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">OR</p>

    <script src="https://accounts.google.com/gsi/client" async></script>
    <div id="g_id_onload"
        data-client_id="YOUR_GOOGLE_CLIENT_ID"
        data-login_uri="https://your.domain/your_login_endpoint"
        data-auto_prompt="false">
    </div>
    <div class="g_id_signin"
        data-type="standard"
        data-size="large"
        data-theme="outline"
        data-text="sign_in_with"
        data-shape="rectangular"
        data-logo_alignment="left">
    </div>

    <p>&nbsp;</p>    

    <div>
        <h5 class="Noaccount" style="color: white;"> ALREADY HAVE AN ACCOUNT? </h5>
    </div>
    
    &nbsp;
    <a href="Log_In.php" class="btn_sign">LOG IN</a>
    &nbsp;
    <a href="Title_Page.php" class="btn_back">BACK</a>

    <p>&nbsp;</p>
	
</center>

</body>
</html>