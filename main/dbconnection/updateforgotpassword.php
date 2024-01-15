<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
  include "../dbconnection/dbcon.php";
  
  $emailId = $_POST['email'];

  $token = $_POST['reset_link_token'];
  
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = mysqli_query($mysqli,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");

   $row = mysqli_num_rows($query);

   if($row){

       mysqli_query($mysqli,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");

       echo '<p>Congratulations! Your password has been updated successfully.</p>';
   }else{
      echo "<p>Something goes wrong. Please try again</p>";
   }
}
?>