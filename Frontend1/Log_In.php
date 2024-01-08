<?php
    require 'connect.php';

    session_start();
    session_unset();
    
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
    // DEFINE VARIABLES AND SET TO EMPTY VALUES
    $emailErr = $passwordErr ="";
    $email = $password = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {        
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
        else
        {
            $complete++;
        }

        // EMAIL
        if (empty($_POST["email"]))
        {
            $emailErr = "Email is Required";
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid Email Format";
            $email = "";
        }
        
        else
        {
            $complete++;
        }
                // PASSWORD
                $passLen = strlen($password);
                if (empty($_POST["password"]))
                {
                    $passwordErr = "Password is Required";
                }
                else if (empty($_POST["password1"]))

    // IF ALL REQUIREMENTS ARE MET ADD ALL DATA TO SESSION THEN GO TO THE NEXT PAGE
    if ($complete == 6)
    {

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        header('Location: homePage.php');
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
 
	</head>

<body>
<center>
    <p>&nbsp;</p>
    <img  src="Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>LOGIN</h1>

    <div class="email">
        <input type="text" name="email" placeholder=" Email" style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <div class="pass">
        <input type="password" name="password" placeholder=" Password" style="width: 300px; height: 25px;" id="password">
        <img src="eyeclose" id="eyeicon">
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

    <a href="forgot_password.php" sstyle="color: palevioletred; font-size: 12px;">FORGOT PASSWORD?</a>

    <p>&nbsp;</p>
    
    <a href="forgot_password" background-color:pink; class="btn_log">LOG IN</a>
    <p>&nbsp;</p>

    <div>
        <h5 class="Noaccount" style="color: white;"> HAVE AN ACCOUNT? </h5>
    </div>
    
    &nbsp;
    <a href="Sign_Up.php" class="btn_sign">SIGN UP</a>
    &nbsp;
    <a href="Title_Page.php" class="btn_back">BACK</a>
	
</center>

</body>
</html>
