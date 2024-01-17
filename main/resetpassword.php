<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="Sign_Up.css">
  
      <title>Reset Password In PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>

      <div class="container">
          <div class="card border-secondary mt-5">
            <div class="card-header text-center" style="background-color:#111F23; color: white; font-family: Quicksand;">
              Reset Password
            </div>
            <div class="card-body" style="background-color:#111F23; color: white; font-family: Quicksand;">
          <?php if($_GET['key'] && $_GET['token']): ?>

            <?php 
              include "dbconnection/dbcon.php";
              
              $email = $_GET['key'];

              $token = $_GET['token'];

              $query = mysqli_query($mysqli,
              "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
              );

              $curDate = date("Y-m-d H:i:s");


              if (mysqli_num_rows($query) > 0) 
                $row = mysqli_fetch_array($query);

            ?>

                <?php if($row['exp_date'] >= $curDate): ?>
                    <form action="dbconnection/updateforgotpassword.php" method="post">
                        <input type="hidden" name="email" value="<?php echo $email;?>">
                        <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name='password' class="form-control" required>
                        </div>                

                        <div class="form-group">
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" name='cpassword' class="form-control" required>
                        </div>
                        <input type="submit" name="new-password" class="submit">
                    </form>
                <?php else: ?>
                    <p>This forget password link has been expired</p>
                <?php endif;?>
            <?php endif;?>
            </div>
          </div>
      </div>
   </body>
</html>