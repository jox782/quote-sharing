<?php
include("connection.php");
  session_start();
  if($_SESSION['role'] != 'admin')
  {
    header('Location:login.html');
  }

  $selectAdvices = "SELECT * FROM `advices` WHERE Status = 1";
  $res = mysqli_query($con,$selectAdvices);
  
?>
<?php 
        if(isset($_POST['searchBtn'])) 
        {
            $searchName= $_POST['search'];
        
            $myquery = "SELECT * FROM `advices` where Name like '%$searchName%'";
            $res = mysqli_query($con, $myquery); 
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
    <link rel="stylesheet" href="./tableStyle.css" />
    <title>Dash Board</title>
  </head>
  <body>  
    <header>
        <h2><a href="index.php">Advice Generator</a></h2>
        <form method="post">
        <input type="text" name="search" placeholder="Search BY Name">
        <input type="submit" name="searchBtn" value="Search">
      </form>
      </header>
    
      <h1>Dash Board</h1>
        <div class="outputs">
        <table>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Advice</th>
            <th>Status</th>
            <th >Accept</th>
            <th>Deny</th>
          
          </tr>
          <tbody id="tbody">
            <?php
                while($row = mysqli_fetch_array($res))
                {
              ?> 

            <tr>
              <td><?php echo($row['Id']) ?></td>
              <td><?php echo($row['Name']) ?></td>
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
              <td><a href="adm.php?id=<?php echo($row['Id']) ?>&sta=2" id="update">Accept</a></td>
              <td><a href="adm.php?id=<?php echo($row['Id']) ?>&sta=0" id="delete">Deny</a></td>
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