<?php
include('connection.php');
session_start();
$id = $_GET['id'];
$status = $_GET['sta'];
$q = "UPDATE `advices` SET `Status`= $status WHERE Id = $id";
mysqli_query($con,$q);
header('Location:showAllAdmin.php');
?>