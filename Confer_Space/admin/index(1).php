<?php
$conn=mysql_connect("localhost","root","","confer");
if (!$conn) {
    die("server not connected");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Confer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    
</head>
<body>
   <?php
    include("header.html");
    include("signin.php");
    include("footer.html");

    ?>
</body>
</html>