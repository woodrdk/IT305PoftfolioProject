
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rob's Guestbook Confirmation</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/jpg" href="images/gears.ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link type="text/css" href="styles/mdb.min.css" rel="stylesheet">
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
    <link type="text/css" href="styles/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/port.css">
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
<br/>
<div class="container pb-5" id="main">
    <div>
        <h1 class="text-center p-5">Thank you for your entry.</h1>
    </div>
    <h2 class="text-center">Thanks for checking out this site please check out out others including <a href="http://www.rdkwood.com">RDKWOOD.com</a> </h2>
    <?php
    //var_dump($_POST);
    $firstName = $_POST['firstName'];       // required
    $lastName = $_POST['lastName'];         // required
    $title = $_POST['title'];
    $company = $_POST['company'];
    $email = $_POST['email'];               // if  mail is true  required... is supplied must be valid
    $linked = $_POST['linked'];             // if supplied must be valid
    $comment = $_POST['comment'];
    $mail = $_POST['mail'];
    $html = $_POST['html'];
    $text = $_POST['text'];
    $howMet = $_POST['how'];               // is required and must be valid
    $howMetOther = $_POST['howOther'];
    if($mail){
        $mail = "Yes, please add me to the mailing list";
        $mailFormat = strtoupper($_POST['method']);
        $mailing_list = true;
    }
    else{
        $mail = "No thank you, please do not add me to the mailing list";
        $mailFormat = "N/A";
        $mailing_list = false;
    }
    //$mailFormat = strtoupper($_POST['method']);
    if($howMet === "Other"){
        $howMet = $howMetOther;
    }
    $formValues = array(
        'First Name' => $firstName,
        'Last Name' => $lastName,
        "Title" => $title,
        "Company" => $company ,
        "Email" => $email,
        "LinkedIn" => $linked,
        "Comment" => $comment,
        "Add to mailing list" => $mail,
        "Mailing list email format" => $mailFormat,
        "How we met" => $howMet);
    $isValid = true;
    // first name validation
    if($firstName != ""){
    }
    else{
        echo "<p>First name is required</p>";
        $isValid = false;
    }
    // last name validation
    if($lastName != ""){
    }
    else{
        echo "<p>Last name is required</p>";
        $isValid = false;
    }
    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if($mail == "Yes, please add me to the mailing list"){
        if($email == ""){
            echo "<p>Email is required to join the mailing list</p>";
            $isValid = false;
        }
        else if ($email != "" && filter_var($email, FILTER_VALIDATE_EMAIL)){
        }
        else{
            echo "<p>Invalid email for the mailing list</p>";
            $isValid = false;
        }
    }
    // email validation
    if($mail == "No thank you, please do not add me to the mailing list" ){
        if($email != ""){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            }
            else{
                echo "<p>Invalid email format</p>";
                $isValid = false;
            }
        }
    }
    if($howMet == "" || $howMet == 'none'){
        echo "<p>How met we met is required</p>";
        $isValid = false;
    }
    if($linked != ""){
        if(!filter_var($linked, FILTER_VALIDATE_URL)){
            echo "<p>Invalid URL for LinkedIn</p>";
            $isValid = false;
        }
    }
    if($isValid) {
        foreach ($formValues as $key => $value) {
            echo "<tr>";
            echo "<td>";
            echo $key.":   ";
            echo "</td>";
            echo "<td>";
            if($key == $email){
                echo "<a href='mailto:$value'>$value</a>";
            }
            else{
                echo $value;
            }
            echo "</td></br>";
            echo "</tr>";
        }
    }
    //Connect to db
    require ('/home/rwoodgre/connect.php');
    if($isValid) {
        $query = "INSERT INTO Guestbook (first_name, last_name, title, company, email, mailing_list, mail_list_format, linkedIn, comment, how_we_met, added)
                VALUES ( '$firstName', '$lastName', '$title', '$company', '$email',  '$mailing_list', '$mailFormat', '$linked', '$comment', '$howMet', now() )";
        $Result = mysqli_query($cnxn, $query);

        if($Result){
            echo "Thank you for your submission, your data was submitted";
        }
        else{
            echo "Something Didnt Work please try again";
        }
    }
    ?>
</div>
<!--<div class="right-stick">
    <a href="#">Let's work together!</a>
</div>-->
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
<script src=""></script>
</body>
</html>