<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        Đăng nhập
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                        </div>
                    </div>
                    <form class="login-form" action="../controllers/loginController.php" method="post" onsubmit="return validateForm()">
                        <input type="text" id="username" name ="username" class="auth-form-input" placeholder="Tài khoản" require>
                        <div class="input-icon">
                            <input type="password" id="password" name ="password" class="auth-form-input" placeholder="Mật khẩu" require>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='email' checked>

                        </label>
                        <div class="footer-action">
                            <input type="submit" value="Đăng nhập" class="auth-submit">
                            <a href="signup.php" class="auth-btn-direct">Đăng kí</a>
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
