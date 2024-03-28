<?
require_once '../database/database.php';
require_once '../models/cardItem.php';

class CartItemService{
    private $conn;
    public function __construct(){
        $this->conn=new Database();
    }
    public function addCartItem($product_id, $quantity, $cart_id) {
        try {
            $sql = "INSERT INTO `cartitem` (product_id, quantity, cart_id) VALUES (:product_id, :quantity, :cart_id)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':product_id', $product_id);
            $result->bindParam(':quantity', $quantity);
            $result->bindParam(':cart_id', $cart_id);
            $result->execute();

            return $result;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getTotalAmountInCart($cartId) {
        try {
            
            $sql = "SELECT cart_id, SUM(cartitem.quantity * product.price) AS total_amount
                    FROM cartitem
                    JOIN product ON cartitem.product_id = product.id
                    WHERE cart_id = :cart_id
                    GROUP BY cart_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return ($result) ? $result['total_amount'] : 0;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getItemWithCartId($cart_id) {
        try{
            $sql="SELECT * FROM `cartitem` WHERE cart_id=:cart_id ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':cart_id',$cart_id);
            $result->execute();
            if ($result){
                $itemDatas = $result->fetchAll(PDO::FETCH_ASSOC);
                $items = array();
            foreach ($itemDatas as $itemData) {
                $item = new CartItem(
                    $itemData['id'],
                    $itemData['product_id'],
                    $itemData['quantity'],
                    $itemData['cart_id']
                    
                );
                $items[] = $item;
            }
            } else {
                $items = array();
            }
        }catch (PDOException $e) {
            throw $e;
        }
        return $items;
        
    }
    public function getQuantityWithCartId($cart_id){
        try {
            $sql="SELECT SUM(cartitem.quantity) AS total FROM `cartitem` WHERE cart_id=:cart_id";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':cart_id',$cart_id);
            $result->execute();
            if($result){
                $count=$result->fetch(PDO::FETCH_ASSOC);
                return $count['total'];
            }
            else return null;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteCartItemById($id) {
        try{
            $sql="DELETE FROM `cartitem` WHERE id=:id ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            return true;
        }
        catch (PDOException $e) {
                throw $e;
        } 
        
    }
    public function checkProductInCart($product_id) {
        try {
            $sql = "SELECT COUNT(*) FROM cartitem WHERE product_id = :product_id ";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return ($count > 0);
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
}