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

body {background-image:url(https://e0.pxfuel.com/wallpapers/378/851/desktop-wallpaper-stars-purple-cosmos-space-cosmos-universe.jpg);
background-repeat: no-repeat;
background-attachment: fixed;
background-size: 100% 100%;}

</style>

</head>

<body>

<div class='container mt-3 text-center'>
<h2 class='h2 text-center text-light'>Start Game</h2>
<form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method='POST'>
<input type='submit' value='Start'  class='btn btn-outline-primary btn-lg'>
</form>
</div>

</form>

</body>

</html>
