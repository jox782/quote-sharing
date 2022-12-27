<?php
include("connection.php");
  session_start();

if(!isset($_SESSION['role']))
  {
    header('Location:login.html');
  }

if(isset($_POST['add']))
  {
    // mysqli_real_escape_string ==> elemenait special characters by putting \ before them
    $email =  mysqli_real_escape_string($con,$_SESSION['userName']);
    $name =  mysqli_real_escape_string($con,$_SESSION['name']);
    $advice = mysqli_real_escape_string($con, $_POST["advice"]);
    $insertAdvice = "INSERT INTO `advices`(`Email`,`Name`,`Advice`) VALUES ('$email','$name','$advice')";
    mysqli_query($con,$insertAdvice);
    $successMsg = "Advice Added successfully";
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style.css" />
    <title>Add Your advice</title>
  </head>
  <body>
    <header>
        <h2><a href="index.php">Advice Generator</a></h2>
      </header>
    <div class="main">
        <form method="post">
      <div class="card">
        <h1>Add Your advice</h1>
        <p class="good-msg">
        <?php
        if(isset($successMsg))
        {
          echo ($successMsg);
        }
        ?>
        </p>
        <textarea name="advice"cols="50" rows="10"></textarea>
        <input name="add" type="submit" class="btn" value="Add" />
        </form>

      </div>
    </form>
    </div>
    <script src="./main.js"></script>
  </body>
</html>