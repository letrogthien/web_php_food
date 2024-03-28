<? 
class CartItem {
    private $id;
    private $product_id;
    private $quantity;

    private $cart_id;

    // Constructor
    public function __construct($id, $product_id, $quantity, $cart_id) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->cart_id=$cart_id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }
    public function getCart_id() {
        return $this->cart_id;
    }
    

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setProductId($product_id) {
        $this->product_id = $product_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }
    public function setCart_id($cart_id) {
        $this->cart_id = $cart_id;
    }
}