<?php

session_start();

// Start Game
if (isset($_POST["start"]))
{
    header("Location: userIngame.php");
}

$page = "";

// First Launch
if (!($_SERVER["REQUEST_METHOD"] == "POST"))
{
  $page = "play";
}


// Navigate
if (isset($_POST["play"]))
{
  $page = "play";
}
else if (isset($_POST["quests"]))
{
  $page = "quests";
}
else if (isset($_POST["shop"]))
{
  $page = "shop";
}
else if (isset($_POST["settings"]))
{
  $page = "settings";
}
else if (isset($_POST["profile"]))
{
  $page = "profile";
}
else if (isset($_POST["signOut"]))
{
  session_unset();
  header("Location: userLoginTemp.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>

@font-face 
{
  font-family: Quicksand;
  src: url(Quicksand_Bold.otf);
}

@font-face{
  font-family: Roboto;
  src: url(Roboto-Light.ttf);
}




body {background-color: #111F23;
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;
font-family: "Quicksand";
color: white}






/* CSS */
.button-19 {
  appearance: button;
  background-color: #5900b3;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: 'Quicksand';
  font-size: 15px;
  font-weight: 700;
  letter-spacing: .8px;
  line-height: 20px;
  margin: 0;
  outline: none;
  overflow: visible;
  padding: 13px 16px;
  text-align: center;
  text-transform: uppercase;
  touch-action: manipulation;
  transform: translateZ(0);
  transition: filter .2s;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  white-space: nowrap;
  width: 100%;
}

.button-19:after {
  background-clip: padding-box;
  background-color: #8000ff;
  border: solid transparent;
  border-radius: 16px;
  border-width: 0 0 4px;
  bottom: -4px;
  content: "";
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  z-index: -1;
}

.button-19:main,
.button-19:focus {
  user-select: auto;
}

.button-19:hover:not(:disabled) {
  filter: brightness(1.1);
  -webkit-filter: brightness(1.1);
}

.button-19:disabled {
  cursor: auto;
}

.button-19:active {
  border-width: 4px 0 0;
  background: none;
}


/* Boilerplate */
.submit {
  all: unset;
  display: inline-block;
  padding: 20px;
  color: white;
  text-transform: uppercase;
  font-family: 'Quicksand';
  letter-spacing: 1.5px;
  font-weight: bold;
  cursor: pointer;
  border-radius: 17px;
}

/* Important stuff below */
.submit {
  background-color: #8000ff;
  box-shadow: 0 5px 0 #5900b3; 
}

.submit:active {
  box-shadow: none;
  transform: translateY(5px);
}

h5
{
  color:white; 
  font-family:'Roboto';
}

h6
{
  color:#f2f2f2; 
  font-family:'Roboto'; 
  font-style:italic;
}

hr.rounded {
  border-top: 8px solid #bbb;
  border-radius: 5px;
}

.sidebar{
	background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
}


</style>

</head>

<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
          <div class="sticky-top">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"><img style="height:100px; width:100px" src="images/Logo.png"></span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                          <input type="submit" name = "play" value="PLAY" class="sidebar ms-1 mb-3 d-none d-sm-inline">
                        </form>
                    </li>

                    <li>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                          <input type="submit" name = "quests" value="QUESTS" class="sidebar ms-1 mb-3 d-none d-sm-inline">
                        </form>
                    </li>
                    <li>
                        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                          <input type="submit" name = "shop" value="SHOP" class="sidebar ms-1 mb-3 d-none d-sm-inline">
                        </form>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/avatar.png" alt="hugenerd" style="height:20%; width:20%" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION["user"]["userName"]; ?> </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li>
                          <form class="dropdown-item" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                            <input type="submit" name = "settings" value="Settings" class="sidebar">
                          </form>
                        </li>
                        <li>
                          <form class="dropdown-item" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                            <input type="submit" name = "profile" value="Profile" class="sidebar">
                          </form>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                          <form class="dropdown-item" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method ="post">
                            <input type="submit" name = "signOut" value="Sign Out" class="sidebar">
                          </form>
                        </li>
                    </ul>
                  </div>
                </div>
            </div>
        </div>
        <?php
        if ($page == "play")
        {
            echo '<div class="col py-3">
                <div class="container text-center mt-3">
                <h2 class="h2 text-light">Start Game</h2>
                <form  action = "' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">
                <input name="start" type="submit" value="Start"  class="submit">
                </form>
                </div>
            </div>
            <div class="col py-3">

                <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

                <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>
                </div>
        
            </div>';
        }
        else if ($page == "quests")
        {
          echo '<div class="col py-3">
                <div class="container text-center mt-3">
                  <h2 class="h2 text-light">QUESTS</h2>
                  <div class="card border-secondary">
      
                    <div class="card-body" style="background-color:#111F23; color: white">
                      <h5 class="card-title">Summoning</h5>
                      <p class="card-text">Score a total of 100 points</p>
                      <div class="progress">
                        <div class="progress-bar" style="width:0%; background-color: #8000ff"></div>
                      </div>
                      <p class="mt-3"> <img src="images/potion.png" style="height;30px;width:30px;"> 10 </p>
     
  
                      <form  action = "' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">
                        <input name="summoning" type="submit" value="Start"  class="btn btn-primary" style="background-color: #8000ff" disabled>
                      </form>
                    
                    </div>
                  </div>
                </div>
            </div>
            <div class="col py-3">

                <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

                <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                    
                </div>
                </div>
        
            </div>';
        }
        else if ($page == "shop")
        {
          echo '<div class="col py-3">
                <div class="container text-center mt-3">
                <h2 class="h2 text-light">SHOP</h2>
                </div>
            </div>
            <div class="col py-3">

                <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

                <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>
                </div>
        
            </div>';
        }
        else if ($page == "settings")
        {
          echo '<div class="col py-3">
                <div class="container text-center mt-3">
                <h2 class="h2 text-light">SETTINGS</h2>
                <h4> Change Account Info </h4>
                <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method = "post">
                <label for="username">Username: </label>
                <input type="text" class="form-control" name="username"><br>
                <label for="password">Password: </label>
                <input type="text" class="form-control" name="password"><br>
                <label for="password1">Confirm Password: </label>
                <input type="text" class="form-control" name="password1"><br>
                
                <div class="form-floating">
                <select class="form-select" id="sel1" name="sellist">
                  <option selected disabled hidden>' . $_SESSION["user"]["difficulty"] . '
                  <option>Easy</option>
                  <option>Medium</option>
                  <option>Hard</option>
                </select>
                <label for="sel1" class="form-label">Difficulty:</label>
                </div>

                <br>

                <input type="submit" class="submit" name="changeProfile" value="CHANGE"><br>

                </form>
                </div>
            </div>

            <div class="col py-3">
                <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

                <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>
                </div>
        
            </div>';
        }
        else if ($page == "profile")
        {
          echo '<div class="col py-3">
                <div class="container text-center mt-3">
                <h2 class="h2 text-light">PROFILE</h2>
                <h3 class="mt-5">' . $_SESSION["user"]["userName"] . '</h3>
                <img src="images/avatar2.png" alt="avatar" style="height:25%; width: 25%;" class="img-fluid rounded-circle">
                <h4 class="mt-5">' . $_SESSION["user"]["fullName"] . '</h4>
                <table class="table table-dark table-hover mt-3">
                <tbody>
                  <tr>
                    <td>High Score: </td>
                    <td>' . $_SESSION["user"]["highscore"] . '</td>
                  </tr>
                  <tr>
                    <td>Total Answered Questions: </td>
                    <td>' . $_SESSION["user"]["totalAnswered"] . '</td>
                  </tr>
                  <tr>
                    <td>Total Correct Answers:</td>
                    <td>' . $_SESSION["user"]["totalCorrect"] . '</td>
                  </tr>
                  <tr>
                    <td>Total Potions:</td>
                    <td>' . $_SESSION["user"]["totalPotions"] . '</td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
            <div class="col py-3">

                <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

                <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Light card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                </div>
                </div>
        
            </div>';
        }
        ?>
    </div>
</div>





</body>

</html>
