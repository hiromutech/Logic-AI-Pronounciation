<?php

require 'connect.php';

session_start();

$gameOver = False;


if (isset($_POST["tryAgain"]))
{
  $_SESSION["score"] = -1;
  header("Location: ingameReal.php");
}


if (!($_SERVER["REQUEST_METHOD"] == "POST"))
{

  
  $sql = "SELECT * FROM medium";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  $idx = 0;
  while($row = $result -> fetch_assoc()) 
  {
      $_SESSION["medium_id"][$idx] = $row["medium_id"];
      $_SESSION["medium_word"][$idx] = $row["medium_word"];
      $_SESSION["medium_c1"][$idx] = $row["medium_c1"];
      $_SESSION["medium_c2"][$idx] = $row["medium_c2"];
      $_SESSION["medium_c3"][$idx] = $row["medium_c3"];
      $_SESSION["medium_c4"][$idx] = $row["medium_c4"];
      $_SESSION["medium_correct"][$idx] = $row["medium_correct"];
      $_SESSION["medium_img"][$idx] = $row["medium_img"];
      $idx++;
  }
}



}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if ($_POST["choice"] == $_SESSION["medium_correct"][$_POST["randomWord"]])
  {
    $_SESSION["score"]++;
  }
  else
  {
    $_SESSION["lives"]--;
    if ($_SESSION["lives"] == 0)
    {
      $gameOver = True;
    }
  }

  unset($_SESSION["medium_id"][$_POST["randomWord"]]);
  unset($_SESSION["medium_word"][$_POST["randomWord"]]);
  unset($_SESSION["medium_c1"][$_POST["randomWord"]]);
  unset($_SESSION["medium_c2"][$_POST["randomWord"]]);
  unset($_SESSION["medium_c3"][$_POST["randomWord"]]);
  unset($_SESSION["medium_c4"][$_POST["randomWord"]]);
  unset($_SESSION["medium_correct"][$_POST["randomWord"]]);
  unset($_SESSION["medium_img"][$_POST["randomWord"]]);

  $_SESSION["medium_id"] = array_values($_SESSION["medium_id"]);
  $_SESSION["medium_word"] = array_values($_SESSION["medium_word"]);
  $_SESSION["medium_c1"] = array_values($_SESSION["medium_c1"]);
  $_SESSION["medium_c2"] = array_values($_SESSION["medium_c2"]);
  $_SESSION["medium_c3"] = array_values($_SESSION["medium_c3"]);
  $_SESSION["medium_c4"] = array_values($_SESSION["medium_c4"]);
  $_SESSION["medium_correct"] = array_values($_SESSION["medium_correct"]);
  $_SESSION["medium_img"] = array_values($_SESSION["medium_img"]);

   
}

if (empty($_SESSION["score"]))
{
  $_SESSION["score"] = 0;
}
else
{
  echo "Score: " . $_SESSION["score"] . "<br>";
}

if (empty($_SESSION["lives"]))
{
  $_SESSION["lives"] = 3;
}
else
{
  echo "Lives: " . $_SESSION["lives"] . "<br>";
}

$randomWord = rand(0, count($_SESSION["medium_id"]) - 1);

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

body {background-image:url(https://e0.pxfuel.com/wallpapers/378/851/desktop-wallpaper-stars-purple-cosmos-space-cosmos-universe.jpg);
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;}

</style>

</head>

<body>

<?php
if (!($gameOver))
{
echo "<div class='container mt-3'>";
  echo "<h2 class='h2 text-center text-light'>" . $_SESSION["medium_word"][$randomWord] . "</h2>";
  echo "<img class='img-fluid w-25 h-25 mx-auto d-block' src='" . $_SESSION["medium_img"][$randomWord] . "' alt='New York'>"; 
  echo "<form action = '" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
  echo "<div class='grid gap-3 mt-3 text-center'>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c1' id='choice1' autocomplete='off'>";
    echo "<label class='btn btn-primary' id = 'label1' for='choice1'>" . $_SESSION["medium_c1"][$randomWord] . "</label>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c2' id='choice2' autocomplete='off'>";
    echo "<label class='btn btn-primary' id = 'label2' for='choice2'>" . $_SESSION["medium_c2"][$randomWord] . "</label>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c3' id='choice3' autocomplete='off'>";
    echo "<label class='btn btn-primary' id = 'label3' for='choice3'>" . $_SESSION["medium_c3"][$randomWord] . "</label>";
    echo "<input type='radio' onclick='enableSubmit()' class='btn-check' name='choice' value='c4' id='choice4' autocomplete='off'>";
    echo "<label class='btn btn-primary' id = 'label4' for='choice4'>" . $_SESSION["medium_c4"][$randomWord] . "</label>";

    echo "<input type='hidden' name='randomWord' value='" . $randomWord . "'>";
  echo "</div>";
  echo "<div class='text-center mt-3 mb-3'>";
    echo "<input type='submit' value='Submit' id='submit' class='btn btn-outline-primary btn-lg' disabled>";

  echo "</div>";
  echo "</form>";

  
echo "</div>";
}
else
{
  echo "<div class='container mt-3 text-center'>";
  echo "<h2 class='h2 text-center text-light'> Game over</h2>";
  echo "<form action = '" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='POST'>";
  // echo "<input type='submit' name='tryAgain' value='Try Again' id='tryAgain' class='btn btn-outline-primary btn-lg'>";
  echo "<input type='submit' name='tryAgain' value='Try Again' id='submit' class='btn btn-outline-primary btn-lg'>";
  echo "<input type='submit' name='return' value='Return to Main Menu' id='submit' class='btn btn-outline-primary btn-lg'>";
  echo "</form>";
  echo "</div>";
}
?>



</body>

<script>
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
