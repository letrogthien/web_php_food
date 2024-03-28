<?php

require_once '../database/database.php';
require_once '../models/ship.php';

class ShipService {
    private $conn;

    public function __construct() {
        $this->conn = new Database();
    }

    public function addShip($hoadonId, $dvVanChuyenId) {
        try {
            $sql = "INSERT INTO `ship` (`hoadon_id`, `dv_van_chuyen_id`) VALUES (:hoadonId, :dvVanChuyenId)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':hoadonId', $hoadonId);
            $stmt->bindParam(':dvVanChuyenId', $dvVanChuyenId);
            $stmt->execute();

            return true;
        } catch (PDOException $e) {
            throw $e;
        }
    }
}

?>