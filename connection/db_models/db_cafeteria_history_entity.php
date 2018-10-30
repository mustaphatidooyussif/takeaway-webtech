<?php 
    // import file
    require "db_order_entity.php";


    class CafeteriaOrdersHistoryEntity{

        // credentials
        public $owner;
        public $id;
        public $orderEntity = null; // OrderEntity Obj

        // constructor
        function __construct($owner, $id, $orderEntity){
            $this->owner = $owner;
            $this->id = $id;
            $this->orderEntity = $orderEntity;
        }

        // GETTERS

        // owner getter
        function getOwner(){
            return $this->owner;
        }
        // id getter
        function getID(){
            return $this->id;
        }
        // orderEntity getters
        function getOrderEntity(){
            return $this->orderEntity;
        }
    }
    
    // test
    $coh = new CafeteriaOrdersHistoryEntity("Akornor", "1", $ord);
    var_dump($coh);

?>