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
    <style>
    #headerWrapper {
        position: fixed;
        width: 100%;
        top: 0;
        height: whatever;
        margin-top: -10px;
    }
    .right {
  background-color: lightblue;
  float: left;
  width:80%;
  padding: 10px 15px;
  margin-top: 7px;
}
.left {
  background-color: wheat;
  float: left;
  width:80%;
  padding: 10px 15px;
  margin-top: 7px;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="headerWrapper">
        <div class="container">
            <a class="navbar-brand" href="home.php"> Confer Space</a>
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>History</span>
                            <br>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="user_ques.php">Questions</a>
                            <a class="dropdown-item" href="user_answer.php">Answers</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="notifications.php">
                            Notifications <span><?php $count?></span>
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
    <div>
        <div class="container text-center">
            <h1 class="mt-5 text-dark font-weight-dark">Confer Space</h1>

            <form method="post" action="post_ques.php">
                <div class="form-group">
                    <input type="hidden" name="uid" value="$_SESSION['$name']">
                    <textarea name="question" class="form-control" rows="3" required
                        placeholder="Ask your Quesyion?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Ask ?</button><br>
            </form>
        </div>
        <hr
            style='height:5px; border:dot; color:blue; background-color:darkblue; width:80%; text-align:center; margin: 0 auto;' />
        <div class="container mt-3">
            <h2>Resent Post</h2>
            <div class="media border p-3">
               
                <div class="media-body">
                    <p>
                        <?php
                        
                        $ques=mysql_query("SELECT *  FROM questions");
                        
                        while($q=mysql_fetch_array($ques))
                        {
                            $qid=$q['qid'];
                            print("<div class='left'>");
                            print ("<h4>".$q['userid']."&nbsp;&nbsp;&nbsp;");
                            print ("<small style='color:blue; font-size:0.13in;'><i>Posted on:".$q['date']."</i></small></h4><br/>");
                            print ("<u>Question:</u> <i style='color:darkblue;'>".$q['question']."</i><br/>");
                            print("</div>");
                            $ans=mysql_query("SELECT answer,userid FROM answers WHERE qid='$qid'");
                            while($a=mysql_fetch_row($ans)){
                                print("<div class='right'>");
                                print ("<u>Answered</u> by <b>".$a[1]."</b>: <span><i>".$a[0]."</i></span>");
                                print("</div>");
                                
                            }
                            
                            print("<div class='right'>");
                            print ("<br/></br><div class='media-body' style='width:80%' >
                                    <form method='post' action='post_answer.php?qid=$qid'>
                                        <textarea class='form-control' name='ans' row='3' placeholder='Answer here' required/></textarea>
                                        <button  class='btn btn-primary' type='submit' value='submit'>Submit</button>
                                    </form>
                                    <hr style='height:2px; border:dot; color:blue; background-color:darkblue; width:100%; text-align:center; margin: 0 auto;'/></div>");
                                    print("</div>");
                                }

                    ?>

                    </p>
                </div>
            </div>
        </div>


        <footer class="page-footer font-small teal pt-6 navbar-white bg-dark text-white" style="width:100%;">
            <div class="container-lebal text-center text-md-center" style='color:white;wieght:10%;   font-size:0.13in;'>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-6 text-left " style="margin-left:3%;" >
                        <h5 class=" font-weight-bold">Contact Us</h5>
                        <p>Email-Id's: ankitsinghmyself@gmail.com<br />sheeku7@gmail.com
                            <br> College: CMRIT, AECS LAYOUT</p>
                    </div>
                    <hr class="clearfix w-60 d-md-none pb-2">
                    <div class="col-md-5 mb-md-0 mb-6 text-right" style="margin-right:2%;">
                        <h5 class=" font-weight-bold">About Us</h5>
                        <p>This website for college discussion forum , where you can post your questions and get them
                            answered by fellow members of the college.</p>
                    </div>
                </div>
                <div class="footer-copyright text-center py-3">© 2019 Copyright:
                    <a href="https://ankitsinghprofile.wordpress.com" target="_blank"> Ankit</a> &<a
                        href="https://www.linkedin.com/in/sh33ku" target="_blank"> Sheela</a> @CMRIT
                </div>
            </div>
        </footer>
    </div>
</body>

</html>