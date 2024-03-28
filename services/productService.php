<?
require_once '../database/database.php';
require_once '../models/product.php';
class ProductService{
    private $conn;
    public function __construct()
    {
        $this->conn=new Database();
    }




//lay toan bo products
    public function getAllProduct(){
        try {
            $sql = "SELECT * FROM `product`";
            $result = $this->conn->prepare($sql);
            $result->execute();

            if ($result) {
                $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
                $products = array();
            foreach ($productdata as $data) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image'],
                    $data['description']
                );
                $products[] = $product;
            }
                
            } else {
                $products = array();
            }
        } catch (PDOException $e) {
            throw $e;
        }
        return $products;
    }
    public function deleteProductById($id) {
        try{
            $product=$this->getProductById($id);
            $img=$product->getImage();
            $sql="DELETE FROM `product` WHERE id=:id ";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':id',$id);
            $result->execute();
            if (file_exists($img)){
                unlink($img);
               
            }
            return true;
        }
        catch (PDOException $e) {
                throw $e;
            } 
        
    }
    public function addProductToDb($name, $category_id, $price, $image, $description){
        try{
            
            $sql="INSERT INTO `product` (name, category_id, price, image, description) VALUES (:name, :category_id, :price, :image, :description)";
            $result= $this->conn->prepare($sql);
            $result->bindParam(':name',$name);
            $result->bindParam(':category_id',$category_id);
            $result->bindParam(':price',$price);
            $result->bindParam(':image',$image);
            $result->bindParam(':description',$description);
            $result->execute();
            if($result){
                return true;
            } 
            }catch (PDOException $e) {
                throw $e;
            }
    }

    public function changeProduct($id, $name, $category_id, $price, $image, $description)
    {
        try {
            $updateFields = [];
    
            if (!empty($name)) {
                $updateFields[] = "name = :name";
            }
            if (!empty($category_id) && is_numeric($category_id)) {
                $updateFields[] = "category_id = :category_id";
            }
            if (!empty($price)) {
                $updateFields[] = "price = :price";
            }
            if (!empty($image)) {
                $updateFields[] = "image = :image";
            }
            if (!empty($description)) {
                $updateFields[] = "description = :description";
            }
    
           
            if (empty($updateFields)) {
                return false;
            }
    
            $updateString = implode(', ', $updateFields);
    
            $sql = "UPDATE `product` SET $updateString WHERE id = :id";
    
            $result = $this->conn->prepare($sql);
    
            if (!empty($name)) {
                $result->bindParam(':name', $name);
            }
            if (!empty($category_id) && is_numeric($category_id)) {
                $result->bindParam(':category_id', $category_id);
            }
            if (!empty($price)) {
                $result->bindParam(':price', $price);
            }
            if (!empty($image)) {
                $result->bindParam(':image', $image);
            }
            if (!empty($description)) {
                $result->bindParam(':description', $description);
            }
    
            $result->bindParam(':id', $id);
    
            $result->execute();
    
            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    


    //lay product theo id
    public function getProductById(int $id){
        try{
        $sql="SELECT * FROM `product` WHERE id=:id ";
        $result= $this->conn->prepare($sql);
        $result->bindParam(':id',$id);
        $result->execute();
        if ($result) {
            $productInfo = $result->fetch(PDO::FETCH_ASSOC); 
            if ($productInfo) {
               
                $product = new Product(
                    $productInfo['id'],
                    $productInfo['name'],
                    $productInfo['category_id'],
                    $productInfo['price'],
                    $productInfo['image'],
                    $productInfo['description']
                );
               

                return $product;
            }
        } else {
             return null;
        }
        }catch (PDOException $e) {
            throw $e;
        } 
    } 
    public function getIdProductByNameLike($name){
        try {
            $namelike = "%$name%";
            $sql = "SELECT * FROM `product` WHERE name LIKE :namelike ";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':namelike', $namelike);
            $result->execute();
            if ($result) {
                $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
                $ids = array();
            foreach ($productdata as $data) {
                $id = $data['id'];
                $ids[] = $id;
            }
                
            } else {
                $ids = array();
            }
            return $ids;
         

        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getProductByListId($ids){
        try {
            if(count($ids)===0){
                return $products=array();
            }
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM `product` WHERE id IN ($placeholders)";
            $result = $this->conn->prepare($sql);
            $result->execute($ids);
            if($result){
            $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
            $products = array();
            foreach ($productdata as $data) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image'],
                    $data['description']
                );
                $products[]=$product;
            }
            
        } else {
            $products=array();
        }
            return $products;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getProductCount() {
        try {
            $sql = "SELECT COUNT(*) AS total FROM `product`";
            $result = $this->conn->prepare($sql);
            $result->execute();
    
            if ($result) {
                $count = $result->fetch(PDO::FETCH_ASSOC);
                return isset($count['total']) ? (int)$count['total'] : 0;
            } else {
                return 0;
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getProductCountByFoodType($foodtypeId) {
        try {
            
            $sql = "SELECT COUNT(*) AS total FROM `product` WHERE `category_id` = :category_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':category_id', $foodtypeId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return isset($result['total']) ? (int)$result['total'] : 0;
            
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getProductsByCategoryId($category_id){
        try {
            $sql = "SELECT * FROM `product` WHERE category_id = ?";
            $result = $this->conn->prepare($sql);
            $result->execute([$category_id]);
            if($result){
                $productdata = $result->fetchAll(PDO::FETCH_ASSOC);
                $products = array();
                foreach ($productdata as $data) {
                    $product = new Product(
                        $data['id'],
                        $data['name'],
                        $data['category_id'],
                        $data['price'],
                        $data['image'],
                        $data['description']
                    );
                    $products[]=$product;
                }
                
            } else {
                $products=array();
            }
            return $products;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    // Hàm lấy thông tin của các mặt hàng trong giỏ hàng khi hóa đơn được xác nhận
    public function getCartItem($cart_id)
    {
              

            // Câu truy vấn để lấy thông tin các sản phẩm trong giỏ hàng
            $query = "SELECT * FROM cartitem WHERE cart_id = :cart_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':cart_id', $cart_id);
            $stmt->execute();

            $cartItems = array();

            // Lặp qua các dòng kết quả và tạo đối tượng CartItem từ mỗi dòng
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cartItem = new CartItem($row['id'], $row['product_id'], $row['quantity'], $row['cart_id']);
                $cartItems[] = $cartItem;
            }

            return $cartItems;
        
    }
    // Hàm cập nhật số lượng đã bán (sold quantity) của sản phẩm
    public function updateSoldQuantity($productId, $soldQuantity)
    {
        try {
            $query = "UPDATE product_sale SET sold_quantity = sold_quantity + :soldQuantity WHERE product_id = :productId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':productId', $productId);
            $stmt->bindParam(':soldQuantity', $soldQuantity);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getProductsPerPage($start, $limit) {
        try {
            $sql = "SELECT * FROM `product` LIMIT ?, ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $start, PDO::PARAM_INT);
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
            $stmt->execute();
            $products = array();
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image'],
                    $data['description']
                );
                $products[] = $product;
            }
            return $products;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function getProductsByCategoryIdPerPage($category_id, $start, $limit) {
        try {
            $sql = "SELECT * FROM `product` WHERE category_id = ? LIMIT ?, ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $category_id, PDO::PARAM_INT);
            $stmt->bindParam(2, $start, PDO::PARAM_INT);
            $stmt->bindParam(3, $limit, PDO::PARAM_INT);
            $stmt->execute();
            $products = array();
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product(
                    $data['id'],
                    $data['name'],
                    $data['category_id'],
                    $data['price'],
                    $data['image'],
                    $data['description']
                );
                $products[] = $product;
            }
            return $products;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    


}
