<?php
  session_start();
  require('../connect.php');

  $mobile=$_POST['mobile'];
  $email=$_SESSION['email'];

  mysqli_select_db($conn,"confer");

  $update2="update `users` SET `mobile` = '$mobile' where `email`='$email'";
  $Data=mysqli_query($conn,"$update2")or die("Not Updating".mysql_error());
if(!$Data){
    echo ("<script>alert('Error in Updated');</script>").mysql_error();
}
else{
    echo ("<script>alert('Mobile Number Updated');
    window.location.href='setting.php';
    </script>");
}
mysqli_close($conn);
?>