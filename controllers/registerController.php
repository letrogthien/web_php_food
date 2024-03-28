<?
require_once '../services/userService.php';
require_once '../services/cartService.php';
 class RegisterController {
    private $userService;
    private $cartService;
    public function __construct(){
        $this->userService = new UserService();
        $this->cartService = new CartService();
    }

    public function signup($username, $password, $email ){
        if($this->userService->getUserByName($username)==null){
            $add=$this->userService->addUserToDataBase($username,$password,$email);
            $this->cartService->addUserWithCart($this->userService->getIdByUsername($username));
            if($add){
                $this->userService->clearSession();
                $this->userService->startSession();
                $this->userService->setSession($username);
                header("Location: ../views/index.php");
                exit;
                
            }
            else{
               
                header("Location: ../views/404.php");
                exit();
                
                
            }
            
        }
        else {
            echo "<script>alert('tài khoản đã có người sử dụng');  window.history.back();</script>";

        }
    }


 }
 $registerController=new RegisterController();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    $registerController->signup($username,$password,$email);
    
}


