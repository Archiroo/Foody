<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <title>Foody website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form signup">
            <header>ĐĂNG KÝ</header>
            <form action="">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Địa chỉ email <span style="color: red">*</span></label>
                    <input type="text" name="username" placeholder="Nhập email" required>
                </div>
                <div class="field input">
                    <label>Mật khẩu <span style="color: red">*</span></label>
                    <input type="password" name="password" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field input">
                    <label>Xác nhận mật khẩu <span style="color: red">*</span></label>
                    <input type="password" name="confirmPass" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye confirmPass"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Đăng ký">
                </div>
            </form>
            <div class="link">Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></div>
        </section>
    </div>
    <script>
        // Show password
        const passWord = document.querySelector(".form input[name='password']"),
              showpassBtn = document.querySelector(".form .field i"),
              confirmPass = document.querySelector(".form input[name='confirmPass']"),
              showConfirmBtn = document.querySelector(".confirmPass");
              showpassBtn.onclick = () => {
            if (passWord.type == "password") {
                passWord.type = "text";
                showpassBtn.classList.add("active")
            } else {
                passWord.type = "password";
                showpassBtn.classList.remove("active")
            }
        }
        showConfirmBtn.onclick = () => {
            if (confirmPass.type == "password") {
                confirmPass.type = "text";
                showConfirmBtn.classList.add("active")
            } else {
                confirmPass.type = "password";
                showConfirmBtn.classList.remove("active")
            }
        }

        // Log error
        const form = document.querySelector(".signup form"),
              registerBtn = form.querySelector(".button input"),
              errorText = form.querySelector(".error-txt");

        form.onsubmit = (e) => {
            e.preventDefault(); // đếm số lần bấm
        }

        registerBtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "processRegister.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data == "Đăng ký thành công!") {
                            // location.href = "login.php";
                        } else {
                            errorText.textContent = data;
                            errorText.style.display = "block";
                        }
                    }
                }
            }
            let formData = new FormData(form); // create new formData object
            xhr.send(formData);
        }
    </script>
</body>

</html>