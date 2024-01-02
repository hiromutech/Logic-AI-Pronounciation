<?php // require_once "controllerUserData.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
    <style>
    body {background-image:url(https://e0.pxfuel.com/wallpapers/378/851/desktop-wallpaper-stars-purple-cosmos-space-cosmos-universe.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;}
    a {color: white; text-decoration: none;}
    .conti_sign {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 15%;
                text-align: center;
                padding : 8px 20px;
                border-radius: 25px;
                margin: 0 10px
            }
            .conti_sign {
                background-color: violet;
            }
    a:hover {color: palevioletred; background-color: pink;}

</style>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Forgot Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="forgot_password.php" method="POST" autocomplete="off">

                        
                        
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email address">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" name="check-email" value="Continue">
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
