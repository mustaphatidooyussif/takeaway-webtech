<?php 
    // import file
    require "db_order_entity.php";


    class CustomerOrdersHistoryEntity{

        // credentials
        public $id;
        public $customerEntity = null; // CustomerEntity Obj
        public $ak_orderEntity = null; // OrderEntity Obj
        public $bb_orderEntity = null; // OrderEntity Obj

        // constructor
        function __construct($id){
            $this->id = $id;
        }

        // SETTERS 

        // customerEntity setter
        function setCustomerEntity($customerEntity){
            $this->customerEntity = $customerEntity;
        }

        // ak_orderEntity setter
        function setAk_orderEntity($ak_orderEntity){
            $this->ak_orderEntity = $ak_orderEntity;
        }

        // bb_orderEntity setter
        function setBb_orderEntity($bb_orderEntity){
            $this->bb_orderEntity = $bb_orderEntity;
        }

        // GETTERS

        // customerEntity getter
        function getCustomerEntity(){
            return $this->customerEntity;
        }

        // ak_orderEntity getter
        function getAk_orderEntity(){
            return $this->ak_orderEntity;
        }

        // bb_orderEntity getter
        function getBb_orderEntity(){
            return $this->bb_orderEntity;
        }

        // id getter
        function getID(){
            return $this->id;
        }
    }
    
    // test
    $cush = new CustomerOrdersHistoryEntity("1");
    $cush->setCustomerEntity($cus);
    $cush->setAk_orderEntity($ord_ak);
    $cush->setBb_orderEntity($ord_bb);
    // var_dump($cush);

?>