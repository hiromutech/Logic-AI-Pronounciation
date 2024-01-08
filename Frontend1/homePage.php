<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    header("Location: ingameReal.php");
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
font-family: "Quicksand";}





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

</style>

</head>

<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline"><img style="height:100px; width:100px" src="images/Logo.png">Speakwiz</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">START</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">QUESTS</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">SHOP</span> </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="images/avatar.png" alt="hugenerd" style="height:70px; width:50px" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">User</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col py-3">
            <div class='container text-center mt-3'>
            <h2 class='h2 text-light'>Start Game</h2>
            <form  action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method='POST'>
            <input type='submit' value='Start'  class='submit'>
            </form>
            </div>
        </div>
        <div class="col py-3">

            <h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">3 </h3>

            <div class="card border-secondary mb-3" style="background-color:#111F23; color: white">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Light card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            </div>
        </div>
    </div>
</div>





</body>

</html>
