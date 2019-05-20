<?php
    include('session.php');
   	
    require('../connect.php');
    $name=$_SESSION['username'];
    $date=$_SESSION['date'];
?>
<html>

<head>
    <title>Confer Space</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jquery/jquery3.2.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">Confer Space</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-left">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="answers.php">
                            Answers
                        </a>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="../img_avatar.png" alt="logo image"
                                style="width:20px;height:18px;"><?php echo $full_name; ?>
                            <br>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="dashboard.php">Profile</a>
                            <a class="dropdown-item" href="setting.php">Setting</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        <h1 class="mt-5 text-dark font-weight-dark">Confer Space</h1>

        <form method="post" action="ques.php">
            <div class="form-group">
                <input type="hidden" name="uid" value="$_SESSION['$name']">
                <textarea name="question" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ask ?</button><br>
        </form>
    </div>
    <div class="container mt-3">
        <h2>Resent Post</h2>
        <div class="media border p-3">
            <!--<img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">-->
            <div class="media-body">
                 <p>
                    <?php
                        
                        $ques=mysql_query("SELECT *  FROM questions");
                        
                        while($q=mysql_fetch_array($ques))
                        {
                            $qid=$q['qid'];
                            
                            print ("<h4>".$q['userid']."&nbsp;&nbsp;&nbsp;");
                            print ("<small style='color:blue; font-size:0.13in;'><i>Posted on:".$q['date']."</i></small></h4><br/>");
                            print ("Question: <i>".$q['question']."</i><br/>");
                            $ans=mysql_query("SELECT answer,userid FROM answers WHERE qid='$qid'");
                            while($a=mysql_fetch_row($ans)){
                                print ("Answered by <b>".$a[1]."</b>: <i>".$a[0]."</i><br/>");
                                
                            }
                            
                            
                            print ("<br/><div class='media-body'>
                                    <form method='post' action='answer.php?qid=$qid'>
                                        <textarea class='form-control' name='ans' row='3' placeholder='Answer here' required/></textarea>
                                        <button class='btn btn-primary' type='submit' value='submit'>Submit</button>
                                    </form>
                                    </div><hr/><hr/>");
                        }

                    ?>

                </p>
            </div>
        </div>
    </div>

</body>

</html>
