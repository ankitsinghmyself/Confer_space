<?php
session_start();
include('dbConnection.php');
$user=$_SESSION['uname'];
if($user==true)
{}
else
{
  header('location:index.php');
}

$query="SELECT * FROM users";

?>