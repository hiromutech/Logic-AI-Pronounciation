<?php 

require 'connect.php';

session_start();

$invalid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

    if (empty($_POST["email"]) || empty($_POST["password"]))
    {
        $invalid = "complete all fields";
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
                    'totalCorrect' => $row['totalCorrect']
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
    <title>Document</title>
</head>
<body>

    <form action=" <?php htmlspecialchars($_SERVER["PHP_SELF"]) ?> " method = "post">
    <p style="color:red"><?php echo $invalid; ?> </p> 
    <input id="email" type="text" name = "email" placeholder="Email"> <br>
    <input id="password" type="text" name="password" placeholder="Password"> <br>
    <input type="submit" name="submit" value="LOGIN">
    </form>

    
</body>
</html>