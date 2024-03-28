<?php

class bestseller
{
    private $id;

    private $product_id;
   
    private $soldQuantity;

   

    // Constructor
    public function __construct($id, $product_id, $soldQuantity)
    {
        $this->id = $id;
        $this->product_id = $product_id;
     
        $this->soldQuantity = $soldQuantity;
    }


    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getProductId()
    {
        return $this->product_id;
    }


    public function getSoldqQuantity()
    {
        return $this->soldQuantity;
    }

    // Setter methods
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

 
    public function setSoldqQuantity($soldQuantity)
    {
        $this->soldQuantity = $soldQuantity;
    }

    // Other methods (if needed)
}


