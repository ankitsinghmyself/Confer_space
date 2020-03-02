<?php 
include('index.php');
include('connect.php');

$username=$_POST['username'];
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];


mysqli_select_db($conn,"confer");
$data="insert into users(userid,name,password,email,mobile,gender) values('$username','$name','$password','$email','$mobile','$gender')";
$insertData=mysqli_query($conn,"$data");
if(!$insertData){
    echo ("<script>alert('Registration fail');</script>").mysqli_error();
}
else{
    mysqli_query($conn,"insert into user_notifications (notification,userid) values ('Welcome to Confer Space','$username')");
    mysqli_query($conn,"insert into admin_notifications (notification) values ('user <b>$username</b> joined Confer Space')");
    echo ("<script>alert('Registration Done');
    window.location.href='index.php';
    </script>");
}
?>
