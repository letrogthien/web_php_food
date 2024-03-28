<? 
require_once '../config/init.php';
require_once'../services/billService.php';
require_once'../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}

$billService = new BillService();

    $bills = $billService->getAllBill();


$count = 1;

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <link href="../resource/static/css/adminView.css " rel="stylesheet" type="text/css">
    <script src="../resource/static/js/hideAndShow.js" type="text/javascript"> </script>
    <script>


    </script>

</head>

<body>
    <div class="bodyy">
        <? include "../resource/frame/sidebarAdmin.php" ?>
        <div class="body-content container-fluid">
            <div class="container-fluid content-header">
                <span>Danh sách hóa đơn Chưa Xác Nhận</span>
                
            </div>
            <div class="container-fluid aa">

                <table class="table table-striped table-container" style="border-radius: 20px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">ID Giỏ </th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bills as $bill):  ?>
                        <tr>
                            <th scope="row">
                                <?php echo $count ?>
                            </th>
                            <td>
                                <?php echo $bill->getId() ?>
                            </td>
                            <td>
                                <?php echo $bill->getCartId() ?>
                            </td>
                            <td>
                                <?php echo $bill->getTotalPrice();echo" VND" ?>
                            </td>
                            <td>
                                <?php echo $bill->getDiaChi() ?>
                            </td>
                            <td>
                                <?php echo $bill->getNgayTao() ?>
                            </td>

                            <td>
                                <?php echo $bill->getStatus() ?>
                            </td>
                            <td>
                                <div class="row">
                                    
                                    <div class="col ml-1">
                                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#bill-re" onclick="comfirm(<?echo $bill->getId()?>,<?echo $bill->getCartId()?>)">Xác Nhận</button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                       
                        <?php  endforeach;?>
                    </tbody>
                </table>


                <script>
                function comfirm(billid,cart_id) {
                    document.getElementById('id1').value = billid;
                    document.getElementById('cart_id').value = cart_id;

                }

                function comfirmBill() {
                    var confirmation = confirm("Bạn có chắc muốn xác nhận hóa đơn không?");
                    if (confirmation) {
                        document.getElementById('comfirm-bill').submit();
                    }

                }
                </script>



            </div>
            <div class="modal fade" id="bill-re" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="input-from" id="comfirm-bill" action="../controllers/billComfirmController.php" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3 row">
                                    <label for="transport" class="col-sm-2 col-form-label ">Đơn vị V/C</label>
                                    <div class="col">
                                        <select class="form-select" aria-label="transport" name="transport">
                                           
                                            <option value="1">Giao hàng nhanh</option>
                                            <option value="2">Viettel Post</option>
                                            <option value="3">Giao hàng tiết kiệm</option>
                                            <option value="4">GrabExpress</option>
                                            <option value="5">NowShip</option>
                                        </select>

                                    </div>

                                </div>
                                <input type="hidden" id="id1" name="id1">
                                <input type="hidden" id="bill_id" name="bill_id">
                                <input type="hidden" id="cart_id" name="cart_id">





                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-primary" onclick="comfirmBill()">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>



    </div>


</body>

</html>