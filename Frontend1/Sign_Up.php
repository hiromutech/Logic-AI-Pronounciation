<?php
    require 'connect.php';

    session_start();
    session_unset();
    
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // GET THE USERNAME, EMAIL, CONTACTNUM DATA FROM USERS TABLE 

    $sql = "SELECT userName, email, contactNum FROM users";
    $result = mysqli_query($conn, $sql);

    $userNameCheck = [7];
    $emailCheck = [7];
    $contactNumCheck = [7];

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $idx = 0;
        while($row = $result -> fetch_assoc()) 
        {
            $userNameCheck[$idx] = $row["userName"];
            $emailCheck[$idx] = $row["email"];
            $contactNumCheck[$idx] = $row["contactNum"];
            $idx++;
        }
    } 


    // DEFINE VARIABLES AND SET TO EMPTY VALUES
    $fullNameErr = $userNameErr = $emailErr = $contactNumErr = $passwordErr = $confirmationErr = "";
    $fullName = $userName = $email = $contactNum = $password = $confirmation = $password1 = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $fullName = $_POST["fullName"];
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $contactNum = $_POST['contactNum'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];

        // LOOP TO CHECK IF USERNAME, EMAIL, AND CONTACT IS EXISTING
        $userNameExisting = false;
        $emailExisting = false;
        $contactNumExisting = false;

        for ($i = 0; $i < count($emailCheck); $i++)
        {
            if ($userName == $userNameCheck[$i])
            {
                $userNameExisting = true;   
            }

            if ($email == $emailCheck[$i])
            {
                $emailExisting = true;
            }

            if ($contactNum == $contactNumCheck[$i])
            {
                $contactNumExisting = true;
            }
        }

        $complete = 0;

        // FULL NAME
        if (empty($_POST["fullName"]))
        {
            $fullNameErr = "Full Name is Required";
        }
        else if (!preg_match("/^[a-zA-Z-' ]*$/",$fullName))
        {
            $fullNameErr = "Only letters and white space allowed";
        }
        else
        {
            $complete++;
        }

        // USER NAME
        if (empty($_POST["userName"]))
        {
            $userNameErr = "Username is Required";
        }
        else if ($userNameExisting)
        {
            $userNameErr = "Username already exists";
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
        else if ($emailExisting)
        {
            $emailErr = "Email already exists";
        }
        else
        {
            $complete++;
        }

        // CONTACT NUMBER
        $strLength = (int)strlen($contactNum);
        if (empty($_POST["contactNum"]))
        {
            $contactNumErr = "Contact Number is Required";
        }
        else if (!($strLength == 11))
        {
            $contactNumErr = "Input an 11-digit number";
        }
        else if ($contactNumExisting)
        {
            $contactNumErr = "Contact Number already exists";
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
        {
            $passwordErr = "Please confirm your password";
        }
        else if (!($password == $password1))
        {
            $passwordErr = "Password are not the same";
        }
        else if ($passLen < 8)
        {
            $passwordErr = "Please create a stronger password";
        }
        else
        {
            $complete++;
        }

        // CONFIRMATION
        if (empty($_POST['confirmation']))
        {
            $confirmationErr = "Acceptance of terms and conditions needed";
        }
        else
        {
            $complete++;
        }

        // IF ALL REQUIREMENTS ARE MET ADD ALL DATA TO SESSION THEN GO TO THE NEXT PAGE
        if ($complete == 6)
        {

            $_SESSION['fullName'] = $fullName;
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            $_SESSION['contactNum'] = $contactNum;
            $_SESSION['password'] = $password;

            header('Location: Survey.php');
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
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
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
        <input type="number" name="contactNum" placeholder=" Contact No." style="width: 300px; height: 25px;">
    </div>

    <p></p>

    <span class="error"> <?php echo $passwordErr; ?></span>
    <div class="pass">
        <input type="password" name="password" placeholder=" Password" style="width: 300px; height: 25px;" id="password">
        <img src="images/eyeclose.png" id="eyeicon">
    </div>

    <p></p>

    <div class="pass1">
        <input type="password" name="password1" placeholder=" Re-type Password" style="width: 300px; height: 25px;" id="password1">
        <img src="images/eyeclose.png" id="eyeicon1">
    </div>


    <script>
        let eyeicon = document.getElementById("eyeicon");
        let password = document.getElementById("password");

        eyeicon.onclick = function(){
            if (password.type =="password"){
                password.type = "text";
                eyeicon.src = "images/eyeopen.jpg";
            }else {
                password.type = "password";
                eyeicon.src = "images/eyeclose.png";
            }
        }
    </script>

<script>
    let eyeicon1 = document.getElementById("eyeicon1");
    let password1 = document.getElementById("password1");

    eyeicon1.onclick = function(){
        if (password1.type =="password"){
            password1.type = "text";
            eyeicon1.src = "images/eyeopen.jpg";
        }else {
            password1.type = "password";
            eyeicon1.src = "images/eyeclose.png";
        }
    }
</script>

    <p></p>

    <span class="error"> <?php echo $confirmationErr; ?></span>
    <br>
    <input type="checkbox" name="confirmation" id="confirmation"> 
    <label for="checkbox">By clicking on Sign Up, you agree to our</label><br>
    <a href="Terms.php" style="color: palevioletred;"><u>Terms, Policies, & Conditions</u></a>
    <p></p>

    <input type="submit" name = "submit"  class="submit">
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
    <a href="Log_In.php" class="submit">LOG IN</a>
    &nbsp;
    <a href="Title_Page.php" class="submit">BACK</a>

    <p>&nbsp;</p>
	
</center>

</body>
</html>