function validateForm() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById("confirm_password").value;
    var email = document.getElementById('email').value;
    
    var usernamePattern = /^[a-zA-Z0-9]{6,}$/;
    if (!username.match(usernamePattern)) {
        alert('Tên đăng nhập phải có ít nhất 6 ký tự.');
        return false;
    }
    
    if (password.length < 6) {
        alert('Mật khẩu phải có ít nhất 6 ký tự. Vui lòng thử lại.');
        return false;
    }
    if (password != confirm_password) {
        alert("Mật khẩu và xác nhận mật khẩu không khớp!");
        return false;
    }

    if (!validateEmail(email)) {
        alert('Email không hợp lệ.');
        return false;
    }

    return true; // Nếu tất cả dữ liệu hợp lệ
}

function validateEmail(email) {
    var emailPattern = /^[^\s@]{1,}@[^\s@]+\.[^\s@]+$/;
    return email.match(emailPattern);
}

