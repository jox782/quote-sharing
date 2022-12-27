<?php
include("connection.php");
if(isset($_POST['register']))
{
  // mysqli_real_escape_string ==> elemenait special characters by putting \ before them
  $name =  mysqli_real_escape_string($con, $_POST["name"]);
  $email = mysqli_real_escape_string($con, $_POST["email"]);
  $password =  mysqli_real_escape_string($con, $_POST["password"]);
  $cpassword =  mysqli_real_escape_string($con, $_POST["cpassword"]);
  $insert = "INSERT INTO `users`(`Name`, `Email`, `Password`) VALUES ('$name','$email','$password')";

    if($password == $cpassword){
      
      $emailCheck = "SELECT * FROM `users` where `Email` = '$email'";
      $res = mysqli_query($con,$emailCheck);
      
      if(mysqli_num_rows($res) > 0) 
      {
          $error = "This email already exists";
      }
      else
      {
          mysqli_query($con,$insert);
          session_start();
          $_SESSION['userName'] = $email;
          // $_SESSION['role'] = $email;
          $_SESSION['name'] = $name;
          header('Location:login.html
          ');
      }
      
    }
    else
    {
      $error = "password does not match";
    }
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
    <title>Register</title>
  </head>
  <body>
    <div class="main">
      <form method="post">
        <div class="card">
          <h1>Register</h1>
          <?php
              if(isset($error)){
                echo ($error);
              }
          ?>
          <input name="name" type="text" placeholder="Name" required />
          <input name="email" type="email" placeholder="Email" required />
          <input name="password" type="password" placeholder="password" required />
          <input name="cpassword" type="password" placeholder="password" required />
          <input name="register" type="submit" class="btn" value="Register" />
          <p class="go-to">
            Already have an account? <a href="login.html">Login</a>
          </p>
        </div>
      </form>
    </div>
    <script src="./main.js"></script>
  </body>
</html>
