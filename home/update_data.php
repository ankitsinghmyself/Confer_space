<?php
  session_start();
  include("../connect.php");

  $username=$_POST['username'];
 
  $email=$_POST['email'];

  mysql_select_db("confer");

  $update2="UPDATE `users` SET username = '$username' where email='$email'";
  $Data=mysql_query("$update2")or die("Not Updating".mysql_error());
if(!$Data){
    echo ("<script>alert('Error in Updated');</script>").mysql_error();
}
else{
    echo ("<script>alert('Registration Done');
    window.location.href='setting.php';
    </script>");
}
mysql_close($conn);
?>