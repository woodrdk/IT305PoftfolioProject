<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rob's Guestbook Confirmation</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/jpg" href="images/gears.ico">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 class="text-center">Thank you for your entry.</h1>
<br/>
<div class="container pb-5" id="main">
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
/*    if($isValid) {
        $query = "INSERT INTO Guestbook 
                VALUES (now(), '$firstName', '$lastName', '$email', '$title', '$company', '$linked', '$comment', '$howMet', '$mailFormat', '$mailing_list' )";
        $Result = mysqli_query($cnxn, $query);

        if(mysqli_query($cnxn, $query)){
            echo "Data Submitted";
        }
        else{
            echo "Something Didnt Work";
        }
    }*/

    ?>
</div>

<!-- jQuery first, then Popper, then Bootstrap, then developer made -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src=""></script>
</body>
</html>