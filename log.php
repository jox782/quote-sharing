<?php
include("connection.php");
session_start(); //must be to unset the session

if(isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['name']);
    unset($_SESSION['userName']);
    unset($_SESSION['role']);
    header('Location:login.html');
}

if(isset($_POST['log']))
{
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $password =  mysqli_real_escape_string($con, $_POST["password"]);
    $loginCheck = "SELECT * FROM `users` WHERE Email = '$email' and Password = '$password'" ;
    $res = mysqli_query($con,$loginCheck);
    $row = mysqli_fetch_array($res); //fetch all the row
    if (mysqli_num_rows($res) > 0) 
    {
        session_start();
        $_SESSION['userName'] = $email;
        $_SESSION['role'] = $row['Role'];
        $_SESSION['name'] = $row['Name'];
        header('Location:index.php');
    }
    else
    {
        header('Location:login.html');
    }

}
?>