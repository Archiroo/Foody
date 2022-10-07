<?php
    include('connect.php');
    if(!isset($_SESSION['id_admin']))
    {
        header("Location:../index.php");
    }
?>