<?require_once'../controllers/productController.php';
require '../services/CartService.php';
require '../services/cartItemService.php';
//require_once '../config/init.php';

    $productController=new ProductController();
    $products=$productController->getAllProduct();

    $productService = new ProductService();

    require '../services/userService.php';
    $userService = new UserService();
    $sessionData = $userService->getSession();


    if(!empty($sessionData)){

    
    $userId=$sessionData['id'];
            
    
    $cartService= new CartService();
    $cartInfor=$cartService->getCartByUserId($userId);


  
    $cartItemService = new CartItemService();
    $cartItems= $cartItemService->getItemWithCartId($cartInfor->getId());
    $totalPrice=$cartItemService->getTotalAmountInCart($cartInfor->getId());
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resource/static/css/style.css">
    <link rel="stylesheet" href="../resource/static/css/cart.css">
    <title>Document</title>


</head>

<body>


    <header>
        <div class="inner-header container">
            <a href="../views/test.php" class="logo">WEFOOD</a>
            <nav>
                <ul id="main-menu">
                    <li id="milktea"><a href="../views/test.php?categoryShow=1" onclick="">Món Nước</a></li>
                    <li><a href="../views/test.php?categoryShow=2">Món Khô</a></li>
                    <li><a href="../views/test.php?categoryShow=3" onclick="">Thức Uống</a></li>
                    <li><a href="../views/test.php?categoryShow=4" onclick="">Tráng Miệng</a></li>
                </ul>
            </nav>

            <?
                    
                    if (!empty($sessionData['name']) && !empty($sessionData['id']) && !empty($sessionData['role_id'])) {
                        // Người dùng đã đăng nhập                      
                        echo ' 
                            <!-- Nút kích hoạt Offcanvas -->                   
                            <button class="btn-primary button-cart" type="button" onclick="toggleOffcanvas()"
                            style="background: none; border:none;"
                            >
                                <img id="cart_icon" src="../resource/static/img/shopping-cart.png">
                                <span>'.$cartItemService->getQuantityWithCartId($cartInfor->getId()).'</span>
                            </button>

                            <!-- Offcanvas -->
                            <div class="offcanvas" id="offcanvasExample">
                                <span class="close-btn" onclick="toggleOffcanvas()">X</span>
                                <h1 class="title">Shopping Cart</h1>
                                
                                <div class="list_cart">';
                                    // Hiển thị các sản phẩm trong giỏ hàng
                                    if (!empty($cartItems)) {
                                        foreach ($cartItems as $cartItem) {
                                            echo'
                                                <div class="cart_item">
                                                    <img src="'.$productService->getProductById($cartItem->getProductId())->getImage().'" alt="">
                                                    <div class="cart_name">'.$productService->getProductById($cartItem->getProductId())->getName().'</div>   
                                                    <div class="mid_quan_pri"> 
                                                        <div class="quantity"> 
                                                            <span>'.$cartItem->getQuantity().'</span>                                                     
                                                            <span> x </span>
                                                        </div>
                                                        <div class="totalPrice">'.$productService->getProductById($cartItem->getProductId())->getPrice() * $cartItem->getQuantity().'</div>
                                                    </div>           
                                                    <form class="input-from" action="../controllers/cartItemController.php" method="post"
                                                    enctype="multipart/form-data">
                                                     
                                                    
                                                    <input type="hidden"  name="id" value="'.$cartItem->getId().'">

                                                    </form>
                                                </div>

                                                
                                            ';

                                            // echo '<div class="cart_item">
                                            //         <img src="' . $item['product_image'] . '" alt="">
                                            //         <div class="cart_name">' . $item['product_name'] . '</div>
                                            //         <div class="totalPrice">' . $item['product_price'] . '</div>
                                            //         <div class="quantity">                                                      
                                            //             <span>' . $item['quantity'] . '</span>
                                            //         </div>
                                            //         <div class="clear_item">X</div>
                                            //     </div>';
                                        }
                                    } else {
                                        echo'<h1 class="titlee">Thêm sản phẩm vào giỏ hàng!!</h1>';
                                    }
                                            echo '    
                                         
                                </div>
                                <div class="checkout">
                                    <div class="total">
                                        <p>Thành tiền :</p>
                                        <div class="sub_total">'.$totalPrice.'</div>                
                                    </div>
                                    
                                        <div class="btn_payment">
                                            <a href="../views/userCart.php" class="view_cart">
                                                <button class="view_cart"> Chỉnh sửa </button>
                                            </a>
                                            <a href="../views/userCart.php" class="Payment">
                                                <button class="Payment" > Thanh toán </button>
                                            </a>
                                            
                                        </div>
                        
                                </div>
                            </div>



        
                            <button id="avt_users">
                                    <img src="" alt="" class="">
                            </button>
                            <div class="user_info">
                                <div class="mid_user_info">
                                    <ul class="users_info">
                                        <li>
                                            <ul class="logo_name">
                                                <li id="logo_info"><img src="" alt="" class=""></li>
                                                
                                                <li id="name_info">'.  $sessionData['name'] .'</li>
                                            </ul>
                                        </li>
                                        
                                        <li id="email">'.  $sessionData['id'] .'</li>
                                        <li><a href="userProfile.php">Profile</a></li>
                                        <li><a href="../controllers/logoutController.php">Đăng xuất</a></li>
                                    </ul>
                                </div>   
                            </div>
                        ';
                    } else {
                        // Người dùng chưa đăng nhập
                        echo '
                            <a href="../views/login.php" id="lg_lo">
                                <button class="login_signup">Đăng nhập/Đăng ký</button>
                            </a>'
                        ;
                    }

                    // Kiểm tra nếu người dùng chọn đăng xuất


                ?>

    </header>
    <script>
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
    </script>
    <!-- js hiển thị phần chức nang cuộn cho header -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('header').addClass('sticky');
            } else {
                $('header').removeClass('sticky');
            }
        });
    });
    </script>

    <!-- // JavaScript để điều khiển Offcanvas và Dropdown -->
    <script>
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