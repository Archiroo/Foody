<?php
    session_start();
    include ('connect.php');
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $confirmPass = mysqli_real_escape_string($connect, $_POST['confirmPass']);

    if (!empty($username) && !empty($password) && !empty($confirmPass)) {
        // Validate email
        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            // Tồn tại trong database
            $sql = "SELECT entity.email FROM tbl_user as entity WHERE entity.email = '{$username}'";
            $result = mysqli_query($connect, $sql);
            if(mysqli_num_rows($result) == 0) {
                // Độ dài mật khẩu
                $lengthPass = strlen($password);
                $lengthConfirmPass = strlen($confirmPass);
                if($lengthPass >= 6 && $lengthPass <= 25 && $lengthConfirmPass >= 6 && $lengthConfirmPass <= 25) {
                    if($password == $confirmPass) {
                        // status: 3 - Khách hàng, level: 1 - Đã kích hoạt, image: ảnh mặc định
                        $sql2 = "INSERT INTO tbl_user(email, password, status, level, image)
                                 VALUES ('$username', '$password', 1, 3, 'user_default.png')";
                        $result2 = mysqli_query($connect, $sql2);
                        if($result2 == TRUE) {
                            // Lấy id tài khoản vừa đăng ký
                            $result3 = mysqli_query($connect, "SELECT * FROM tbl_user as entity WHERE entity.email = '$username'");
                            if(mysqli_num_rows($result3) > 0) {
                                $rownumber = mysqli_fetch_assoc($result3);
                                $_SESSION['id_customer'] = $rownumber['id'];
                                echo "Đăng ký thành công!";
                            }
                        } else {
                            echo "Đăng ký thất bại!";
                        }
                    }   
                    else {
                        echo "Mật khẩu không khớp!";
                    }
                } else {
                    echo "Độ dài mật khẩu không hợp lệ!";
                }
            } else {
                echo "$username - Đã tồn tại!";
            }
        } else {
            echo "$username - Không hợp lệ!";
        }
    } else {
        echo "Vui lòng điền đầy đủ thông tin!";
    }
?>
