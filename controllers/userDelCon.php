<?
require_once '../services/userService.php';
require_once '../models/checkuser.php';
 $checkSession= new Checkuser();
 if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
    $userService = new UserService();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         $result=$userService->deleteUserById($id);
         if($result){
          header("Location: ../views/adminWithUser.php");
           exit;

         } else {
          header("Location: ../views/404.php");
          exit();
      }
       
     
    }else {
     header("Location: ../views/404.php");
     exit();
 }