</main>
<!-- JQUERY -->

<script src="js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script>
    function showSuccessToast() {
        toast({
            title: "Thành công!",
            message: "Bạn đã đăng ký thành công tài khoản tại F8.",
            type: "success",
            duration: 5000
        });
    }

    function showErrorToast() {
        toast({
            title: "Thất bại!",
            message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
            type: "error",
            duration: 5000
        });
    }
</script>
</body>

</html>