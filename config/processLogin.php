<?php
    session_start();
    include ('connect.php');
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = mysqli_query($connect, "SELECT * FROM tbl_user as entity WHERE entity.email = '{$username}' AND entity.password = '{$password}' AND entity.status = 1");
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
            $level = $row['level'];
            if ($level == 1) {
                echo "admin";
                $_SESSION['id_admin'] = $row['id'];
            }
            if ($level == 2) {
                echo "staff";
                $_SESSION['id_staff'] = $row['id'];
            }
            if ($level == 3) {
                echo "customer";
                $_SESSION['id_customer'] = $row['id'];
            }
        } else {
            echo "Tài khoản hoặc mật khẩu không chính xác.";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin.";
    }
?>
