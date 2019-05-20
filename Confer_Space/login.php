<?php
    include("connect.php");
    
      $username = mysql_real_escape_string($_POST['username']);
      $password = mysql_real_escape_string($_POST['password']); 
      
      $result = mysql_query("SELECT * FROM users WHERE userid='$username' and password='$password'")or die('Error: '.mysql_error());

$r=mysql_fetch_row($result);
if($r[0]==$username){
  session_start();
  if(isset($_SESSION['username'])){
    session_unset();
  }
  $_SESSION["username"]=$username;
  header("location:home\home.php");

}
else {
  header("location:index.php?w=Warning : Access Denied");
}
?>
