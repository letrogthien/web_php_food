//<!-- js lấy id từ form -->1

    function getid(productid) {
        document.getElementById('id1').value = productid;
        document.getElementById('cartForm').submit();
    }

    function getcartid(cart_id) {
        document.getElementById('cart_id').value = cart_id;
    }


    // <!-- js tính năng cuộn background theo danh mục sanr phẩm-->1
 
    window.addEventListener('scroll', function() {
        var foodBoxContainer = document.getElementById('FoodBoxContainer');
        var banner = document.getElementById("banner");
        var containerContent = document.getElementById("container_content");
    
        var foodBoxContainerRect = foodBoxContainer.getBoundingClientRect();
        var bannerRect = banner.getBoundingClientRect();
        var containerContentRect = containerContent.getBoundingClientRect();
        var windowHeight = window.innerHeight;
    
        var foodBoxContainerHeight = foodBoxContainer.offsetHeight;
        var scrollPosition = window.scrollY || window.pageYOffset;
    
        // Tính toán vị trí xuất hiện của container_content
        var containerContentThreshold = foodBoxContainerHeight / 2;
    
        // Khi cuộn trang đã đạt đến ngưỡng xuất hiện của container_content
        if (scrollPosition + windowHeight >= containerContentThreshold) {
            containerContent.style.display = 'block'; // Hiển thị container_content
            containerContent.style.top = bannerRect.bottom + '400px';
        } else {
            containerContent.style.display = 'none'; // Ẩn container_content
        }
    
        // Khi cuộn trang đã đạt đến cuối của foodBoxContainer
        if (scrollPosition + windowHeight >= foodBoxContainerHeight) {
            banner.style.position = 'absolute';
            banner.style.top = windowHeight - bannerRect.height + '0px';
        } else if (banner.style.position === 'absolute') {
            banner.style.position = '';
            banner.style.top = '';
        }
    });
 


   // <!-- js tính năng cho nut tăng giảm số lượng -->1

    const quantityContainers = document.querySelectorAll(".btn.cart.quantity");

    quantityContainers.forEach(quantityContainer => {
        const plus = quantityContainer.querySelector(".plus");
        const minus = quantityContainer.querySelector(".minus");
        const input = quantityContainer.querySelector(".num");

        let val = parseInt(input.value);

        plus.addEventListener("click", () => {
            val++;
            updateValue();
        });

        minus.addEventListener("click", () => {
            if (val > 0) {
                val--;
                updateValue();
            }
        });

        function updateValue() {
            input.value = val;
        }
    });
    

    // <!-- js hiển thị phần con của menu -->1
    
    function showFoodbox(foodType) {
        var foodBoxes = document.getElementsByClassName('product');

        // Ẩn tất cả các box trước khi hiển thị box mới
        for (var i = 0; i < foodBoxes.length; i++) {
            foodBoxes[i].style.display = 'none';
        }


        // Hiển thị box tương ứng với loại thức ăn
        var selectedFoodBox = document.getElementById(foodType);
        if (selectedFoodBox) {
            selectedFoodBox.style.display = 'block';

        } else {
            console.log("Không tìm thấy box với id: " + foodType);
        }
    };
   
    
    

    
    
  
 




    // <!-- js hiển thị phần chức nang cuộn cho header -->
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
 

    // <!-- // JavaScript để điều khiển Offcanvas và Dropdown -->
 
    function toggleOffcanvas() {
        var offcanvas = document.getElementById("offcanvasExample");
        offcanvas.classList.toggle("active");
    }

    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("active");
        dropdownMenu.style.display = dropdownMenu.classList.contains("active") ? "block" : "none";
    }
 
