<?
require_once '../services/bestsellerService.php';
$a= new BestsellerService();
$salelist= $a->getTop5Bestsellers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script> -->
    <link rel="stylesheet" href="../resource/static/css/style.css">
    <link rel="stylesheet" href="../resource/static/css/cart.css">
    <link rel="stylesheet" href="../resource/static/css/panigation.css">

    <title>WEFOOD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <script src="../resource/static/js/index.js" type="text/javascript"> </script>
    <style>
    /* width */
    ::-webkit-scrollbar {
        width: 0;
    }
    </style>
</head>

<body>
    <!-- realtime search tai index -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $("#live_search").keyup(function() {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: '../controllers/indexLiveSearch.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });

    // Bắt sự kiện khi click vào một liên kết trong kết quả tìm kiếm
    $(document).on('click', '.search_result_item a', function(e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
        var url = $(this).attr('href'); // Lấy đường dẫn từ thuộc tính href của liên kết
        window.location.href = url; // Chuyển hướng trình duyệt đến URL được nhấp
    });
});
    </script>

    <div id="wraper">
        <!--background-->
        <div id="banner"></div>
        <!-- <header>   </header> -->
        <?
        require_once'../views/header.php';
        ?>
        <div class="content" style="height: 110vh !important;">


            <div class="box_content_left">
                <!--muc tim kiem cac san pham-->
                <div class="search_info">
                    <h2>Đặt đồ ăn nhanh chóng ... </h2>
                    <input class="search" type="text" name="live_search" id="live_search"
                        placeholder="Tìm địa điểm, món ăn, đồ uống,..." />
                    <button class="btn_search">Tìm</button>
                    <div id="search_result"></div>
                </div>

                <!-- 3 hình ảnh thêm về thông tin uy tín của trang web-->
                <div class="box-info-web">
                    <div class="box-info-web-1">
                        <p id="p1">Siêu Ưu Đãi</p>
                        <p id="p2"> 50 %</p>
                        <link rel="stylesheet" href="xem thêm" class="">
                    </div>

                    <div class="box-info-web-2">
                        <span>
                            <img src="../resource/static/img/star.png" alt="">
                        </span>
                        <span>
                            <img src="../resource/static/img/star.png" alt="">
                        </span>
                        <span>
                            <img src="../resource/static/img/star.png" alt="">
                        </span>
                        <span>
                            <img src="../resource/static/img/star.png" alt="">
                        </span>
                        <span>
                            <img src="../resource/static/img/star.png" alt="">
                        </span>

                        <p>Hơn 500 luợt đánh giá 5 sao</p>
                    </div>

                    <div class="box-info-web-3">
                        <p id="p1">Phản Hồi</p>
                        <p id="p2">Hơn 600 phản hồi tích cực!</p>
                    </div>
                </div>

            </div>
            <div class="box_content_right">
                <!-- địa chỉ giao hàng -->
                <!-- <div class="address">
                    <h2>Thay đổi địa chỉ giao hàng </h2>
                    <input class="set-address" type="text" name="set-address"
                        placeholder="Nhập địa chỉ giao hàng,..." />
                    <button class="btn_address">ĐỔI</button>
                    <button class="btn_address">Mặc định</button>
                </div> -->

                <!--cac san pham cua mot menu-->
                <div id="FoodBoxContainer">
                    <div class="mid_foodbox" style="overflow-y: auto; height : 90vh">
                        <!-- traf sua -->
                        <div class="product" id="mon_nuoc">
                            <ul class="milktea">

                                <?php foreach ($products as $product): ?>
                                <?php if ($product->getCategoryId() == 1): ?>
                                <li>
                                    <div class="item">
                                        <div class="product-top">
                                            <a href="productDetail.php?id=<?echo $product->getid()?>" class="thump">
                                                <img src="../resource/static/img/<?php echo $product->getImage() ?>"
                                                    alt="san pham">
                                            </a>
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class=" cart quantity">
                                                    <!-- <span class="minus">-</span> -->
                                                    <input type="hidden" name="input_quantity" value="01" class="num">
                                                    <!-- <span class="plus">+</span> -->
                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?php echo $product->getId(); ?>)">Thêm</button>
                                            </form>
                                            <?php } ?>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><?= $product->getName() ?></a>
                                            <div class="product-price"><?= $product->getPrice() ;echo" VND"?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>


                            </ul>
                        </div>

                        <!-- anư vặt -->
                        <div class="product" id="mon_kho">

                            <ul class="milktea">
                                <?php foreach ($products as $product): ?>
                                <?php if ($product->getCategoryId() == 2): ?>
                                <li>
                                    <div class="item">
                                        <div class="product-top">
                                            <a href="" class="thump">
                                            <img src="../resource/static/img/<?php echo $product->getImage() ?>"
                                                    alt="san pham">
                                            </a>
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class=" cart quantity">

                                                     <!-- <span class="minus">-</span> -->
                                                     <input type="hidden" name="input_quantity" value="01" class="num">
                                                    <!-- <span class="plus">+</span> -->

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?php echo $product->getId(); ?>)">Thêm</button>
                                            </form>
                                            <?php } ?>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><?= $product->getName()?></a>
                                            <div class="product-price"><?= $product->getPrice() ;echo " VND"?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- đô uống -->
                        <div class="product" id="thuc_uong">

                            <ul class="milktea">
                                <?php foreach ($products as $product): ?>
                                <?php if ($product->getCategoryId() == 3): ?>
                                <li>
                                    <div class="item">
                                        <div class="product-top">
                                            <a href="" class="thump">
                                            <img src="../resource/static/img/<?php echo $product->getImage() ?>"
                                                    alt="san pham">
                                            </a>
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="cart quantity">

                                                     <!-- <span class="minus">-</span> -->
                                                     <input type="hidden" name="input_quantity" value="01" class="num">
                                                    <!-- <span class="plus">+</span> -->

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?php echo $product->getId(); ?>)">Thêm</button>
                                            </form>
                                            <?php } ?>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><?= $product->getName() ?></a>
                                            <div class="product-price"><?= $product->getPrice() ;echo " VND"?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- trang mieng -->
                        <div class="product" id="trang_mieng">

                            <ul class="milktea">
                                <?php foreach ($products as $product): ?>
                                <?php if ($product->getCategoryId() == 4): ?>
                                <li>
                                    <div class="item">
                                        <div class="product-top">
                                            <a href="" class="thump">
                                            <img src="../resource/static/img/<?php echo $product->getImage() ?>"
                                                    alt="san pham">
                                            </a>
                                            <?php if(!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class=" cart quantity">

                                                     <!-- <span class="minus">-</span> -->
                                                     <input type="hidden" name="input_quantity" value="01" class="num">
                                                    <!-- <span class="plus">+</span> -->

                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?php echo $cartInfor->getId(); ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?php echo $product->getId(); ?>)">Thêm</button>
                                            </form>
                                            <?php } ?>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><?= $product->getName() ?></a>
                                            <div class="product-price"><?= $product->getPrice() ;echo " VND"?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                    

                    


                    <!-- /* phân trang cho danh mục sản phẩm  */ --> 
                    <? $tong_so_san_pham = $productService->getProductCount()/4;
                        $tong_so_trang = ceil($tong_so_san_pham / 4);
                    ?> 

                    <div class="pagination">
                        <div class="pagination_item">
                            <div class="pagination_items left" onclick="backBtn()"><</div>
                            <ul>
                                <?php for ($i = 1; $i <= $tong_so_trang; $i++): ?>
                                    <li class="link <?php echo ($i == 1) ? 'active' : ''; ?>" value="<?php echo $i; ?>" onclick="activeLink(); paginateProducts(<?php echo $i; ?>);"><?php echo $i; ?></li>
                                <?php endfor; ?>
                            </ul>
                            <div class="pagination_items right" onclick="nextBtn()">></div>
                        </div>
                    </div>
                                  
                
                </div>
            </div>


        </div>

         
            
        </div>
<!-- thanh hien thi mat hang best -->
<div class="best_seller_box">
            <div class="text-bestseler">
                <span>B</span>
                <span>e</span>
                <span>s</span>
                <span>t</span>
                <span>s</span>
                <span>e</span>
                <span>l</span>
                <span>l</span>
                <span>e</span>
                <span>r</span>
            </div>


            <div class="products_bestseller">
                <ul class="products_list">
                <?php 
                foreach ($salelist as $sale): $prtmp=new ProductService(); ?>
                    <li>
                            <div class="item">
                            <div class="product-top">
                                <a href="productDetail.php?id=<?echo $sale->getId()?>" class="thump">
                                    <img src="../resource/static/img/image.png" alt="san pham">
                                </a>
                                <button class="btn buy">Mua ngay</button>
                            </div>
                            
                            <div class="product-info">
                                    <a href="" class="product-name"><?echo $prtmp->getProductById($sale->getId())->getName()?></a>
                                    <div class="product-price"><?echo $prtmp->getProductById($sale->getId())->getPrice();echo " VND"?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>

                </ul>
            </div>

        </div>

        <!-- phần chân giới thiệu trang web -->
        <div class="introduce_web">
            <div class="introduce_box wefood">
                <h1>Wefood là gì</h1>
                <p>Là trang web được tạo nên bởi 4 đôi bàn tay
                    với ý nghĩa mang đến những món ăn, thức uống ngon nhất đến với tất cả mọi người.
                </p>                             
            </div>  
            <div class="mui_ten">
                <img src="../resource/static/img/mui_ten.png" alt="muix tên">
            </div> 
            
            <div class="introduce_box wefood">                
                <p>Cả hai nhé, chỉ với vài thao tác đơn giản và một vài phút thì những món ăn ngon nhất sẻ được chuẩn bị và giao đến tay bạn.
                </p> 
                <h1>Nhanh chóng hay tiện lợi</h1>                            
            </div>  
            <div class="mui_ten">
                <img src="../resource/static/img/mui_ten.png" alt="muix tên">
            </div>

            <div class="introduce_box wefood3">
                <h1>Sẽ chán Ư ??</h1>
                <p>Bạn không cần phải lo về điều này, Menu của chúng tôi đa dạng các món ăn thức uống và
                     với quy trình cập nhật thêm nhiều món ăn thì sẻ có nhiều sự lựa chọn hơn cho bạn đây nhé .
                </p>                             
            </div>

            <div class="end_text"> Vậy còn chần chờ gì nửa, hãy đặt ngay cho bản thân, gia đình và bạn bè
                 những món ăn, thức uống ngon nhất ngay nào!!
            </div>
        </div>    
        <div class="icon_chat">
            <a class="space_icon" href="../views/chat.php">
                <img src="../resource/static/img/chat.png" alt="chat"">
            </a>
        </div>


        <!-- link file footer-->
        <?   require_once'../views/footer.php'; ?>  
                                        
<!-- javascript cho index -->

<script src="../resource/static/js/index.js"></script>
<script src="../resource/static/js/header.js"></script>

<!-- javascript choj pagination -->
<script>
    let sotrang = <?php echo $tong_so_trang; ?>;
    let link = document.getElementsByClassName("link");
    let currentValue = 1;
    let productsPerPage = 4;
    function activeLink(){
        for(l of link){
            l.classList.remove("active");
        }
        event.target.classList.add("active");
        currentValue = parseInt(event.target.getAttribute("value"));
        paginateProducts(currentValue);
    }

    function backBtn(){
        if(currentValue > 1){
            for(l of link){
                l.classList.remove("active");           
            }
            currentValue--;
            link[currentValue-1].classList.add("active");
            paginateProducts(currentValue);
        }     
    }

    function nextBtn(){
        if(currentValue < sotrang){
            for(l of link){
                l.classList.remove("active");           
            }
            currentValue++;
            link[currentValue-1].classList.add("active");
            paginateProducts(currentValue);
            console.log(currentValue);
        }
    }

    let currentFoodType = "";

    function paginateProducts(page) {
    let productsPerPage = 4;
    let startIndex = (page - 1) * productsPerPage;
    let endIndex = startIndex + productsPerPage;
    let visibleProducts = document.querySelectorAll('.product#' + currentFoodType + ' li');

    for (let i = 0; i < visibleProducts.length; i++) {
        visibleProducts[i].style.display = "none";
    }

    // Hiển thị các sản phẩm ở phạm vi từ startIndex đến endIndex
    for (let i = startIndex; i < endIndex && i < visibleProducts.length; i++) {
        visibleProducts[i].style.display = "block";
    }
}



</script>

<!-- js lấy id từ form -->
    <script>
    function getid(productid) {
        document.getElementById('id1').value = productid;
        document.getElementById('cartForm').submit();
    }
    </script>
    <script>
    function getcartid(cart_id) {
        document.getElementById('cart_id').value = cart_id;
    }

    //<!-- js hiển thị phần con của menu -->
    

    function showFoodbox(foodType) {
        var foodBoxes = document.getElementsByClassName('product');

        // Ẩn tất cả các box trước khi hiển thị box mới
        for (var i = 0; i < foodBoxes.length; i++) {
            foodBoxes[i].style.display = 'none';
        }

        currentFoodType = foodType;
        paginateProducts(1);
        // Hiển thị box tương ứng với loại thức ăn
        var selectedFoodBox = document.getElementById(foodType);
        if (selectedFoodBox) {
            selectedFoodBox.style.display = 'block';        
            console.log(foodType);

        } else {
            console.log("Không tìm thấy box với id: " + foodType);
        }
        for (var i = 0; i < link.length; i++) {
            link[i].classList.remove("active");
        }
        link[0].classList.add("active");
    }
    window.onload = function() {
        showFoodbox('mon_nuoc');
    };
    </script>


 <!-- js tính năng cho nut tăng giảm số lượng -->1
<script>

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
</script>








    <!-- js tính năng cuộn background theo danh mục sanr phẩm-->
    <script>
    window.addEventListener('scroll', function() {
        var foodBoxContainer = document.getElementById('FoodBoxContainer');
        var banner = document.getElementById("banner");


        var foodBoxContainerRect = foodBoxContainer.getBoundingClientRect();
        var windowHeight = window.innerHeight;

        // Khi phần tử FoodBoxContainer được kéo đến cuối trang
        if (foodBoxContainerRect.bottom <= windowHeight) {
            banner.style.position = 'absolute';
        } else {
            banner.style.position = ''; // Trả về giá trị mặc định của position
        }
    });
    </script>
   









</body>

</html>