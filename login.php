<?php
    //Turn on error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Start a session
    session_start();
    //If the user is already logged in
    if(isset($_SESSION['username'])){
        //Redirect to page 1
        header('location: admin.php');
    }
    //If the login form has been submitted
    if(isset($_POST['submit'])){
        //Include creds.php (temp storage)
        include('creds.php');
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(array_key_exists($username, $logins) && $logins["$username"] == $password){
            $_SESSION['username'] = $username;
            header('location: admin.php');
        }
        echo "<p>Invalid Login</p>";
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rob's Portfolio Log In</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/jpg" href="images/gears.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" href="styles/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="styles/port.css">
    <link rel="stylesheet" type="text/css" href="styles/bookCSS.css">
    <style>
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        body{
            background-color: lightgrey;
        }
        .req{
            color: red;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="index.php">RW</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://rwood.greenriverdev.com/305/resume/index.html">Resume</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guestbook.html">Guestbook</a>
            </li>
            <li>
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="https://www.linkedin.com/in/robert-wood-jr-200180161/" target="_blank">LinkedIn</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/woodrdk" target="_blank">GitHub</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container pb-5" id="main">
    <div>
        <h1 class="text-center p-5">Login To View Rob's Guestbook Entries</h1>
    </div>
    <div>
        <form method="post" action="#">
            <label>Username:
                <input type="text" name="username">
            </label><br>

            <label>Password:
                <input type="password" name="password">
            </label><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>

<nav id="footer" class="navbar navbar-dark bg-dark">
    <div class="col-4 text-light"> &copy; October 2019 </div>
    <div>
        <i class="fa fa-github" style="font-size:48px;color:white"></i>
        <i class="fa fa-linkedin-square" style="font-size:48px;color:dodgerblue"></i>
        <i class="fa fa-envelope" style="font-size:48px;color:white"></i>
        <!--<i class='fab fa-adobe' style='font-size:48px;color:red'></i>-->
        <!--<i class='fab fa-accessible-icon' style='font-size:48px;color:blue'></i>-->
    </div>
</nav>

<!-- jQuery first, then Popper, then Bootstrap, then developer made -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/bookScript.js"></script>
<script src="scripts/portScripts.js"></script>

</body>
</html>