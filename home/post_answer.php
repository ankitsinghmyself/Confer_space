<?php
    include('session.php');
   	
    require('../connect.php');
    $name=$_SESSION['username'];
    $date=$_SESSION['date'];

    if(isset($_POST) & !empty($_POST)){
        $answer = mysql_real_escape_string($_POST['ans']);
        $qid = $_GET['qid'];
        
        $sql = "insert into answers (userid,answer,qid) values ('$name', '$answer','$qid')";
        $res = mysql_query($sql) or die(mysql_error($conn));
        if($res){
            $query = mysql_query("select question,userid from questions where qid='$qid'");
            $ques=mysql_fetch_array($query);
            $q=$ques['question'];
            $uid=$ques['userid'];
            $notif = mysql_query("insert into user_notifications (notification,userid) values ('User <b>$name</b> answered your question : <b>$q</b><br/>Answer: <b>$answer</b>','$uid')");
            echo "<script type='text/javascript'>alert('Your answer Submitted Successfully');</script>";
            header("Location:home.php");
        }else{
            
            echo "<script type='text/javascript'>alert('Failed to Submit Your answer');</script>";
        }
    
    }
?>