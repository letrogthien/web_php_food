<?php

class Bill
{
    private $id;
    private $cartId;
    private $totalPrice;
    private $diaChi;
    private $sdt;
    private $ngayTao;
    private $status;

    // Constructor
    public function __construct($id, $cartId, $totalPrice, $diaChi, $sdt, $ngayTao, $status)
    {
        $this->id = $id;
        $this->cartId = $cartId;
        $this->totalPrice = $totalPrice;
        $this->diaChi = $diaChi;
        $this->sdt = $sdt;
        $this->ngayTao = $ngayTao;
        $this->status = $status;
    }

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getCartId()
    {
        return $this->cartId;
    }

    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    public function getDiaChi()
    {
        return $this->diaChi;
    }

    public function getSdt()
    {
        return $this->sdt;
    }

    public function getNgayTao()
    {
        return $this->ngayTao;
    }

    public function getStatus()
    {
        return $this->status;
    }

    // Setter methods
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setCartId($cartId)
    {
        $this->cartId = $cartId;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }

    public function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;
    }

    public function setSdt($sdt)
    {
        $this->sdt = $sdt;
    }

    public function setNgayTao($ngayTao)
    {
        $this->ngayTao = $ngayTao;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    // Other methods (if needed)
}


