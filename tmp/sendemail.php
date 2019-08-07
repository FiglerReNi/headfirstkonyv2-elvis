<!DOCTYPE html>
<html lang="hu-HU">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Make Me Elvis - Send Email</title>
    <link rel="stylesheet" href="addemail.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
require_once 'kapcs.php';
include dirname(__FILE__) . '/SendMail.php';
ini_set('default_charset', 'utf-8');

$kapcs = mysqli_connect(HOST, USER, PW, AB);

if (!$kapcs) {
    die(mysqli_connect_error());
}

mysqli_query($kapcs, "SET NAMES utf8");

if (isset($_POST['submit'])) {
    $subject = $_POST['subject'];
    $body = $_POST['body'];
    $output_form = false;
    if (empty($subject) && empty($body)) {
        echo "Nem töltötted ki a tárgy és szöveg mezőket!<br>";
        $output_form = true;
    } else if (empty($subject)) {
        echo "Nem töltötted ki a tárgy mezőt!<br>";
        $output_form = true;
    } else if (empty($body)) {
        echo "Nem töltötted ki a szöveg mezőt!<br>";
        $output_form = true;
    } else {
        $qurey1 = "SELECT * FROM email_list";

        $result = mysqli_query($kapcs, $qurey1) or die('Sikertelen lekérdezés');

        $fname = array();
        $lname = array();
        $email = array();
        while ($row = mysqli_fetch_array($result)) {
            echo "Email sent to:  $row[2] <br>";
            $fname[] = $row[0];
            $lname[] = $row[1];
            $email[] = $row[2];
        }

        $mail = new SendMail($fname, $lname, $email, $body, $subject);
        $mail->sendMail();
    }

    if ($output_form) {
        ?>
        <div class='container'>
            <img src="elvislogo.gif" height="32" width="229"/>
            <img class='twoimg' src="blankface.jpg" height="350" width="161"/>
            <p><strong>Private:</strong> For Elmer's use ONLY.<br>
                Write and send an email to mailing list members.</p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
                <label>Subject of email:</label><br>
                <input type="text" name="subject" value="<?php echo $subject; ?>"><br>
                <label>Body of email:</label><br>
                <textarea name="body" rows="6" cols="43"><?php echo $body; ?></textarea><br>
                <input class='btn btn-primary' type="submit" name="submit" value="Submit">
            </form>
        </div>
        <?php
    }
}
else {
    ?>
    <div class='container'>
        <img src="elvislogo.gif" height="32" width="229"/>
        <img class='twoimg' src="blankface.jpg" height="350" width="161"/>
        <p><strong>Private:</strong> For Elmer's use ONLY.<br>
            Write and send an email to mailing list members.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
            <label>Subject of email:</label><br>
            <input type="text" name="subject" ><br>
            <label>Body of email:</label><br>
            <textarea name="body" rows="6" cols="43"></textarea><br>
            <input class='btn btn-primary' type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php
}
mysqli_close($kapcs);
?>

</body>
</html>
