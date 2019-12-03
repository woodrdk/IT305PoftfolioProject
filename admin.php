<?php
    //Start the session
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: login.php');
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rob's Guestbook Entries</title>
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
                <a class="nav-link" href="index.php">Index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://rwood.greenriverdev.com/305/resume/index.html">Resume</a>
            </li>
           <!-- <li class="nav-item">
                <a class="nav-link" href="#">Portfolio</a>
            </li>-->
            <li class="nav-item">
                <a class="nav-link" href="guestbook.html">Guestbook</a>
            </li>
            <li>
                <a class="nav-link" href="logout.php">Logout</a>
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
        <h1 class="text-center p-5">Welcome To Rob's Guestbook Entries</h1>
    </div>
    <div>
        <?php
            require ('/home/rwoodgre/connect.php');
            // Define the query
            $sql = "SELECT *
                    FROM Guestbook
                    ORDER BY added ASC";
            // send query to the database
            $result = mysqli_query($cnxn,$sql);
            // var_dump($result);
        ?>
        <table id="gb-entries-table" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Mailing List</th>
                    <th>Mailing List Format</th>
                    <th>LinkedIn Address</th>
                    <th>Comment</th>
                    <th>How we met</th>
                    <th>When added</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        $first = $row['first_name'];
                        $last = $row['last_name'];
                        $title = $row['title'];
                        $company = $row['company'];
                        $email = $row['email'];
                        $mailList = $row['mailing_list'];
                        $mailFormat = $row['mail_list_format'];
                        $linked = $row['linkedIn'];
                        $comment = $row['comment'];
                        $how = $row['how_we_met'];
                        $when = $row['added'];
                        if($mailList == 1){
                            $mailList = "Subscribed";
                        }
                        else{
                            $mailList = "Unsubscribed";
                        }

                        echo "<tr>
                              <td>$first, $last</td>
                              <td>$title</td>
                              <td>$company</td>
                              <td><a href='mailto:$email'>$email</a></td>
                              <td>$mailList</td>
                              <td>$mailFormat</td>
                              <td><a href='$linked' target='_blank'>$linked</a></td>
                              <td>$comment</td>
                              <td>$how</td>
                              <td>$when</td>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include ('footer.php');
?>

<!-- jQuery first, then Popper, then Bootstrap, then developer made -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/bookScript.js"></script>
<script src="scripts/portScripts.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
<script>
    $('#gb-entries-table').DataTable();
    $(document).ready(function() {
        let table = $('#dreamer-table').DataTable( {
            paging: false,
            retrieve: true,
            searching: false,
        } );
        table.column(7).visible(false);
        table.column(9).visible(false);
        table.column(10).visible(false);
        $('a.toggle-vis').on('click', function (e) {
            e.preventDefault();
            // Get the column API object
            var column = table.column($(this).attr('data-column'));
            // Toggle the visibility
            column.visible(!column.visible());
        });
    });
</script>
</body>
</html>
