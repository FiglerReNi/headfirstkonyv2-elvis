<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta charset="UTF-8">
    <title>Make Me Elvis - Send Email</title>
    <link rel="stylesheet" href="addemail.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class='container'>
    <img src="elvislogo.gif" height="32" width="229"/>
    <img class='twoimg' src="blankface.jpg" height="350" width="161"/>
    <p>Please select the email addresses to delete from the email list and click Remove</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>

        <?php
        require_once 'kapcs.php';

        $kapcs = mysqli_connect(HOST, USER, PW, AB);

        if (!$kapcs) {
            die(mysqli_connect_error());
        }

        mysqli_query($kapcs, "SET NAMES utf8");

        $qurey3 = "SELECT * FROM email_list";

        if (isset($_POST['submit'])) {
            foreach ($_POST['todelete'] as $deleteid) {
                $query4 = "DELETE FROM email_list WHERE id = '$deleteid'";
                mysqli_query($kapcs, $query4) or die('query4');
            }
            echo "Customer(s) removed.<br>";
        }

        $result1 = mysqli_query($kapcs, $qurey3) or die('query3');
        while ($row = mysqli_fetch_array($result1)) {
            echo '<input type="checkbox" value="' . $row[0] . '" name="todelete[]">';
            echo $row[1] . " " . $row[2] . ": " . $row[3] . "<br>";
        }
        mysqli_close($kapcs);


        ?>

        <input class='btn btn-primary' type="submit" name="submit" value="Remove">
    </form>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>