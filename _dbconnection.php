<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db_Name = 'exam';

    $con = mysqli_connect($host, $user, $password, $db_Name);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to database." . mysqli_connect_errno();
    }
?>