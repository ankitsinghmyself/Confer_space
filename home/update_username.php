<?php
  session_start();
  include("../connect.php");
  $username=$_POST['username'];
  $email=$_SESSION['email'];

  mysql_select_db("confer");

  $update2="update `users` SET `userid` = '$username' where `email`='$email'";
  $Data=mysql_query("$update2")or die("Not Updating".mysql_error());
if(!$Data){
    echo ("<script>alert('Error in Updated');</script>").mysql_error();
}
else{
    echo ("<script>alert('Please Login Again!');
    window.location.href='../index.php';
    </script>");
}
mysql_close($conn);
?>