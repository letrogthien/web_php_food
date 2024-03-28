<?
 require_once '../database/database.php';
 require_once '../models/bill.php';

class BillService{
    private $conn;
    public function __construct(){
        $this->conn=new Database();
    }

    public function addToBill($cartId, $totalPrice, $diaChi, $sdt, $status)
    {
        try {
           
            $sql = "INSERT INTO hoadon (cart_id, total_price, dia_chi, sdt, ngay_tao, status)
                    VALUES (:cart_id, :total_price, :dia_chi, :sdt, NOW(), :status)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':total_price', $totalPrice);
            $stmt->bindParam(':dia_chi', $diaChi);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            
            throw $e;
        }
    }

    public function getAllBill(){
        try {
            $sql = "SELECT * FROM `hoadon`";
            $result = $this->conn->prepare($sql);
            $result->execute();

            $bills = array();

            if ($result) {
                $billData = $result->fetchAll(PDO::FETCH_ASSOC);

                foreach ($billData as $data) {
                    $bill = new Bill(
                        $data['id'],
                        $data['cart_id'],
                        $data['total_price'],
                        $data['dia_chi'],
                        $data['sdt'],
                        $data['ngay_tao'],
                        $data['status']
                    );

                    $bills[] = $bill;
                }
            } else {
                $bills = array();
            }
        } catch (PDOException $e) {
            throw $e;
        }

        return $bills;
    }

    public function getBillByCartId($cartId) {
        try {
            $sql = "SELECT * FROM `hoadon` where `cart_id` =:cart_id";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':cart_id', $cartId);
            $result->execute();

            $bills = array();

            if ($result) {
                $billData = $result->fetchAll(PDO::FETCH_ASSOC);

                foreach ($billData as $data) {
                    $bill = new Bill(
                        $data['id'],
                        $data['cart_id'],
                        $data['total_price'],
                        $data['dia_chi'],
                        $data['sdt'],
                        $data['ngay_tao'],
                        $data['status']
                    );

                    $bills[] = $bill;
                }
            } else {
                $bills = array();
            }
        } catch (PDOException $e) {
            throw $e;
        }

        return $bills;
    }
    public function updateBillStatus($billId) {
        $newStatus="đã xác nhận";
        try {
            $sql = "UPDATE `hoadon` SET `status` = :newStatus WHERE `id` = :billId";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':newStatus', $newStatus);
            $stmt->bindParam(':billId', $billId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function deleteBillById($billId) {
        try {
    
            $sqlDeleteShip = "DELETE FROM `ship` WHERE `hoadon_id` = :billId";
            $stmtDeleteShip = $this->conn->prepare($sqlDeleteShip);
            $stmtDeleteShip->bindParam(':billId', $billId);
            $stmtDeleteShip->execute();
    
            $sqlDeleteBill = "DELETE FROM `hoadon` WHERE `id` = :billId";
            $stmtDeleteBill = $this->conn->prepare($sqlDeleteBill);
            $stmtDeleteBill->bindParam(':billId', $billId);
            $stmtDeleteBill->execute();
    
    
            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }


}