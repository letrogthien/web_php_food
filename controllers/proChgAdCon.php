<? require_once '../services/productService.php';
require_once '../models/checkuser.php';
require_once '../services/uploadService.php';

$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}

$upload = new UploadService();
$img=$upload->upload();
$productService = new ProductService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if($_POST['price']!="" && !is_numeric($_POST['price'])){
        echo "<script>alert('Vui lòng nhập đúng kiểu dữ liệu cho các trường giá');  window.history.back();</script>";
    } else {
        $name = $_POST['name'];
        $id = $_POST['id1'];
        $category_id =$_POST['category'];
        $price=$_POST['price'];
        $description=$_POST['descrip'];
        if($productService->changeProduct($id,$name, $category_id, $price, $img, $description)){
            echo "<script>window.history.back();</script>";
            exit();
        } 

    }
    

}  else {
    header("Location: ../views/404.php");
    exit;
}