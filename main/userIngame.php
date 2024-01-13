<?php

require 'connect.php';

session_start();

$gameOver = False;
$correct = False;
$wrong = False;

$newHighscore = "";

if (isset($_POST["tryAgain"]))
{
  $_SESSION["score"] = -1;
  unset($_SESSION["potion"]);
  header("Location: userIngame.php");
}
else if (isset($_POST["return"]))
{
  unset($_SESSION["score"]);
  unset($_SESSION["potion"]);
  unset($_SESSION["lives"]);
  header("Location: userHomePage.php");
}


if (!($_SERVER["REQUEST_METHOD"] == "POST"))
{
  if ($_SESSION["user"]["difficulty"] == "Easy")
  {
      $_SESSION["score"] = 0;
    
      $sql = "SELECT * FROM easy";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["easy_id"];
          $_SESSION["word"][$idx] = $row["easy_word"];
          $_SESSION["c1"][$idx] = $row["easy_c1"];
          $_SESSION["c2"][$idx] = $row["easy_c2"];
          $_SESSION["c3"][$idx] = $row["easy_c3"];
          $_SESSION["c4"][$idx] = $row["easy_c4"];
          $_SESSION["correct"][$idx] = $row["easy_correct"];
          $_SESSION["meaning"][$idx] = $row["easy_meaning"];
          $_SESSION["example"][$idx] = $row["easy_example"];
          $_SESSION["correct_word"][$idx] = $row["easy_correct_word"];
          $idx++;
      }
    }

      $sql = "SELECT * FROM medium ORDER BY RAND() LIMIT 10";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["medium_id"];
          $_SESSION["word"][$idx] = $row["medium_word"];
          $_SESSION["c1"][$idx] = $row["medium_c1"];
          $_SESSION["c2"][$idx] = $row["medium_c2"];
          $_SESSION["c3"][$idx] = $row["medium_c3"];
          $_SESSION["c4"][$idx] = $row["medium_c4"];
          $_SESSION["correct"][$idx] = $row["medium_correct"];
          $_SESSION["meaning"][$idx] = $row["medium_meaning"];
          $_SESSION["example"][$idx] = $row["medium_example"];
          $_SESSION["correct_word"][$idx] = $row["medium_correct_word"];
          $idx++;
      }
    }

    $sql = "SELECT * FROM hard ORDER BY RAND() LIMIT 5";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["hard_id"];
          $_SESSION["word"][$idx] = $row["hard_word"];
          $_SESSION["c1"][$idx] = $row["hard_c1"];
          $_SESSION["c2"][$idx] = $row["hard_c2"];
          $_SESSION["c3"][$idx] = $row["hard_c3"];
          $_SESSION["c4"][$idx] = $row["hard_c4"];
          $_SESSION["correct"][$idx] = $row["hard_correct"];
          $_SESSION["meaning"][$idx] = $row["hard_meaning"];
          $_SESSION["example"][$idx] = $row["hard_example"];
          $_SESSION["correct_word"][$idx] = $row["hard_correct_word"];
          $idx++;
      }
    }
      

  }
  else if ($_SESSION["user"]["difficulty"] == "Medium")
  {
    $_SESSION["score"] = 0;
    
      $sql = "SELECT * FROM medium";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["medium_id"];
          $_SESSION["word"][$idx] = $row["medium_word"];
          $_SESSION["c1"][$idx] = $row["medium_c1"];
          $_SESSION["c2"][$idx] = $row["medium_c2"];
          $_SESSION["c3"][$idx] = $row["medium_c3"];
          $_SESSION["c4"][$idx] = $row["medium_c4"];
          $_SESSION["correct"][$idx] = $row["medium_correct"];
          $_SESSION["meaning"][$idx] = $row["medium_meaning"];
          $_SESSION["example"][$idx] = $row["medium_example"];
          $_SESSION["correct_word"][$idx] = $row["medium_correct_word"];
          $idx++;
      }
    }

    $sql = "SELECT * FROM easy ORDER BY RAND() LIMIT 10";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["easy_id"];
          $_SESSION["word"][$idx] = $row["easy_word"];
          $_SESSION["c1"][$idx] = $row["easy_c1"];
          $_SESSION["c2"][$idx] = $row["easy_c2"];
          $_SESSION["c3"][$idx] = $row["easy_c3"];
          $_SESSION["c4"][$idx] = $row["easy_c4"];
          $_SESSION["correct"][$idx] = $row["easy_correct"];
          $_SESSION["meaning"][$idx] = $row["easy_meaning"];
          $_SESSION["example"][$idx] = $row["easy_example"];
          $_SESSION["correct_word"][$idx] = $row["easy_correct_word"];
          $idx++;
      }
    }

    $sql = "SELECT * FROM hard ORDER BY RAND() LIMIT 5";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["hard_id"];
          $_SESSION["word"][$idx] = $row["hard_word"];
          $_SESSION["c1"][$idx] = $row["hard_c1"];
          $_SESSION["c2"][$idx] = $row["hard_c2"];
          $_SESSION["c3"][$idx] = $row["hard_c3"];
          $_SESSION["c4"][$idx] = $row["hard_c4"];
          $_SESSION["correct"][$idx] = $row["hard_correct"];
          $_SESSION["meaning"][$idx] = $row["hard_meaning"];
          $_SESSION["example"][$idx] = $row["hard_example"];
          $_SESSION["correct_word"][$idx] = $row["hard_correct_word"];
          $idx++;
      }
    }
  }
  else if ($_SESSION["user"]["difficulty"] == "Hard")
  {
    $_SESSION["score"] = 0;
    
      $sql = "SELECT * FROM hard";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["hard_id"];
          $_SESSION["word"][$idx] = $row["hard_word"];
          $_SESSION["c1"][$idx] = $row["hard_c1"];
          $_SESSION["c2"][$idx] = $row["hard_c2"];
          $_SESSION["c3"][$idx] = $row["hard_c3"];
          $_SESSION["c4"][$idx] = $row["hard_c4"];
          $_SESSION["correct"][$idx] = $row["hard_correct"];
          $_SESSION["meaning"][$idx] = $row["hard_meaning"];
          $_SESSION["example"][$idx] = $row["hard_example"];
          $_SESSION["correct_word"][$idx] = $row["hard_correct_word"];
          $idx++;
      }
    }
  

  $sql = "SELECT * FROM medium ORDER BY RAND() LIMIT 10";
      $result = mysqli_query($conn, $sql);
    
      if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["medium_id"];
          $_SESSION["word"][$idx] = $row["medium_word"];
          $_SESSION["c1"][$idx] = $row["medium_c1"];
          $_SESSION["c2"][$idx] = $row["medium_c2"];
          $_SESSION["c3"][$idx] = $row["medium_c3"];
          $_SESSION["c4"][$idx] = $row["medium_c4"];
          $_SESSION["correct"][$idx] = $row["medium_correct"];
          $_SESSION["meaning"][$idx] = $row["medium_meaning"];
          $_SESSION["example"][$idx] = $row["medium_example"];
          $_SESSION["correct_word"][$idx] = $row["medium_correct_word"];
          $idx++;
      }
    }

  $sql = "SELECT * FROM easy ORDER BY RAND() LIMIT 5";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $idx = 0;
      while($row = $result -> fetch_assoc()) 
      {
          $_SESSION["id"][$idx] = $row["easy_id"];
          $_SESSION["word"][$idx] = $row["easy_word"];
          $_SESSION["c1"][$idx] = $row["easy_c1"];
          $_SESSION["c2"][$idx] = $row["easy_c2"];
          $_SESSION["c3"][$idx] = $row["easy_c3"];
          $_SESSION["c4"][$idx] = $row["easy_c4"];
          $_SESSION["correct"][$idx] = $row["easy_correct"];
          $_SESSION["meaning"][$idx] = $row["easy_meaning"];
          $_SESSION["example"][$idx] = $row["easy_example"];
          $_SESSION["correct_word"][$idx] = $row["easy_correct_word"];
          $idx++;
      }
    }
  }
}


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $_SESSION["questions"]++;

  if ($_POST["choice"] == $_SESSION["correct"][$_POST["randomWord"]])
  {
    $_SESSION["score"]++;
    $correct = True;
    if (($_SESSION["score"] % 5) == 0 && !($_SESSION["score"] == 0) )
    {
      $_SESSION["potion"]++;
    }
  }
  else
  {
    $_SESSION["lives"]--;
    $wrong = True;
    if ($_SESSION["lives"] == 0)
    {

      if ($_SESSION["score"] > $_SESSION["user"]["highscore"])
      {
        $_SESSION["user"]["highscore"] = $_SESSION["score"];

        $sql = 'UPDATE users SET highscore = "' . $_SESSION["user"]["highscore"]. '" WHERE user_id = ' 
        . $_SESSION["user"]["user_id"];
        $result = mysqli_query($conn, $sql);

        $newHighscore = "New Highscore!";

      }

      $_SESSION["user"]["potions"] += $_SESSION["potion"];
      $_SESSION["user"]["totalPotions"] += $_SESSION["potion"];
      $_SESSION["user"]["totalAnswered"] += $_SESSION["questions"];
      $_SESSION["user"]["totalCorrect"] += $_SESSION["score"];

      $sql = 'UPDATE users SET potions = ' . $_SESSION["user"]["potions"] . ',
      highscore = ' . $_SESSION["user"]["potions"] . ', totalPotions = ' . $_SESSION["user"]["totalPotions"] . '
      , totalCorrect = ' . $_SESSION["user"]["totalCorrect"] . ' , totalAnswered = ' . $_SESSION["user"]["totalAnswered"] . '
      WHERE user_id = ' . $_SESSION["user"]["user_id"];
      $result = mysqli_query($conn, $sql);
      
      $gameOver = True;
    }
      
  }


  $correctWord = $_SESSION["correct_word"][$_POST["randomWord"]];

  unset($_SESSION["id"][$_POST["randomWord"]]);
  unset($_SESSION["word"][$_POST["randomWord"]]);
  unset($_SESSION["c1"][$_POST["randomWord"]]);
  unset($_SESSION["c2"][$_POST["randomWord"]]);
  unset($_SESSION["c3"][$_POST["randomWord"]]);
  unset($_SESSION["c4"][$_POST["randomWord"]]);
  unset($_SESSION["correct"][$_POST["randomWord"]]);
  unset($_SESSION["meaning"][$_POST["randomWord"]]);
  unset($_SESSION["example"][$_POST["randomWord"]]);
  unset($_SESSION["correct_word"][$_POST["randomWord"]]);

  $_SESSION["id"] = array_values($_SESSION["id"]);
  $_SESSION["word"] = array_values($_SESSION["word"]);
  $_SESSION["c1"] = array_values($_SESSION["c1"]);
  $_SESSION["c2"] = array_values($_SESSION["c2"]);
  $_SESSION["c3"] = array_values($_SESSION["c3"]);
  $_SESSION["c4"] = array_values($_SESSION["c4"]);
  $_SESSION["correct"] = array_values($_SESSION["correct"]);
  $_SESSION["meaning"] = array_values($_SESSION["meaning"]);
  $_SESSION["example"] = array_values($_SESSION["example"]);
  $_SESSION["correct_word"] = array_values($_SESSION["correct_word"]);


   
}

if (empty($_SESSION["score"]))
{
  $_SESSION["score"] = 0;
}


if (empty($_SESSION["lives"]))
{
  $_SESSION["lives"] = 3;
}

if (empty($_SESSION["potion"]))
{
  $_SESSION["potion"] = 0;
}

if (empty($_SESSION["questions"]))
{
  $_SESSION["questions"] = 0;
}


$randomWord = rand(0, count($_SESSION["id"]) - 1);

?>


<!DOCTYPE html>
<html>

<head>
<title>SpeakWiz</title>
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
  filter: brightness(1.5);
  -webkit-filter: brightness(1.5);
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

.submit:hover{
  filter: brightness(1.5);
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
  border-top: 8px solid white;
  border-radius: 5px;
}

</style>

</head>

<body>



<?php
if (!($gameOver))
{


// Offcanvas

if ($wrong)
{
echo '<div class="offcanvas show offcanvas-bottom h-auto" style="background-color: #111F23; color: white" data-bs-scroll="true" tabindex="-1" id="demo">
  <div class="offcanvas-header">
    <h4 class="offcanvas-title" style="color:#FF464E;"><img style="height:50px; width: 50px;" src="images/cross.png"> Incorrect</h1>
  </div>
  <div style="color:#FF464E" class="offcanvas-body">
    <p style="color:#FF464E" >Correct Answer:</p>
    <p>' . $correctWord . '</p> 
    <button style="background-color: #FF464E; box-shadow: 0 5px 0 #EA3741;"class="submit" data-bs-dismiss="offcanvas" type="button">GOT IT</button>
  </div>
</div>';
}

// Modal

echo '<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header border-0 text-center" style="background-color: #4B4B4B; color:white; ">
        <h4 class="modal-title w-100">PAUSE</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      
      <div class="modal-body border-0 text-center" style="background-color: #4B4B4B; color:white">
      <button class="submit" type="button" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#sure">RETURN TO MAIN MENU</button>
      </div>

      <div class="modal-footer border-0" style="background-color: #4B4B4B; color:white; ">
      
      </div>


    </div>
  </div>
</div>';

echo '<div class="modal fade" id="sure">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header border-0 text-center" style="background-color: #4B4B4B; color:white; ">
        <h4 class="modal-title w-100">ARE YOU SURE?</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body border-0 text-center" style="background-color: #4B4B4B; color:white">
      <p> Run will not be saved </p>
      <form action = "' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST">
      <input type="submit" name="return" value="YES" class="submit w-50">
      </form>
      <button type="button" class="submit w-50 mt-3" data-bs-dismiss="modal">GO BACK</button>
      </div>

      <div class="modal-footer border-0" style="background-color: #4B4B4B; color:white; ">
      
      </div>


    </div>
  </div>
</div>';

// Navbar


echo '<nav class="navbar sticky-top" style="background-color:#8000ff;">
  <div class="container-fluid">';

    echo "<div class='navbar-brand'> <p style='color:white'><img style='height:60px' src='images/star.gif'>" . $_SESSION["score"] . "</p></div>"; 
    echo "<div class='nav-brand'> <p style='color:white'><img style='height:60px' src='images/heart.gif'>" . $_SESSION["lives"] . "</p></div>";
    echo '<button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
      <span class="navbar-toggler-icon" style="height:60px"></span>
    </button>
    
  </div>
</nav>';





echo "<div class='container-fluid mt-3 '>";

  echo "<div class='mt-5'>";
  echo "<h2 class='text-center' style='color:white;'>" . $_SESSION["word"][$randomWord] . "</h2>";
  echo "</div>";
  echo "<h5 class='text-center' > - " . $_SESSION["meaning"][$randomWord] . "</h5>";
  echo "<h6 class='text-center' >\"" . $_SESSION["example"][$randomWord] . "\"</h6>";
  echo "<hr class='rounded mt-5'>";

  echo "<div class='mt-5'>";
  echo "<form action = '" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
    
  echo "<div class='row'>";
    echo "<div class='col-md mt-1'>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c1' id='choice1' autocomplete='off'>";
    echo "<label class='button-19' role='button' id = 'label1' for='choice1'>" . $_SESSION["c1"][$randomWord] . "</label>";
    echo "</div>";

    echo "<div class='col-md mt-1'>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c2' id='choice2' autocomplete='off'>";
    echo "<label class='button-19' role='button' id = 'label2' for='choice2'>" . $_SESSION["c2"][$randomWord] . "</label>";
    echo "</div>";

    echo "</div>";

    echo "<div class='row'>"; 

    echo "<div class='col-md mt-1'>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c3' id='choice3' autocomplete='off'>";
    echo "<label class='button-19' role='button' id = 'label3' for='choice3'>" . $_SESSION["c3"][$randomWord] . "</label>";
    echo "</div>";
    
    echo "<div class='col-md mt-1'>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c4' id='choice4' autocomplete='off'>";
    echo "<label class='button-19' role='button' id = 'label4' for='choice4'>" . $_SESSION["c4"][$randomWord] . "</label>";
    echo "</div>";

    echo "</div>";
    


    echo "<input type='hidden' name='randomWord' value='" . $randomWord . "'>";


  echo "<div class='text-center mt-3 mb-3'>";
  echo "<input type='submit' value='Check' id='submit' class='submit' role='button' disabled>";
  echo "</div>";
  echo "</div>";


  echo "</form>";

  
echo "</div>";

}
else
{
  echo "<div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>";
  echo "<h2 class='h2 text-center text-light'> Game over</h2>";
  echo "<h3 class='h3 text-center text-light'> " . $newHighscore . "</h3>" ;
  echo "<div class='text-center'> <p style='color:white'><img style='width:10%; height:15%;' src='images/star.gif'>" . $_SESSION["score"] . "</p></div>";
  echo '<h3 class="text-center mt-3 mb-4" style="color:white"> <img src="images/potion.png"  style="height;50px;width:50px;">' . $_SESSION["potion"] . '</h3>';
  echo "<form action = '" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST' class='text-center'>";
  echo "<input type='submit' name='tryAgain' value='Try Again' id='submit' class='submit' role='button'><br>";
  echo "<input type='submit' name='return' value='Return to Main Menu' id='submit' class='submit mt-3' role='button'>";
  echo "</form>";
  echo "</div>";
}
?>


<!-- Audio -->

<audio id="correct" src="audio/correct2.mp3"></audio>
<audio id="wrong" src="audio/wrong2.mp3"></audio>

<?php

if ($correct)
{
  echo '<script>';
  echo 'var audio = document.getElementById("correct");';
  echo 'audio.play();';
  echo '</script>';
}
else  if ($wrong)
{
  echo '<script>';
  echo 'var audio = document.getElementById("wrong");';
  echo 'audio.play();';
  echo '</script>';
}

?>
</body>

<script type="text/javascript">




function enableSubmit()
{
  document.getElementById("submit").disabled = false;
}

// Audio 
document.getElementById("choice1")
.addEventListener("click", ()=>{
  var msg = document.getElementById("label1").textContent;
  const utterance = new SpeechSynthesisUtterance(msg);
  speechSynthesis.speak(utterance);
;
})

document.getElementById("choice2")
.addEventListener("click", ()=>{
  var msg = document.getElementById("label2").textContent;
  const utterance = new SpeechSynthesisUtterance(msg);
  speechSynthesis.speak(utterance);
})

document.getElementById("choice3")
.addEventListener("click", ()=>{
  var msg = document.getElementById("label3").textContent;
  const utterance = new SpeechSynthesisUtterance(msg);
  speechSynthesis.speak(utterance);
})

document.getElementById("choice4")
.addEventListener("click", ()=>{
  var msg = document.getElementById("label4").textContent;
  const utterance = new SpeechSynthesisUtterance(msg);
  speechSynthesis.speak(utterance);
})






</script>


</html>
