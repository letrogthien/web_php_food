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

    /* CSS cho phân trang */
    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ccc;
        margin: 0 4px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination a:hover {
        background-color: #f2f2f2;
    }

    /* CSS cho phần hiển thị trang hiện tại */
    .page-info {
        margin-top: 10px;
        text-align: center;
        font-size: 14px;
        color: #666;
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
                        $("#live_search").focusout(function() {
                            $('#search_result').css('display', 'none');
                        });
                        $("#live_search").focusin(function() {
                            $('#search_result').css('display', 'block');
                        });
                        addCssClassToResults();
                    }
                });
            } else {
                $('#search_result').css('display', 'none');
            }
        });
    });

    function addCssClassToResults() {
        $('#search_result > div').addClass('search_result_item');
    }
    </script>

    <div id="wraper">
        <!--background-->
        <div id="banner"></div>
        <!-- <header>   </header> -->
        <?
        require_once'../views/headertest.php';
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
                                <?php
                                    // Số lượng sản phẩm trên mỗi trang
                                    $so_san_pham_moi_trang = 4;

                                    // Tính tổng số sản phẩm
                                    if (!isset($_GET["categoryShow"])) {
                                        $tong_so_san_pham = $productService->getProductCount();
                                        // Tính tổng số trang
                                        $tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_moi_trang);

                                        // Lấy trang hiện tại từ tham số truy vấn
                                        $trang_hien_tai = isset($_GET['page']) ? $_GET['page'] : 1;


                                        // Tính toán vị trí bắt đầu của sản phẩm trên trang hiện tại
                                        $bat_dau_tu = ($trang_hien_tai - 1) * $so_san_pham_moi_trang;
                                        $products = $productService->getProductsPerPage($bat_dau_tu, $so_san_pham_moi_trang);
                                        $categoryShow=null;
                                    } else {
                                        $tong_so_san_pham = $productService->getProductCountByFoodType($_GET["categoryShow"]);                                        
                                        $tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_moi_trang);
                                        $trang_hien_tai = isset($_GET['page']) ? $_GET['page'] : 1;                                        
                                        $bat_dau_tu = ($trang_hien_tai - 1) * $so_san_pham_moi_trang;
                                        $products = $productService->getProductsByCategoryIdPerPage($_GET["categoryShow"], $bat_dau_tu, $so_san_pham_moi_trang);
                                        $categoryShow=$_GET["categoryShow"];
                                    }
                                    // Hiển thị sản phẩm trên trang hiện tại
                                    echo '<div class="product" id="mon_nuoc"><ul class="milktea">';
                                    foreach ($products as $product):
                                    ?>
                                <li>
                                    <div class="item">
                                        <div class="product-top">
                                            <a href="productDetail.php?id=<?= $product->getId() ?>" class="thump">
                                                <img src="../resource/static/img/<?php echo $product->getImage() ?>"
                                                    alt="san pham">
                                            </a>
                                            <?php if (!empty($sessionData)) { ?>
                                            <form name="cartForm" id="cartForm"
                                                action="../controllers/addToCartItemController.php" method="post">
                                                <div class="btn cart quantity">
                                                    <span class="minus">-</span>
                                                    <input name="input_quantity" value="01" class="num"
                                                        style="width: 30px; background:none; border:none" readonly>
                                                    <span class="plus">+</span>
                                                </div>
                                                <input type="hidden" id="cart_id" name="cart_id"
                                                    value="<?= $cartInfor->getId() ?>">
                                                <input type="hidden" id="id1" name="id1" value="">
                                                <button class="btn buy" type="button" name="add_cart" value="Add cart"
                                                    onclick="getid(<?= $product->getId() ?>)">Add cart</button>
                                            </form>
                                            <?php } ?>
                                        </div>
                                        <div class="product-info">
                                            <a href="" class="product-name"><?= $product->getName() ?></a>
                                            <div class="product-price"><?= $product->getPrice() ?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>





                        </ul>
                    </div>


                </div>



                <!-- /* phân trang cho danh mục sản phẩm  */ -->
                <div class="pagination">
                    <?php for ($i = 1; $i <= $tong_so_trang; $i++) : ?>
                    <?php 
                        // Xác định URL cho liên kết phân trang
                        $url = "?page=$i";
                        if(isset($_GET['categoryShow'])) {
                            $url .= "&categoryShow=" . $_GET['categoryShow'];
                        }
                    ?>
                    <a href="<?= $url ?>"><?= $i ?></a>
                    <?php endfor; ?>
                </div>

            </div>
        </div>


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
            <p>Cả hai nhé, chỉ với vài thao tác đơn giản và một vài phút thì những món ăn ngon nhất sẻ được chuẩn bị và
                giao đến tay bạn.
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


    <!-- link file footer-->
    <?   require_once'../views/footer.php'; ?>

    <!-- javascript cho index -->

    <script src="../resource/static/js/index.js"></script>
    <script src="../resource/static/js/header.js"></script>



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