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
     <!-- <li class="nav-item active">
        <a class="nav-link" href="admin.php?q=1">
          <i class="fa fa-home"></i>
          Home
          <span class="sr-only">(current)</span>
          </a>
      </li>
      -->
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
     <!-- <li class="nav-item">
        <a class="nav-link" href="admin.php?q=5">
          <i class="fa fa-envelope-o">
            
          </i>
          Report
        </a>
      </li>
      --><li class="nav-item">
        <a class="nav-link" href="admin.php?q=6">
          <i class="fa fa-envelope-o">
            
          </i>
          Notifications
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
    <?php echo $_SESSION['uname'];?>
    
    <!-- home start -->
    <?php if(@$_GET['q']==1) {
        echo "<div></div>";
      

    }
    
    ?>

    <!-- users start -->
    <?php if(@$_GET['q']==2) {
      echo "<p></p>";

      $query="SELECT * FROM users";
      $data=mysqli_query($conn,$query);
      echo "<table border='1' align='center'><tr><th>USER ID</th><th>NAME</th><th>PASSWORD</th><th>EMAIL</th><th>MOBILE</th><th>DELETE</th></tr>";
      while($row=mysqli_fetch_array($data)) {
        echo "<tr>
                    <td>".$row['userid']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['mobile']."</td>
                    
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
            echo "<form action='admin.php?q=user_update&userid=$userid' method='post' align='center'>
                  Name <input type='text' name='name' value=".$name."/><br/>
                  Password <input type='text' name='password' value=".$password."/><br/>
                  Email <input type='text' name='email' value=".$email."/><br/>
                  Mobile <input type='text' name='mobile' value=".$mobile."/><br/>
                  <input type='submit' value='submit'/> &nbsp;&nbsp;&nbsp;&nbsp;
                  <a href='admin.php?q=2'><input type='button' value='cancel'/></a>
                  </form>";
          }

    ?>
    <!-- user_update -->
    <?php if(@$_GET['q']=='user_update')
          {
            $userid=$_POST['userid'];
            $name=$_POST['name'];
            $password=$_POST['password'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $query="UPDATE users SET name='$name',password='$password',email='$email',mobile='$mobile' where userid='$userid'";
            if(mysqli_query($conn,$query))
            {
              echo "<script type='text/javascript'>alert('Information Updated');</script>";
            }
            else
              echo "not updated";
            
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