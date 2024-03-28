<?php

class Ship {
    private $id;
    private $hoadonId;
    private $dvVanChuyenId;

    public function __construct($id, $hoadonId, $dvVanChuyenId) {
        $this->id = $id;
        $this->hoadonId = $hoadonId;
        $this->dvVanChuyenId = $dvVanChuyenId;
    }

    // Getter và Setter cho các thuộc tính
    public function getId() {
        return $this->id;
    }

    public function getHoadonId() {
        return $this->hoadonId;
    }

    public function setHoadonId($hoadonId) {
        $this->hoadonId = $hoadonId;
    }

    public function getDvVanChuyenId() {
        return $this->dvVanChuyenId;
    }

    public function setDvVanChuyenId($dvVanChuyenId) {
        $this->dvVanChuyenId = $dvVanChuyenId;
    }
}

?>
