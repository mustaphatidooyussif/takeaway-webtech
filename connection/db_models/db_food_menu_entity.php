<?php 

    class FoodMenuEntity{

        // credentials
        public $owner;
        public $id;
        public $item;
        public $price;
        public $type;
        public $category;

        // constructor
        function __construct($owner, $id, $item, $price, $type, $category){
            $this->owner = $owner;
            $this->id = $id;
            $this->item = $item;
            $this->price = $price;
            $this->type = $type;
            $this->category = $category;
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

        // item getter
        function getItem(){
            return $this->item;
        }

        // price getter
        function getPrice(){
            return $this->price;
        }

        // type getter
        function getType(){
            return $this->type;
        }

        // category getter
        function getCategory(){
            return $this->category;
        }


    }

    $fmu = new FoodMenuEntity("Akornor", "1", "Rice", "Ghc8.5", "half Portion", "Breakfast");
    var_dump($fmu);

?>