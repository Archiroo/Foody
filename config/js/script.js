// Show password
const password = document.querySelector(".form input[name='password']"),
      confirmPassword = document.querySelector(".form input[name='confirmPass']"),
      showPassword = document.querySelector(".form .field i"),
      showConfirmPass = document.querySelector(".form .field .confirmPass");

showPassword.onclick = () => {
    if(password.type == "password") {
        password.type = "text";
        showPassword.classList.add("active");
    } else {
        password.type = "password";
        showPassword.classList.remove("active");
    }
}
showConfirmPass.onclick = () => {
    if(confirmPassword.type == "password") {
        confirmPassword.type = "text";
        showConfirmPass.classList.add("active");
    } else {
        confirmPassword.type = "password";
        showConfirmPass.classList.remove("active");
    }
}

