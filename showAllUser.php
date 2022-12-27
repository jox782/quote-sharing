<?php
include("connection.php");
  session_start();
  if(!isset($_SESSION['role']))
  {
    header('Location:login.html');
  }
  $email = $_SESSION['userName'];
  $selectAdvices = "SELECT * FROM `advices` WHERE Email = '$email'";
  $res = mysqli_query($con,$selectAdvices);
  
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
    <link rel="stylesheet" href="./tableStyle.css" />
    <title>Show All Advices</title>
  </head>
  <body>
        <header>
        <h2><a href="index.php">Advice Generator</a></h2>
      </header>
        <div class="outputs">
        <table>
          <tr>
            <th>Id</th>
            <th>Advice</th>
            <th>Status</th>
          </tr>
          <tbody id="tbody">
            <?php
                while($row = mysqli_fetch_array($res))
                {
              ?> 

            <tr>
              <td><?php echo($row['Id']) ?></td>
              <td><?php echo($row['Advice']) ?></td>
              <td><?php 
                if($row['Status'] == 1)
                {
                  echo("pending");
                }else if($row['Status'] == 2)
                {
                  echo("Accepted");
                }
                else if($row['Status'] == 0)
                {
                  echo("Denied");
                }
              ?></td>
            <?php 
            }
            ?>
            </tr>
          </tbody>
        </table>
      </div>

      
    </form>
    </div>
    <script src="./main.js"></script>
  </body>
</html>