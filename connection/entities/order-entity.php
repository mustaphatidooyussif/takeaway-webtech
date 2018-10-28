<?php 

class OrderEntity{
    public $id;
    public $customer_id;
    public $food_item;
    public $price;
    public $quantity;
    public $serve;
    public $customer_name;
    public $customer_id;
    public $served_by;

    function __construct($id, $customer_id, $food_item, $price, $quantity, $serve, $customer_name, $customer_id, $served_by){
        $this->id = $id;
        $this->customer_id = $customer_id;
        $this->food_item = $food_item;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->serve = $serve;
        $this->customer_name = $customer_name;
        $this->customer_id = $customer_id;
        $this->served_by = $served_by;
    }

}


?>