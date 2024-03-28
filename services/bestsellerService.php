<?php

require_once "../database/database.php";
require_once "../models/bestseller.php";

class BestsellerService {
    private $conn;

    public function __construct() {
        $this->conn = new Database(); // Khởi tạo đối tượng Database để thiết lập kết nối
    }

    public function getTop5Bestsellers() {
        $sql = "SELECT * FROM product_sale ORDER BY sold_quantity DESC LIMIT 4"; // Truy vấn lấy ra 5 sản phẩm bán chạy nhất
        $result = $this->conn->query($sql); // Thực hiện truy vấn

        $bestsellers = array();

        if ($result) {
            // Lặp qua các dòng dữ liệu từ kết quả truy vấn và tạo đối tượng Bestseller cho mỗi sản phẩm
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $bestseller = new bestseller(
                    $row['id'],
                    $row['product_id'],
                    $row['sold_quantity']
                );
                $bestsellers[] = $bestseller;
            }
        }

        return $bestsellers;
    }
}

?>
