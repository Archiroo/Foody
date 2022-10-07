<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Foody website</title>
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>ĐĂNG NHẬP</header>
            <form action="#" autocomplete="off", method="POST">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Tài khoản <span style="color: red">*</span></label>
                    <input type="email" name="username" placeholder="Địa chỉ email" required>
                </div>
                <div class="field input">
                    <label>Mật khẩu <span style="color: red">*</span></label>
                    <input type="password" name="password" placeholder="*****" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="checkbox">
                    <input type="checkbox" name="" class="remember-me">
                    <label for="remember-me">Lưu thông tin</label>
                </div>
                <div class="field button">
                    <input type="submit" value="Đăng nhập">
                </div>
            </form>
            <div class="link">Bạn chưa có tài khoản? <a href="register.php"> Đăng ký</a></div>
        </section>
    </div>

    <script>
        // Show password
        const passWord = document.querySelector(".form input[type='password']"),
            showpassBtn = document.querySelector(".form .field i");

        showpassBtn.onclick = () => {
            if (passWord.type == "password") {
                passWord.type = "text";
                showpassBtn.classList.add("active")
            } else {
                passWord.type = "password";
                showpassBtn.classList.remove("active")
            }
        }

        // Log error
        const form = document.querySelector(".login form"),
            loginBtn = form.querySelector(".button input"),
            errorText = form.querySelector(".error-txt");
        form.onsubmit = (e) => {
            e.preventDefault(); // đếm số lần bấm
        }

        loginBtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "processLogin.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        console.log(xhr);
                        if (data == "admin") {
                            location.href = "../admin/index.php";
                        }
                        if (data == "staff") {
                            location.href = "../staff/index.php";
                        }
                        if (data == "customer") {
                            location.href = "../customer/index.php";
                        }
                        else {
                            errorText.textContent = data;
                            errorText.style.display = "block";
                        }
                    }
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }
    </script>
</body>

</html>