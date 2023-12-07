<?php
    require 'connect.php';

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // define variables and set to empty values
    $fullNameErr = $userNameErr = $emailErr = $contactNumErr = $passwordErr = "";
    $fullName = $userName = $email = $contactNum = $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["fullName"]))
        {
            $fullNameErr = "Full Name is Required";
        }
        else
        {
            $fullName = clean_input($_POST["fullName"]);  
        }

        if (empty($_POST["userName"]))
        {
            $userNameErr = "Username is Required";
        }
        else
        {
            $userName = clean_input($_POST["userName"]);
        }

        if (empty($_POST["email"]))
        {
            $emailErr = "Email is Required";
        }

        $email = clean_input($_POST["email"]);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid Email Format";
            $email = "";
        }

        if (empty($_POST["contactNum"]))
        {
            $contactNumErr = "Contact Number is Required";
        }
        else
        {
            $contactNum = clean_input($_POST["contactNum"]);
        }

        if (empty($_POST["password"]))
        {
            $passwordErr = "Password is Required";
        }
        else
        {
   
            $password = clean_input($_POST["password"]);
        }




    }

    function clean_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>

<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> SpeakWiz</title>
        <link rel="icon" type="image/png" href="Logo1.png">
        <link rel="stylesheet" type="text/css" href="Sign_Up.css">


            

	</head>

<body>
<center>
    <p>&nbsp;</p>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>SIGN-UP</h1>

    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <span class="error"> <?php echo $fullNameErr; ?></span>
    <div class="name">
        <input type="text" name="fullName" placeholder=" Full Name (FN, MI, LN)" style="width: 300px; height: 25px;">
    </div>

    <p></p>
    
    <span class="error"> <?php echo $userNameErr; ?></span>
    <div class="username">
        <input type="text" name="userName" placeholder=" Username" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <span class="error"> <?php echo $emailErr; ?></span>
    <div class="email">
        <input type="text" name="email" placeholder=" Email" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <span class="error"> <?php echo $contactNumErr; ?></span>
    <div class="contact">
        <input type="text" maxlength="11" name="contactNum" placeholder=" Contact No." style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <span class="error"> <?php echo $passwordErr; ?></span>
    <div class="pass">
        <input type="password" name="password" placeholder=" Password" style="width: 300px; height: 25px;" id="password">
        <img src="eyeclose" id="eyeicon">
    </div>

    <p></p>

    <div class="pass1">
        <input type="password" name="password1" placeholder=" Re-type Password" style="width: 300px; height: 25px;" id="password1">
        <img src="eyeclose" id="eyeicon1">
    </div>


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

    <input type="submit" name = "submit" style="background-color:pink;" class="btn_log">
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

    </form>

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