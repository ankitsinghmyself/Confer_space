<?php
    include('session.php');
   	
    require('../connect.php');
    $name=$_SESSION['username'];
    $date=$_SESSION['date'];

    if(isset($_POST) & !empty($_POST)){
        $question = mysql_real_escape_string($_POST['question']);
        $sql = "insert into questions (userid,question) values ('$name', '$question')";
        $res = mysql_query($sql) or die(mysql_error($conn));
        if($res){
            echo "<script type='text/javascript'>alert('Your Question Submitted Successfully');</script>";
            header("Location:home.php");
        }else{
            
            echo "<script type='text/javascript'>alert('Failed to Submit Your Question');</script>";
        }
        
    }
?>