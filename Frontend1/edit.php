<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // retrieve form data
    $username = $_POST["email"]; // Assuming you're using 'email' as the name for the email input
    $password = $_POST["password"];
     
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";  
    $dbname = "speakwiz";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {      
        die("Connection failed: " . $conn->connect_error);
    }

    // Using prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM login WHERE username=? AND password=?");
    $stmt->bind_param("ss", $username, $password); // 'ss' denotes two strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // login success
        header("Location: accinfo.html");  // Corrected the redirection URL
        exit();
    } else {
        // login failed
        header("Location: forgot_password.php");
        exit();
    }
    

   

}
?>
