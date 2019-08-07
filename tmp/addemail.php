<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Make Me Elvis - Add Email</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once 'kapcs.php';

$kapcs = mysqli_connect(HOST, USER, PW, AB);

if (!$kapcs) {
    die(mysqli_connect_error());
}

mysqli_query($kapcs,"SET NAMES utf8");

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    echo "Customer added <br>";
}

$qurey = "INSERT INTO email_list 
          (first_name, last_name, email)
	      VALUES 
	      ('$fname', '$lname', '$email')";

$result = mysqli_query($kapcs, $qurey) or die('Sikertelen lekérdezés');

mysqli_close($kapcs);
?>
</body>
</html>