<?php
  session_start();
  include("../connect.php");

  $mobile=$_POST['mobile'];
  $email=$_SESSION['email'];

  mysql_select_db("confer");

  $update2="update `users` SET `mobile` = '$mobile' where `email`='$email'";
  $Data=mysql_query("$update2")or die("Not Updating".mysql_error());
if(!$Data){
    echo ("<script>alert('Error in Updated');</script>").mysql_error();
}
else{
    echo ("<script>alert('Mobile Number Updated');
    window.location.href='setting.php';
    </script>");
}
mysql_close($conn);
?>