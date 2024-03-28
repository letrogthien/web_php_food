 <?
 require_once '../database/database.php';
 require_once '../models/cart.php';
 class CartService{
    private $conn;
    public function __construct() {
        $this->conn= new Database();
    }

    public function addUserWithCart($user_id) {
        try{
            $sql="INSERT INTO `cart` (user_id) VALUES (:user_id)";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':user_id',$user_id);
            $result->execute();
            if($result){
                return true;
            } else {
                return false;
            }
        }catch (PDOException $e) {
                throw $e;
        }
    }
    public function getCartByUserId($user_id){
        try{
        $sql="SELECT * FROM `cart` WHERE user_id=:user_id ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':user_id',$user_id);
        $result->execute();
        if ($result) {
            $cartif = $result->fetch(PDO::FETCH_ASSOC); 
            if ($cartif) {
               
                $cart = new Cart(
                    $cartif['id'],
                    $cartif['user_id'],
                    
                );
               

                return $cart;
            }
        } else {
             return null;
        }
        }catch (PDOException $e) {
            throw $e;
        } 
    } 

    

    
 }

?>
