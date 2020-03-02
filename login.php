<?php
    include("connect.php");
    
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $result = mysqli_query($conn,"SELECT * FROM users WHERE userid='$username' and password='$password'")or die('Error: '.mysql_error());

$r=mysqli_fetch_row($result);
if($r[0]==$username){
  session_start();
  if(isset($_SESSION['username'])){
    session_unset();
  }
  $_SESSION["username"]=$username;
  
					
					$posts = array();
					
					
					  $title=utf8_encode($r[1]); 
					 

					  $posts[] = array('name'=> $title);
					

					
					$fp = fopen('../results.json', 'w');
					fwrite($fp, json_encode($posts));
					fclose($fp);
header("location:home\home.php");
}
else {
  header("location:index.php?w=Warning : Access Denied");
}
?>
