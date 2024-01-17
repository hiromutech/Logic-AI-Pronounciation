<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
  include "../dbconnection/dbcon.php";
  
  $emailId = $_POST['email'];

  $token = $_POST['reset_link_token'];
  
  $password = $_POST['password'];

  $query = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");

   $row = mysqli_num_rows($query);

   if($row){

       mysqli_query($mysqli,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");

       echo "<!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href=Sign_Up.css>
        <title>Reset Password</title>
        
      </head>
      <body>
      <center>
      <img  src='Logo1.png' alt='SpeakWiz Logo' style='height:500px'; width:500px; class='LOGO'>
      <h1>Password Updated Successfully!</h1>
      <a href=/Logic-AI-Pronounciation/main/userLogin.php class='submit'>Go Back to Login</a>
      <center>
      </body>
    </html>";
   }else{
      echo "<!DOCTYPE html>
      <html lang='en'>
      <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' type='text/css' href=Sign_Up.css>
        <title>Reset Password</title>
        
      </head>
      <body>
      <center>
      <img  src='Logo1.png' alt='SpeakWiz Logo' style='height:500px'; width:500px; class='LOGO'>
      <h1>Something went wrong please try again</h1>
      <a href=/Logic-AI-Pronounciation/main/userLogin.php class='submit'>Go Back to Login</a>
      <center>
      </body>
    </html>";;
   }
}
?>