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

<div class="container mt-3">
  <h2 class="h2 text-center text-light">Image</h2>
  <img class="img-fluid w-25 h-25 mx-auto d-block" src="gamepic.jpg" alt="New York"> 
  <form>
  <div class="grid gap-3 mt-3 text-center">
    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off">
    <label class="btn btn-primary" for="option1">Checked</label>
    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
    <label class="btn btn-primary" for="option2">Checked</label>
    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
    <label class="btn btn-primary" for="option3">Checked</label>
    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
    <label class="btn btn-primary" for="option3">Checked</label>
  </div>
  <div class="text-center mt-3 mb-3">
    <button type="button" class="btn btn-outline-primary btn-lg">Full-Width Button</button>
  </div>
  </form>

  
</div>




<!-- <div>
    <button id="audioBtn">Test</button>
    <p id="word">Test</p>
</div> -->

</body>

<script>

document.getElementById("audioBtn")
.addEventListener("click", () => {

  var msg = document.getElementById("word").innerHTML;
  const utterance = new SpeechSynthesisUtterance(msg);

  utterance.pitch = 1;
  utterance.rate = 0.5;
  utterance.volume = 1;
  speechSynthesis.speak(utterance)

})

</script>


</html>
