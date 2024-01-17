<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" type="text/css" href="Sign_Up.css">
  
      <title>Send Reset Password Link with Expiry Time in PHP MySQL</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
          <div class="card border-secondary mt-5">
            <div class="card-header text-center" style="background-color:#111F23; color: white; font-family: Quicksand;">
              Request Reset Password
            </div>
            <div class="card-body" style="background-color:#111F23; color: white; font-family: Quicksand;">
              <form action="../main/dbconnection/password-reset-token.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <input type="submit" name="password-reset-token" class="submit">
              </form>
            </div>
          </div>
      </div>

   </body>
</html>