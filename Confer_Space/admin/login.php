<?php
include("dbConnection.php");

#$ref=@$_GET['q'];
$uname = $_POST['uname'];
$password = $_POST['password'];

$result = mysql_query("SELECT uname FROM admin WHERE uname='$uname' and password='$password'")
 or die('Error: '.mysql_error($result));

$r=mysql_fetch_row($result);
if($r[0]==$uname){
  session_start();
  if(isset($_SESSION['uname'])){
    session_unset();
  }
  $_SESSION["name"]=$uname;
  header("location:admin.php");

}
else {
  header("location:index.php?w=Warning : Access Denied");
}
?>
