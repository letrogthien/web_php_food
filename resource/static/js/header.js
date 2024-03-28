//<!-- hiệu ứng tắt / bật thanh trạng thái người dùng -->

    document.addEventListener("DOMContentLoaded", function() {
        var avt_users = document.getElementById("avt_users");
        var mid_user_info = document.querySelector(".mid_user_info");

        avt_users.addEventListener("click", function() {
            if (mid_user_info.style.display == "none") {
                mid_user_info.style.display = "block";
                avt_users.classList.toggle("avt_animations");
                setTimeout(function() {
                    avt_users.classList.remove("avt_animations");
                }, 300);
            } else {
                mid_user_info.style.display = "none";
                avt_users.classList.toggle("avt_animations");
                setTimeout(function() {
                    avt_users.classList.remove("avt_animations");
                }, 300);
            }
        });
    });


    //<!-- js hiển thị phần chức nang cuộn cho header -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('header').addClass('sticky');
            } else {
                $('header').removeClass('sticky');
            }
        });
    });


 // JavaScript để điều khiển Offcanvas và Dropdown -->

    function toggleOffcanvas() {
        var offcanvas = document.getElementById("offcanvasExample");
        offcanvas.classList.toggle("active");
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("active");
        dropdownMenu.style.display = dropdownMenu.classList.contains("active") ? "block" : "none";
    }
