<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeFood Sign Up</title>
    <link rel="stylesheet" href="../resource/static/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>
<body>
    <!-- Form without bootstrap -->
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Tạo tài khoản
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                        </div>
                        <p class="auth-sgt">Đăng kí tài khoản bằng email</p>
                    </div>
                    <form class="login-form" action="../controllers/registerController.php" method="post" onsubmit="return validateForm()">
                        <input type="text" id ="username" name ="username" class="auth-form-input" placeholder="Tài khoản" required>
                        <input type="email" id="email" name ="email" class="auth-form-input" placeholder="Email" require>
                        <input type="password" id="password" name="password" class="auth-form-input" placeholder="Mật khẩu" required>
                        <input type="password" id="confirm_password" name="confirm_password" class="auth-form-input" placeholder="Xác nhận mật khẩu" required>
                        <label class="btn active">
                        <input type="checkbox" name="agree_terms" checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i> 
                            <span> Tôi đồng ý với <a href="#">Điều khoản</a> và <a href="#">Chính sách quyền riêng tư</a>.</span>
                        </label>
                        <div class="footer-action">
                            <input type="submit" value="Đăng kí" class="auth-submit">
                            <a href="login.php" class="auth-btn-direct">Đăng nhập</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="../resource/static/img/12.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
    <script src="../resource/static/js/login.js"></script>
</body>
</html>
