<?
require_once'../services/userService.php';
class LoginController{
    private $userService;
    public function __construct(){
        $this->userService=new UserService();
    }
    public function login($username,$password){
        $this->userService->clearSession();
        if ($this->userService->authUser($username,$password))
        {
            ini_set('session.gc_maxlifetime', 6000);
            $this->userService->setSession($username);
            header("Location: ../views/index.php");
        }
        else {
            echo '<script>alert("Đăng nhập thất bại. Sai tên đăng nhập hoặc mật khẩu.");</script>';
            echo '<script>window.location.href = "../views/login.php";</script>';
        }
    }

}


$loginController=new LoginController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loginController->login($username, $password);
}