<?php
   include('session.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Confer Space</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../jQuery/jQuery3.2.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <style>
    #headerWrapper {
        position: fixed;
        width: 100%;
        top: 0;
        height: whatever;
        margin-top: -10px;
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
                        <a class="nav-link" href="user_notifications.php">
                        <?php
                            $q="SELECT count(*) FROM user_notifications where userid='".$_SESSION['username']."'";
                            $d=mysqli_query($conn,$q);
                            $notif_count=mysqli_fetch_row($d);
                            ?>
                            Notifications<b><i><span style='background-color:grey;color:white;'><?php echo"$notif_count[0]";?></span></i></b>

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
        <div class="container mt-3">
            <h2><?php echo $full_name; ?></h2><div class="media-body" align="center">
            <img src="../img_avatar.png" alt="Card image" style="width:15%">
                <h4 class="card-title">@<?php echo $username; ?></h4>
                <p class="card-text"><b>Gender:</b> <?php echo $gender; ?><br></p>
                <p class="card-text"> <b>Email:</b> <?php echo $email; ?><br></p>
                <p class="card-text"><b>Password:</b> <?php echo $password; ?><br></p>
                <p class="card-text"><b>Mobile Number:</b> <?php echo $mobile; ?><br></p>
                <a href="setting.php" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    </div>
    <div>
    <br><br><br><br>
    <footer class="page-footer font-small teal pt-6 navbar-white bg-dark text-white" style="width:100%;">
            <div class="container-lebal text-center text-md-center" style='color:white;wieght:10%;   font-size:0.13in;'>
                <div class="row">
                    <div class="col-md-6 mt-md-0 mt-6 text-left " style="margin-left:3%;" >
                        <h5 class=" font-weight-bold">Contact Us</h5>
                        <p>Email-Id's: ankitsinghmyself@gmail.com<br />
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
                    <a href="https://ankitsinghportfolio.herokuapp.com/" target="_blank"> Ankit Singh</a> @CMRIT
                </div>
            </div>
        </footer>
    </div>
</body>

</html>