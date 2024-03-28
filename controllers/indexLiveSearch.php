<? 
require_once '../services/productService.php';
$productService=new ProductService();
if(isset($_POST['query'])){
    $query=$_POST['query'];
}
$ids=$productService->getIdProductByNameLike($query);
$products=$productService->getProductByListId($ids);
$tmp=count($products);
if($tmp>5){
    $tmp=5;
}if($tmp===0){
    echo'<button type="button" class="list-group-item list-group-item-action">nothing</button>';

}
 else {
echo '<div class="list-group">';
for ($i=0; $i < $tmp; $i++) {  
    
    
    
    echo '<button type="button" class="list-group-item list-group-item-action"><a href="../views/productDetail.php?id=' . $products[$i]->getId() . '">' . $products[$i]->getName() . '</a></button>';
}
echo '</div>';


 }