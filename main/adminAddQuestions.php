<?php

require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    echo $_POST['word'] . "<br>";
    echo $_POST['c1'] . "<br>";
    echo $_POST['c2'] . "<br>";
    echo $_POST['c3'] . "<br>";
    echo $_POST['c4'] . "<br>";
    echo $_POST['correct'] . "<br>";
    echo $_POST['meaning'] . "<br>";
    echo $_POST['example'] . "<br><br><br>";

    if ($_POST["category"] == "easy")
    {
        $sql = "INSERT INTO `easy`( `easy_word`, `easy_c1`, `easy_c2`, 
        `easy_c3`, `easy_c4`, `easy_correct`, `easy_meaning`, `easy_example`) VALUES ('" . $_POST['word'] . "' , '" . $_POST['c1'] . 
        "' , '" . $_POST['c2'] . "' , '" . $_POST['c3'] . "' , '" . $_POST['c4'] .  "' , '" . $_POST['correct'] . 
        "' , '" . $_POST['meaning'] . "' , '" . $_POST['example'] . "')";
    }
    else if ($_POST["category"] == "medium")
    {
        $sql = "INSERT INTO `medium`(`medium_id`, `medium_word`, `medium_c1`, `medium_c2`, 
        `medium_c3`, `medium_c4`, `medium_correct`, `medium_meaning`, `medium_example`) VALUES ('','" . $_POST['word'] . "' , '" . $_POST['c1'] . 
        "' , '" . $_POST['c2'] . "' , '" . $_POST['c3'] . "' , '" . $_POST['c4'] . "' , '" . $_POST['correct'] . 
        "' , '" . $_POST['meaning'] . "' , '" . $_POST['example'] . "')";
    }
    else if ($_POST["category"] == "hard")
    {
        $sql = "INSERT INTO `hard`(`hard_id`, `hard_word`, `hard_c1`, `hard_c2`, 
        `hard_c3`, `hard_c4`, `hard_correct`, `hard_meaning` , `hard_example`) VALUES ('','" . $_POST['word'] . "' , '" . $_POST['c1'] . 
        "' , '" . $_POST['c2'] . "' , '" . $_POST['c3'] . "' , '" . $_POST['c4'] .  "' , '" . $_POST['correct'] . 
        "' , '" . $_POST['meaning'] . "' , '" . $_POST['example'] . "')";
    }
    
    $result = mysqli_query($conn, $sql);
}


?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>

<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

<select name="category">
    <option value="easy">easy</option>
    <option value="medium">medium</option>
    <option value="hard">hard</option>
</select>
<br>
<input type = "text" name = "word" placeholder = "word"> <br>
<input type = "text" name = "c1" placeholder = "choice 1"> <br>
<input type = "text" name = "c2" placeholder = "choice 2"> <br>
<input type = "text" name = "c3" placeholder = "choice 3"> <br>
<input type = "text" name = "c4" placeholder = "choice 4"> <br>
<select name="correct">
    <option value="c1">c1</option>
    <option value="c2">c2</option>
    <option value="c3">c3</option>
    <option value="c4">c4</option>
</select>
<br>
<textarea name="meaning" rows="4" cols="50" placeholder="meaning"></textarea>
<br>
<textarea name="example" rows="4" cols="50" placeholder="example"></textarea>
<br>
<input type = "submit" name = "submit" value = "submit"> <br>
</form>

</body>

</html>