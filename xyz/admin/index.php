<?php

include("dbConnection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;

        width: 500px;
        height: 200px;
        background-color: gray;

        position: absolute;
        top: 0;
        bottom: 10;
        left: 0;
        right: 0;

        margin: auto;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }



    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 40%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
    }
    </style>
</head>

<body>

    <h2>Login Form</h2>
    <form action="" method="post">
        <div class="imgcontainer">
            <img src="../img/logo.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>AdminName</b></label>
            <input type="text" placeholder="Enter AdminName" name="uname" required/>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required/>

            <input type="submit" name="submit" value="Login"/></button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
    </form>

<?php
if(isset($_POST['submit']))
{
	$user=$_POST['uname'];
	$pwd=$_POST['password'];
	$query="SELECT * FROM admin WHERE userid='$user' and password='$pwd'";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
	if($total==1)
	{
        session_start();
		$_SESSION['uname']=$user;
		header('location:admin.php');
	}
else {
  header("location:index.php?w=Warning : Access Denied");
}
}
?> 

</div>
</div>
</div>
    
    
</body>
</html>

