<?php
date_default_timezone_set('Asia/Manila');
include "dbcon.php";

if(isset($_POST['password-reset-token']) && $_POST['email']){
    
    
    $emailId = $_POST['email'];

    $result = mysqli_query($mysqli,"SELECT * FROM users WHERE email='" . $emailId . "'");

    $row= mysqli_fetch_array($result);

  if($row) {
    
     $token = md5($emailId).rand(10,9999);

     $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
    $base_url =  (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
    // reset link
     $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]/Logic-AI-Pronounciation/main/";

    $expDate = date("Y-m-d H:i:s",$expFormat);

    $update = mysqli_query($mysqli, "UPDATE users set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");

    $link = "<a href='" . $actual_link ."resetpassword.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";

    include_once($_SERVER['DOCUMENT_ROOT'] . '/Logic-AI-Pronounciation/main/vendor/phpmailer/phpmailer/src/PHPMailer.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Logic-AI-Pronounciation/main/vendor/phpmailer/phpmailer/src/SMTP.php');
    include_once($_SERVER['DOCUMENT_ROOT'] . '/Logic-AI-Pronounciation/main/vendor/phpmailer/phpmailer/src/Exception.php');

    
    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    // $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;      
    $mail->SMTPSecure = "ssl";              
    // GMAIL username
    $mail->Username = "custodioap04@gmail.com";
    // GMAIL password
    $mail->Password = "RpNcda8eKi";
    // sets GMAIL as the SMTP server
    // $mail->Host = "smtp.gmail.com";
    $mail->Host = "smtp-pulse.com";
    // set the SMTP port for the GMAIL server
    // $mail->Port = 465;
    $mail->Port = 465;
    $mail->From = 'alex.custodio@smsgt.com';
    $mail->FromName = 'Admin';
    $mail->AddAddress($emailId);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send()) {
    
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
      <h1>Success! Check your Email and Click on the link sent to your email.</h1>
      <a href=$base_url/Logic-AI-Pronounciation/main/userLogin.php class='submit'>Go Back to login</a>
      <center>
      </body>
    </html>";
      // redirect to reset password view
      // header("location: resetpassword.php");
    }
    else {
      echo "Mail Error -> ".$mail->ErrorInfo;
    }
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
      <h1>Invalid Email</h1>
      <a href=/Logic-AI-Pronounciation/main/forgotpassword.php class='submit'>Go Back</a>
      <center>
      </body>
    </html>";
  }
}
else

?>