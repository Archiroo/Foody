<?php
    session_start();
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db_foody');

    $connect = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if($connect)
    {
        mysqli_query($connect, "SET NAMES 'UTF8'");
    }
    else
    {
        echo "Kết nối thất bại";
    }
?>