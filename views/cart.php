<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offcanvas Example</title>
    <style>
        /* CSS tùy chỉnh */
        body {
            font-family: Arial, sans-serif;
        }

        .offcanvas {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #f5f5f5;
            transition: left 0.3s ease;
            overflow-x: hidden;
            padding-top: 60px;
        }

        .offcanvas.active {
            left: 0;
        }

        .offcanvas .close-btn {
            position: absolute;
            top: 20px;
            right: 10px;
            cursor: pointer;
        }

        .offcanvas .content {
            padding: 20px;
        }

        .offcanvas .dropdown {
            margin-top: 20px;
        }

        .offcanvas .dropdown .dropdown-menu {
            display: none;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .offcanvas .dropdown.active .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <!-- Nút kích hoạt Offcanvas -->
    <button class="btn btn-primary" type="button" onclick="toggleOffcanvas()">
        Open Offcanvas
    </button>

    <!-- Offcanvas -->
    <div class="offcanvas" id="offcanvasExample">
        <span class="close-btn" onclick="toggleOffcanvas()">X</span>
        <div class="content">
            <p>Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.</p>
            <div class="dropdown">
                <button class="btn btn-secondary" onclick="toggleDropdown()">Dropdown button</button>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // JavaScript để điều khiển Offcanvas và Dropdown
        function toggleOffcanvas() {
            var offcanvas = document.getElementById("offcanvasExample");
            offcanvas.classList.toggle("active");
        }

        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.classList.toggle("active");
            dropdownMenu.style.display = dropdownMenu.classList.contains("active") ? "block" : "none";
        }
    </script>
</body>
</html>
