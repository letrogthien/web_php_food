<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Not Found</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        img {
            width: 300px;
            height: auto;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #343a40;
        }

        p {
            font-size: 1.2rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <img src="../resource/static/img/404.png" alt="404 Not Found">
    <h1>Oops! Có lỗi xảy ra!</h1>
    <p>Chuyển đến trang chủ sau 3s...</p>

    <script>
        setTimeout(function() {
            window.history.back();
        }, 3000);
    </script>
</body>
</html>
