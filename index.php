<?php
include("connection.php");
  session_start();
  if(!isset($_SESSION['userName']))
  {
    header('Location:login.html');
  }
  $selectRandom = "SELECT Advice,Id FROM advices WHERE Status = 2 ORDER BY RAND() LIMIT 1";
  $res = mysqli_query($con,$selectRandom);
  $row = mysqli_fetch_array($res);
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
    <title>Advice Generator</title>
  </head>
  <body>

    <header>
        <h2><a href="index.php">Advice Generator</a></h2>
        <nav>
              <ul>
                <li>
                  Hello 
                  <span>
                    <?php echo($_SESSION['name']); ?>
                  <span> 
                    (<?php echo($_SESSION['role']); ?>)
                </span>
              </span>
              </li>
                <li><span><a href="addAdvice.php"> Add Advice</a></span></li>
                <li><span><a href="showAllUser.php"> My advices</a></span></li>
                <?php if($_SESSION['role'] == 'admin')
                {
                    echo('<li><span><a href="showAllAdmin.php">Dash Board</a></span></li>');
                } ?>
                <li><a href="log.php?logout=1">Logout</a></li>
              </ul>
        </nav>
      </header>

    <div class="main">
      <div class="card">
        <p class="advice">ADVICE #<span id="qId">
          <?php  echo($row['Id']); ?>
        </span></p>
        <q> <?php echo($row['Advice']); ?> </q>
        <img
          class="line-img"
          src="./images/pattern-divider-desktop.svg"
          alt=""
        />
        <a href="index.php" name="gen" type="submit" class="circle" id="bttnn">
          <img src="./images/icon-dice.svg" alt="" />
        </a>

      </div>
    </div>
    <!-- <script src="./main.js"></script> -->
  </body>
</html>
