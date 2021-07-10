<?php
session_start();
if (!$_SESSION['s_name']) {
    header("LOCATION: login.php");
}

$s_name = $_SESSION['s_name'];

include '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>

    <style>
        body{
            background-color: lightblue;
        }
    </style>    

</head>
<body>
    <h1>welcome <?php echo $s_name ?></h1>
</body>
</html>