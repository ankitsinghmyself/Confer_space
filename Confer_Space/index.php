<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jQuery\jQery3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" type="text/css" media="screen" href="bootstrap\css\bootstrap.css">
    <script src="bootstrap\js\bootstrap.js"></script>
    <style>
    #login {
        background: #0a0a0a;
        color: white;
        opacity: 0.9;
        padding: 2em;
        border: black 2px solid;
        position: fixed;
        top: -100px;
        right: -40px;
        width: 600px;
    }

    #webtitle {
        background: transparent;
        color: white;
        opacity: 0.9;
        padding: 2em;
        border: black 2px solid;
        position: fixed;
        top: 50px;
        left: 50px;
        width: 400px;
    }

    .form-control input[type="text"],
    .form-control input[type="password"] {
        padding: 7px;
        margin-bottom: 0px;
        border: 1px #ccc solid;
    }

    .login-wrap {
        width: 100%;
        margin: auto;
        max-width: 400px;
        min-height: auto;
        position: fixed;
        box-shadow: 0 12px 15px 0 rgba(0, 0, 0, .24), 0 17px 50px 0 rgba(0, 0, 0, .19);
    }

    .login-html {
        width: 100%;
        height: 0%;
        position: absolute;
        padding: 50px 100px 30px 90px;

    }

    .login-html .sign-in-htm,
    .login-html .sign-up-htm {
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        transform: rotateY(180deg);
        backface-visibility: hidden;
        transition: all .4s linear;
    }

    .login-html .sign-in,
    .login-html .sign-up,
    .login-form .group .check {
        display: none;
    }

    .login-html .tab {
        font-size: 22px;
        margin-right: 15px;
        padding-bottom: 5px;
        margin: 0 15px 10px 0;
        display: inline-block;
        border-bottom: 2px solid transparent;
    }

    .login-html .sign-in:checked+.tab,
    .login-html .sign-up:checked+.tab {
        color: #fff;
        border-color: #1161ee;
    }

    .login-form {
        min-height: 345px;
        position: relative;
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .login-form .group {
        margin-bottom: 15px;
    }

    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button {
        width: 100%;
        color: #fff;
        display: block;
    }

    .login-form .group .input,
    .login-form .group .button {
        border: none;
        padding: 5px 10px;
        border-radius: 25px;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group input[data-type="password"] {
        text-security: circle;
        -webkit-text-security: circle;
    }

    .login-form .group .label {
        color: #aaa;
        font-size: 12px;
    }

    .login-form .group .button {
        background: #1161ee;
    }

    .login-form .group label .icon {
        width: 15px;
        height: 15px;
        border-radius: 2px;
        position: relative;
        display: inline-block;
        background: rgba(255, 255, 255, .1);
    }

    .login-form .group label .icon:before,
    .login-form .group label .icon:after {
        content: '';
        width: 10px;
        height: 2px;
        background: #fff;
        position: absolute;
        transition: all .2s ease-in-out 0s;
    }

    .login-form .group label .icon:before {
        left: 3px;
        width: 5px;
        bottom: 6px;
        transform: scale(0) rotate(0);
    }

    .login-form .group label .icon:after {
        top: 6px;
        right: 0;
        transform: scale(0) rotate(0);
    }

    .login-form .group .check:checked+label {
        color: #fff;
    }

    .login-form .group .check:checked+label .icon {
        background: #1161ee;
    }

    .login-form .group .check:checked+label .icon:before {
        transform: scale(1) rotate(45deg);
    }

    .login-form .group .check:checked+label .icon:after {
        transform: scale(1) rotate(-45deg);
    }

    .login-html .sign-in:checked+.tab+.sign-up+.tab+.login-form .sign-in-htm {
        transform: rotate(0);
    }

    .login-html .sign-up:checked+.tab+.login-form .sign-up-htm {
        transform: rotate(0);
    }

    .hr {
        height: 2px;
        margin: 30px 0 10px 0;
        background: rgba(255, 255, 255, .2);
    }

    .foot-lnk {
        text-align: center;
    }
    </style>
</head>

<body id="particles-js">
    <div id="login">
        <div class="card-body">
            <div class="login-wrap">
                <div class="login-html">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1"
                        class="tab">Sign In</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign
                        Up</label>
                    <div class="login-form">
<form action="login.php" method="post">
                            <div class="sign-in-htm">
                                <div class="group">
                                    <label for="user" class="label">UserName</label>
                                    <input id="user" type="text" class="input" name="username" required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password"
                                        required>
                                </div>
                                <div class="group">
                                    <input id="check" type="checkbox" class="check" checked>
                                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign In">
                                </div>
                              
                                <div class="hr"></div>
                                <div class="foot-lnk">
                                    <label for="tab-2">Don't have Account?</a>
                                </div>
                            </div>
                        </form>
<form action="registration.php" method="POST">
                            <div class="sign-up-htm">
                                <div class="group">
                                    <label for="user" class="label">UserName</label>
                                    <input id="user" type="text" class="input" name="username" required>
                                </div>
                                <div class="group">
                                    <label for="user" class="label">Name</label>
                                    <input id="user" type="text" class="input" name="name" required>
                                    <label for="user" class="label">Male: <input id="user" type="radio" value="Male"  name="gender" checked>Female:<input id="user" value="Male" type="radio"  name="gender"></label>
                                   
                                    
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="password"
                                        required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Repeat Password</label>
                                    <input id="pass" type="password" class="input" data-type="password" name="rpassword"
                                        required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Email Address</label>
                                    <input id="pass" type="text" class="input" name="email" required>
                                </div>
                                <div class="group">
                                    <label for="pass" class="label">Mobile</label>
                                    <input id="pass" type="text" class="input" name="mobile">
                                </div>
                                <div class="group">
                                    <input type="submit" class="button" value="Sign Up">
                                </div>
                                <div class="hr"></div>
                                <div class="foot-lnk">
                                    <label for="tab-1">Already Member?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="webtitle">
        <div class="card-body">
            <h1 class="card-title text-center">Confer Space <br> <span style="Font-size:0.14in;"><small>CMRIT Discussion Forum</small></span>  </h1>
        </div>
    </div>



    <!-- scripts -->
    <script src="particles.js"></script>
    <script src="app.js"></script>
</body>

</html>