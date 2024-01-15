<?php 
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "../dbconnection/dbcon.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
   // Validate credentials
   if(empty($email_err) && empty($password_err)){
    // Prepare a select statement
    $sql = "SELECT user_id, email, password FROM users WHERE email = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);
        
        // Set parameters
        $param_username = $email;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Store result
            $stmt->store_result();
            
            // Check if email exists, if yes then verify password
            if($stmt->num_rows == 1){                    
                // Bind result variables
                $stmt->bind_result($id, $email, $hashed_password);
                if($stmt->fetch()){
                    if(password_verify($password, $hashed_password)){
                        // Password is correct, so start a new session
                        session_start();
                        
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $email;                       
                        
                        // Redirect user to welcome page
                        header("location: welcome.php");
                    } else{
                        // Password is not valid, display a generic error message
                        $login_err = "Invalid email or password.";
                    }
                }
            } else{
                // email doesn't exist, display a generic error message
                $login_err = "No record found.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}
    
    // Close connection
    $mysqli->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
<body>
    <div class="container">
        <div class="child">
            <p>&nbsp;</p>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            
            <img  src="../assets/images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
            <h1 class="text-center">LOGIN</h1>

            <?php 
                if(!empty($login_err)){
                    echo '<div class="alert alert-danger text-center">' . $login_err . '</div>';
                }        
            ?>

            <div class="email">
                <input type="text" name="email" placeholder="Email" style="width: 300px; height: 25px;" required>
            </div>

            <p></p>

            <div class="pass">
                <input type="password" name="password" placeholder="Password" style="width: 300px; height: 25px;" id="password" required value="">
                <img src="../assets/images/eyeclose.png" id="eyeicon">
            </div>

            <a href="forgotpassword.php" style="color: palevioletred; font-size: 12px;" class="text-center">FORGOT PASSWORD?</a>

            <p>&nbsp;</p>
            
            <input type="submit" value="LOG IN" class="btn btn_log">

            <div>
                <h5 class="text-center" style="color: white;" > DON'T HAVE AN ACCOUNT? </h5>
            </div>
            
            &nbsp;
            <a href="Sign_Up.php" class="btn btn_sign">SIGN UP</a>
            &nbsp;
            <a href="" class="btn btn_back">BACK</a>
            </form>
        </div>
        
    </div>

    <!-- scripts -->
    <script src="../assets/js/login.js"></script>
</body>
</html>