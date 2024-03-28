<?php
require_once '../config/init.php';
require_once '../services/userService.php';
require_once '../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
$userService = new UserService();
 
$users = $userService->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link href="../resource/static/css/adminView.css" rel="stylesheet" type="text/css">
    <script src="../resource/static/js/hideAndShow.js" type="text/javascript"></script>

</head>

<body>
    <div class="bodyy">
        <?php include "../resource/frame/sidebarAdmin.php"; ?>
        <div class="body-content container-fluid">
            <div class="container-fluid content-header">
                <span>Danh sách người dùng</span>
               
            </div>
            <div class="container-fluid aa">
                <table class="table table-striped table-container" style="border-radius: 20px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Email</th>
                            <th scope="col">Vai trò</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?= $user->getId(); ?></th>
                            <td><?= $user->getId(); ?></td>
                            <td><?= $user->getUsername(); ?></td>
                            <td><?= "********" ?></td>
                            <td><?= $user->getEmail(); ?></td>
                            <td><?= $user->getRoleId(); ?></td>
                            <td>
                                <div class="col ml-1">
                                    <!-- Add your actions/buttons here -->
                                </div>
                                <div class="col ml-1">
                                    <button class="btn btn-outline-success" type="button"
                                        onclick="ddelete(<? echo $user->getId(); ?>)">Xóa</button>
                                    <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                        data-bs-target="#userEditModal"
                                        onclick="getid(<? echo $user->getId(); ?>)">Sửa</button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="form-delete" action="../controllers/userDelCon.php" method="post">
                    <input type="hidden" id="id" name="id" value="">
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa thông tin người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form class="input-from" action="../controllers/userChgCon.php" method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <!-- Nội dung chỉnh sửa sản phẩm -->
                    
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Tên </label>
                            <input type="text" id="name" name="name" class="form-control col" placeholder=" nhập tên">

                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-2 col-form-label">Mật khẩu</label>
                            <input type="text" id="password" name="password" class="form-control col"
                                placeholder=" nhập pass">
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control col"
                                placeholder=" nhập email">
                        </div>
                        <div class="mb-3 row">
                            <label for="role_id" class="col-sm-2 col-form-label ">vai trò</label>
                            <div class="col">
                                <select class="form-select" aria-label="role_id" name="role_id">
                                     <option value="1">Admin</option>
                                    <option value="2">User</option>

                                </select>

                            </div>

                        </div>
                        <input type="hidden" id="id1" name="id1">

                        <!-- Thêm các trường chỉnh sửa khác tùy thuộc vào cần thiết -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <input type="submit" class="btn btn-primary" type="submit" value="Lưu thay đổi" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>