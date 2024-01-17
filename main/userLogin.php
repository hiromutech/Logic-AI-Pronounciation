<?php 

require 'connect.php';

session_start();

$invalid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (empty($_POST["email"]) || empty($_POST["password"]))
    {
        $invalid = "Complete all fields";
    }
    else
    {
        $emailInput = $_POST["email"];
        $passwordInput = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '{$emailInput}' AND password = '{$passwordInput}'";
        $result = mysqli_query($conn, $sql);

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['user'] = [
                    'user_id' => $row['user_id'],
                    'fullName' => $row['fullName'],
                    'userName' => $row['userName'],
                    'email' => $row['email'],
                    'contactNum' => $row['contactNum'],
                    'password' => $row['password'],
                    'difficulty' => $row['q5'],
                    'potions' => $row['potions'],
                    'totalPotions' => $row['totalPotions'],
                    'highscore' => $row['highscore'],
                    'totalAnswered' => $row['totalAnswered'],
                    'totalCorrect' => $row['totalCorrect'],
                    'x2' => $row['x2'],
                    'extraLife' => $row['extraLife'],
                    'removeOptions' => $row['removeOptions'],
                    'avatar' => $row['avatar']
                ];
                
                header("Location: userHomePage.php");
            }
          } else {
            $invalid = "Email and password doesn't match";
          }
          $conn->close();

    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Sign_Up.css">
    <title>Document</title>
</head>
<body>

<center>
    <p>&nbsp;</p>
    <img  src="images/Logo1.png" alt="SpeakWiz Logo" style="height:100px"; width:100px; class="LOGO">
    <h1>LOG-IN</h1>

    <form action=" <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> " method = "post">
    <p style="color:red"><?php echo $invalid; ?> </p> 
    <div class="email">
    <input id="email" type="text" name = "email" placeholder="Email"> <br>
    </div>

    <br>


    <div class="pass">
        <input type="password" name="password" placeholder=" Password" style="width: 300px; height: 25px;" id="password">
        <img src="images/eyeclose.png" id="eyeicon">
    </div>

    <br>

    <a href="forgotpassword.php" style="color: palevioletred;">Forgot Password?</a>

    <br>


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

    <br>
    <input type="submit" name = "submit"  class="submit">
    <p style="color: white;font-size: 12px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">OR</p>

</form>


<div>
    <h5 class="Noaccount" style="color: white;"> DON'T HAVE AN ACCOUNT? </h5>
</div>

&nbsp;
<a href="userSignUp.php" class="submit">SIGN UP</a>

    </form>

    <p>&nbsp;</p>

</center>
    
</body>
</html>