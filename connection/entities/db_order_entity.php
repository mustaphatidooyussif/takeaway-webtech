<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    // require "db_food_menu_entity.php";
    // require "db_customer_entity.php";
    require get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

    class OrderEntity{

        public $owner;
        public $id;
        public $served = 0;
        public $foodMenuEntity = null; // this is a FoodMenuEntity obj
        public $matronEntity = null;    // this is a MatronEntity obj
        public $customerEntity = null;  // this is a CustomerEntity obj

        function __construct($owner, $id, $foodMenuEntity, $customerEntity){
            $this->owner = $owner;
            $this->id = $id;
            $this->foodMenuEntity = $foodMenuEntity;
            $this->customerEntity = $customerEntity;
        }

        // SETTERS

        // food_item setters
        function setFoodItemObj($foodMenuEntity){
            $this->foodMenuEntity = $foodMenuEntity;
        }
        // matron obj setter
        function setMatronObj($matronEntity){
            $this->matronEntity = $matronEntity;
        }
        // customer obj setter
        function setCustomerObj($customerEntity){
            $this->customerEntity = $customerEntity;
        }

        // GETTERS

        // food_item getters
        function getFoodItemObj(){
            return $this->foodMenuEntity;
        }

        // owner getters
        function getOwner(){
            return $this->owner;
        }

        // id getters
        function getID(){
            return $this->id;
        }

        // served status getters
        function getServedStatus(){
            return $this->served;
        }

        // matron getters
        function getMatronObj(){
            return $this->matronEntity;
        }

        // food_item getters
        function getCustomerObj(){
            return $this->customerEntity;
        }

    }
    // test
    $fmu = new FoodMenuEntity("Akornor", "1", "Rice", "Ghc8.5", "half Portion", "Breakfast");
    $cus = new CustomerEntity("06002020", "atule", "1234");
    $ord_ak = new OrderEntity("Akornor", "3", $fmu, $cus);
    $ord_bb = new OrderEntity("Akornor", "3", $fmu, $cus);
    // var_dump($ord_ak);
    


?>