<!DOCTYPE html>
<html lang="en">
<?




?>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
    .product-container {
        display: flex;
        border: 1px solid #ddd;
    }

    .product-image {
        flex: 0 0 40%;
        border-right: 1px solid #ddd;
    }

    .product-info {
        flex: 0 0 50%;
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
        /* Align content to the left */
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .product-info h2,
    .product-info p {
        color: black;
    }

    .quantity-control {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .quantity-control button {
        padding: 5px 10px;
    }

    .quantity-control label {
        color: black;
    }


    .action-buttons {
        display: flex;
        justify-content: flex-start;
        gap: 10px;
    }

    .btn-primary {
        min-width: 380px;
    }

    .btn-secondary:hover {
        background-color: #ffffff;
        border-color: #04AA6D;
        color: #04AA6D;
        box-shadow: 0 0 0 1px #04AA6D;
    }


    .btn-primary:hover {
        background-color: #ffffff;
        border-color: #04AA6D;
        color: #04AA6D;
        box-shadow: 0 0 0 1px #04AA6D;
    }

    .mid_header{
        width: auto;
        height: 80.8px;
        background: linear-gradient(to bottom, #4e5459, #a5adb3);;
    }
ul#main-menu a.active_1{
    border-bottom: none !important;
}

    </style>
    

</head>



<body>
<?require_once'../views/header.php'; ?>

    <?php   
    $product = $productService->getProductById($_GET['id']);   
?>

    <div class="mid_header"></div>

    <div class="container row" style="height: 900px; background-color: #ffff ;">
        

        <div class="container left col" style="display: flex; align-items: center;">

            <!-- <img src="../resource/static/img/ts.png" alt="Product Image" class="img-fluid" style="width: 350px; height: 350px;
            margin-left: auto; display: block;margin-right: 15%;
            "> -->
            <img src="../resource/static/img/<?php echo $product->getImage(); ?>" alt="Product Image" class="img-fluid" style="width: 350px; height: 350px;
            margin-left: auto; display: block;margin-right: 15%; object-fit: cover; border-radius: 5px;">


        </div>
        <div class="container col">
            <div class="product-info" style="margin-top: 25%; ">
                <h2 class="my-4"><?php echo $product->getName(); ?></h2>
                <p class="lead">Giá: <?php echo $product->getPrice() ;echo" VND" ?></p>
                <p>Mô tả: <?php echo $product->getDescription(); ?></p>
                <form name="cartForm" id="cartForm" action="../controllers/addToCartItemController.php" method="POST">
                <div class="form-group quantity-control">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="input_quantity" class="form-control" value="1" min="1">
                    <div class="action-buttons">
                        <button class="btn btn-secondary" onclick=" event.preventDefault(); decreaseQuantity()">-</button>
                        <button class="btn btn-secondary" onclick="event.preventDefault(); increaseQuantity()">+</button>
                    </div>
                </div>
                <input type="hidden" id="cart_id" name="cart_id" value="<?php echo $cartInfor->getId(); ?>">
                <input type="hidden" id="id1" name="id1" value="<?=$product->getId()?>">
                </form>
                <div class="action-buttons">
                    <button class="btn btn-primary" onclick="addToCart()">Thêm vào giỏ</button>
                </div>
            </div>
        </div>

    </div>

    <script>
    function addToCart() {
        // Lấy số lượng từ input
        var quantity = document.getElementById('quantity').value;
        var confirmation = confirm("Bạn có chắc muốn thêm sản phẩm vào giỏ không?");
        if (confirmation) {
            document.getElementById('cartForm').submit();
            alert('Đã thêm ' + quantity + ' sản phẩm vào giỏ hàng.');
        }else {
            alert('Đã hủy');
        }
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }

    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }
    </script>
    <?php include 'footer.php'; ?>
</body>

</html>