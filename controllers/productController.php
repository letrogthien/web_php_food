<?
require_once '../services/productService.php';

class ProductController {
    private $productService;
    public function __construct(){
        $this->productService=new ProductService();
    } 

    public function getAllProduct(){
        return $this->productService->getAllProduct();
    }

    public function getProductById(int $id){
        return
         $this->productService->getProductById($id);
    }
}