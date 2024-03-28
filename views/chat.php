<?
    require_once'../models/checkuser.php';
    $checkSession= new Checkuser();
    if (!$checkSession->checkSessionAdmin() && !$checkSession->checkSessionUser()){
        echo "<script>";
        echo "alert('Bạn không có quyền truy cập vào trang này!');";
        echo "window.location.href = 'index.php';";
        echo "</script>";
        exit;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
    #chat-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 24px;

    }

    .message {
        border-radius: 20px;
        margin-bottom: 10px;
        padding: 10px;
        color: #333;

    }

    .mine-message {
        /* Màu nền cho tin nhắn của mình */
        background-color: #007bff;
        color: #fff;
        margin-top: 15px;
        word-wrap: break-word;
        border-radius: 12px;
        min-height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 20px;


    }

    .other-message {
        /* Màu nền cho tin nhắn của người khác */
        background-color: bisque;
        word-wrap: break-word;
        border-radius: 12px;
        margin-top: 15px;
        border-radius: 12px;
        min-height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: flex-start;
        padding-left: 20px;

    }

    .container {
        position: fixed;
        /* Hoặc absolute */
        
        
        left: 25%;
        bottom: 100px;
        /* Thêm kích thước cho container nếu bạn muốn */
        width: 50%;
        
    }


    #input-message {
        margin-top: 20px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div id="chat-container" class=row>
                    <!-- Tin nhắn sẽ được load ở đây -->
                </div>
                <div class="input-group">
                    <input type="text" id="input-message" class="form-control" placeholder="Type your message...">
                    <button class="btn btn-primary" onclick="sendMessage()"
                        style="height: 38px;margin-top: 20px;">Send</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        refreshChat();
    });

    function refreshChat() {
        $.ajax({
            url: '../controllers/getMessageController.php',
            success: function(data) {
                $('#chat-container').html(data);
                $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
                setTimeout(refreshChat, 2000);
            }
        });
    }

    function sendMessage() {
        var message = $('#input-message').val();
        $.ajax({
            url: '../controllers/sendMessageController.php',
            type: 'POST',
            data: {
                'message': message
            },
            success: function() {
                $('#input-message').val('');
                refreshChat();
            }
        });
    }
    </script>
</body>

</html>