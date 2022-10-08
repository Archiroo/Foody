<?php
    include('connect.php');
    session_destroy(); //Unsets $_SESSION['user']

    //2. REdirect to Login Page
    header("Location:../config/login.php");
?>