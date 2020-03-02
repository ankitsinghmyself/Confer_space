<?php
session_start();
include("dbConnection.php");
$user=$_SESSION['uname'];
if($user==true)
{}
else
{
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>
<body>
    <?php
    include("header.html");
    
    ?>
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
        <a class="nav-link" href="admin.php?q=1">
          <i class="fa fa-home"></i>
          Admin
          <span class="sr-only">(current)</span>
          </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="admin.php?q=2">
          <i class="fa fa-envelope-o">
          </i>
          Users
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php?q=3">
          <i class="fa fa-envelope-o">
            
          </i>
          Questions
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php?q=4">
          <i class="fa fa-envelope-o">
            
          </i>
          Answers
        </a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="generate_pdf.php" target='_blank'>
          <i class="fa fa-envelope-o">
            
          </i>
          Report
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php?q=6">
          <i class="fa fa-envelope-o">
          
          </i>
          <?php
          $q="SELECT count(*) FROM admin_notifications";
          $d=mysqli_query($conn,$q);
          $notif_count=mysqli_fetch_row($d);
          ?>
          Notifications<b><i><span style='background-color:grey;color:white;'><?php echo"$notif_count[0]";?></span></i></b>
        </a>
      </li>

     
    </ul> 
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form -->
    <ul class="navbar-nav ">
     
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fa fa-envelope-o">
          </i>
          Logout
        </a>
      </li>
    </ul>
    
  </div>
</nav>
    
    
    <?php
      $q1="SELECT count(*) FROM admin";
      $q2="SELECT count(*) FROM users";
      $q3="SELECT count(*) FROM questions";
     
      $d1=mysqli_query($conn,$q1);
      $d2=mysqli_query($conn,$q2);
      $d3=mysqli_query($conn,$q3);
      
      $admin_count=mysqli_fetch_row($d1);
      $users_count=mysqli_fetch_row($d2);
      $ques_count=mysqli_fetch_row($d3);
      
      echo "<p></p><table border='1' align='center'><tr><th>TOTAL ADMINS</th><th>TOTAL USERS</th><th>TOTAL QUESTIONS POSTED</th></tr>";
      echo "<tr>
                    <td align='center'>".$admin_count[0]."</td>
                    <td align='center'>".$users_count[0]."</td>        
                    <td align='center'>".$ques_count[0]."</td>
                    
              </tr></table><p></p>";
    ?>

    <!-- admin start -->
    <?php if(@$_GET['q']==1) {
        echo "<p></p>";
        $query="SELECT * FROM admin";
      $data=mysqli_query($conn,$query);
      echo "<table border='1' align='center'><tr><th>USER ID</th><th>PASSWORD</th><th>DELETE</th></tr>";
      while($row=mysqli_fetch_array($data)) {
        echo "<tr>
                    <td>".$row['userid']."</td>
                    <td>".$row['password']."</td>
                    
                    
                    <td>
                        <a href='admin.php?q=admin_delete&userid=".$row['userid']."'>Delete</a>
                    </td>
              </tr>";
      }
      echo "</table>";

    }
    
    ?>

    <!-- admin_delete -->
    <?php if(@$_GET['q']=='admin_delete'){
      $userid=$_REQUEST['userid'];
      $query="DELETE FROM admin where userid='$userid'"; 
    if(mysqli_query($conn,$query))
    {
      echo "<script type='text/javascript'>alert('Admin Deleted');</script>";
    }
    else
      echo "error";
    }
          
    ?>

    <!-- users start -->
    <?php if(@$_GET['q']==2) {
      echo "<p></p>";

      $query="SELECT * FROM users";
      $data=mysqli_query($conn,$query);
      echo "<table border='1' align='center'><tr><th>USER ID</th><th>NAME</th><th>PASSWORD</th><th>EMAIL</th><th>MOBILE</th><th>GENDER</th><th>EDIT</th><th>DELETE</th></tr>";
      while($row=mysqli_fetch_array($data)) {
        echo "<tr>
                    <td>".$row['userid']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['mobile']."</td>
                    <td>".$row['gender']."</td>
                    <td>
                        <a href='admin.php?q=user_edit&userid=".$row[0]."&name=".$row[1]."%20&password=".$row[2]."%20&email=".$row[3]."%20&mobile=".$row[4]."%20&gender=".$row[5]."%20'>Edit</a>
                    </td>
                    <td>
                        <a href='admin.php?q=user_delete&userid=".$row['userid']."'>Delete</a>
                    </td>
              </tr>";
      }
      echo "</table>";

    }
    ?>

    <!-- user_edit (html form) -->
    <?php if(@$_GET['q']=='user_edit')
          {
            $userid=$_REQUEST['userid'];
            $name=$_REQUEST['name'];
            $password=$_REQUEST['password'];
            $email=$_REQUEST['email'];
            $mobile=$_REQUEST['mobile'];
            $gender=$_REQUEST['gender'];
            
            echo "<form action='admin.php?q=user_update&userid=$userid' method='post' align='center'>
                  Name <input type='text' name='name' value=".$name."/><br/>
                  Password <input type='text' name='password' value=".$password."/><br/>
                  Email <input type='text' name='email' value=".$email."/><br/>
                  Mobile <input type='text' name='mobile' value=".$mobile."/><br/>
                  Gender <input type='text' name='gender' value=".$gender."/><br/>
                  <input type='submit' value='submit'/> &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href='admin.php?q=2'><input type='button' value='cancel'/></a>
                  </form>";
          }

    ?>
    <!-- user_update -->
    <?php if(@$_GET['q']=='user_update')
          {
            $userid=$_REQUEST['userid'];
            $name=$_POST['name'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $gender=$_POST['gender'];
            $query="UPDATE users SET name='$name',password='$password',email='$email',mobile='$mobile' where userid='$userid'";
            if(mysqli_query($conn,$query))
            {
              echo "<script type='text/javascript'>alert('Information Updated');</script>";
            }
            else
              echo "not updated";
            
          }
     ?>

     <!-- user_delete -->
    <?php if(@$_GET['q']=='user_delete'){
      $userid=$_REQUEST['userid'];
      
      $result=mysqli_query($conn,"SELECT qid from questions where userid='$userid'");
      $qid=mysqli_fetch_row($result);
      $qid=$qid[0];
      $query1="DELETE FROM questions where userid='$userid'";
      $query2="DELETE FROM answers where qid='$qid'";
      $query5="DELETE FROM answers where userid='$userid'";
      $query3="DELETE FROM user_notifications where userid='$userid'";
      $query4="DELETE FROM users where userid='$userid'"; 
      
     
      mysqli_query($conn,$query1)?print"<script type='text/javascript'>alert('question Deleted');</script>":print "<script type='text/javascript'>alert('error in deleting question');</script>";
      mysqli_query($conn,$query2)?print"<script type='text/javascript'>alert('answer Deleted');</script>":print "<script type='text/javascript'>alert('error in deleting answer');</script>";
      mysqli_query($conn,$query5)?print"<script type='text/javascript'>alert('answer Deleted');</script>":print "<script type='text/javascript'>alert('error in deleting answer');</script>";
      mysqli_query($conn,$query3)?print"<script type='text/javascript'>alert('notifications Deleted');</script>":print "<script type='text/javascript'>alert('error in deleting notification');</script>";
      mysqli_query($conn,$query4)?print"<script type='text/javascript'>alert('User Deleted');</script>":print "<script type='text/javascript'>alert('error in deleting user');</script>";
        
      
    }
          
    ?>

    <!-- questions start -->
    <?php if(@$_GET['q']==3) {
      echo "<p></p>";
      $query="SELECT * FROM questions order by `date` desc";
      $data=mysqli_query($conn,$query);
      echo "<table border='1' align='center'><tr><th>QUESTION ID</th><th>QUESTION</th><th>USER ID</th><th>DELETE</th></tr>";
      while($row=mysqli_fetch_array($data)) {
        echo "<tr><td>".$row['qid']."</td><td>".$row['question']."</td><td>".$row['userid']."</td>
                  <td><a href='admin.php?q=ques_delete&qid=".$row['qid']."'>Delete</a></td>
              </tr>";
      }
      echo "</table>";
    }

    ?>

    <!-- ques_delete -->
    <?php 
      if(@$_GET['q']=='ques_delete')
      {
        $qid=$_REQUEST['qid'];
        $query1="DELETE FROM answers where qid='$qid'"; 
         
        if(mysqli_query($conn,$query1))
        {
          $query2="DELETE FROM questions where qid='$qid'";
          mysqli_query($conn,$query2)?print"<script type='text/javascript'>alert('Question Deleted');</script>":print "error in deleting question";
          
        }
        else
          echo "<script type='text/javascript'>alert('error in deleting answers for the question');</script>";
      }
    
    ?>




    <!-- answers start -->
    <?php if(@$_GET['q']==4) {
      echo "<p></p>";
      $query="SELECT * FROM answers order by qid";
      $data=mysqli_query($conn,$query);
      
      echo "<table border='1' align='center'><tr><th>ANSWER ID</th><th>ANSWER</th><th>QUESTION ID</th><th>USER ID</th><th>DELETE</th></tr>";
      while($row=mysqli_fetch_array($data)) {
        $qid=$row['qid'];
        $query1="SELECT question FROM questions WHERE qid='$qid'";
        $data1=mysqli_query($conn,$query1);
        $row1=mysqli_fetch_row($data1);
        echo "<tr><td>".$row['aid']."</td><td>".$row['answer']."</td><td>".$row1[0]."</td><td>".$row['userid']."</td>
                  <td><a href='admin.php?q=ans_delete&aid=".$row['aid']."'>Delete</a></td>
              </tr>";
      }
      echo "</table>";
    }

    ?>

    <!-- ans_delete -->
    <?php 
      if(@$_GET['q']=='ans_delete')
      {
        $aid=$_REQUEST['aid'];
        $query="DELETE FROM answers where aid='$aid'"; 
        if(mysqli_query($conn,$query))
        {
          echo "<script type='text/javascript'>alert('Answer Deleted');</script>";
        }
        else
          echo "error";
      }
    
    ?>



    <!-- report start -->
    <?php if(@$_GET['q']==5) {
      echo "report";
    }

    ?>

<!-- admin_notifications -->
<?php if(@$_GET['q']==6){
        $query = "Select * from admin_notifications order by `date` desc";
        $notifs = mysqli_query($conn,$query);
        echo "<table border='1' align='center'><tr><th>NOTIFICATION ID</th><th>NOTIFICATION</th><th>DATE</th><th>DELETE</th></tr>";
        while($row=mysqli_fetch_array($notifs))
        {
            echo "<tr>
                        <td>".$row['notifid']."</td>
                        <td>".$row['notification']."</td>
                        <td>".$row['date']."</td>
                        <td>
                            <a href='admin.php?q=notif_delete&notifid=".$row['notifid']."'>Delete</a>
                        </td>
                </tr>";
        }}
        
    ?>
<!-- notif_delete -->
    <?php if(@$_GET['q']=='notif_delete'){
          $notifid=$_REQUEST['notifid'];
          $query="DELETE FROM admin_notifications where notifid='$notifid'"; 
          if(mysqli_query($conn,$query))
          {
            echo "<script type='text/javascript'>alert('Notification Deleted');</script>";
          }
          else
            echo "error";
    }

    ?>

    
    
   
</body>
</html>