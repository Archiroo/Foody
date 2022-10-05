<?php
    $connect = mysqli_connect("localhost", "root", "", "db_foody");
    if($connect) {

    } else {
        echo "Connect Fail";
    }
?>