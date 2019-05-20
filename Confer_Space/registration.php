<?php 
include('index.php');
include('connect.php');

$username=$_POST['username'];
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];

mysql_select_db("confer");
$data="insert into users(userid,name,password,email,mobile,gender) values('$username','$name','$password','$email','$mobile','$gender')";
$insertData=mysql_query("$data");
if(!$insertData){
    echo ("<script>alert('Registration fail');</script>").mysql_error();
}
else{
    echo ("<script>alert('Registration Done');
    window.location.href='index.php';
    </script>");
}
?>