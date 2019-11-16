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

<h2 class="text-center">Thanks for checking out this site please check out out others including <a href="http://www.rdkwood.com">RDKWOOD.com</a> </h2>


<?php

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
$howMet = $_POST['howOther'];
$mailFormat = "";
if($mail){
    $mailFormat = "HTML";
}
else{
    $mailFormat = "Text";
}


$formValues = array(
    'First Name' => $firstName,
    'Last Name' => $lastName,
    "Title" => $title,
    "Company" => $company ,
    "Email" => $email,
    "LinkedIn" => $linked,
    "Comment" => $comment,
    "Mailing list email format" => $mailFormat);


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

// email validation
if ($email != "" && filter_var($email, FILTER_VALIDATE_EMAIL)){
}
else{
    echo "<p>Invalid email format</p>";
    $isValid = false;
}

if($isValid) {

    foreach ($formValues as $key => $value) {
        echo "<tr>";
        echo "<td><br>";
        echo $key;
        echo "</td>";
        echo "<td><br>";
        echo $value;
        echo "<br></td>";
        echo "</tr>";
    }
}
// require '';

if($isValid) {
    $query = "INSERT INTO book (first_name, last_name, email, title, company, linked, comment)
                                    VALUES ('$firstName', '$lastName', '$email', '$title', '$company', '$linked', '$comment' )";
    $Result = mysqli_query($cnxn, $query);

    if( $Result){
        echo "Data Submitted";
    }
    else{
        echo "Something Didnt Work";
    }
}
?>


<!-- jQuery first, then Popper, then Bootstrap, then developer made -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src=""></script>
</body>
</html>