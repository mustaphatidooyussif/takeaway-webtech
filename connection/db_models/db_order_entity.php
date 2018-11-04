<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();
    // FoodMenuEntity
    require_once "db_food_menu_entity.php";
    // CustomerEntity
    require_once "db_customer_entity.php";
    // MatronEntity
    require_once "db_matron_entity.php";



    class OrderEntity{
        /**
         * Createa an Obj for order item.
         */

        // db resource
        static public $db;

        public $owner;// use the table name where the obj belongs in the database
        public $served = 0;
        public $foodMenuEntity = null; // this is a FoodMenuEntity obj
        public $matronEntity = null;    // this is a MatronEntity obj
        public $customerEntity = null;  // this is a CustomerEntity obj

        function __construct($owner, $foodMenuEntity=null, $customerEntity=null){
            /**
             * constructor 
             */

            global $db;
            self::$db = $db;

            $this->owner = $owner;
            $this->foodMenuEntity = $foodMenuEntity;
            $this->customerEntity = $customerEntity;
        }

        // SETTERS

        function setFoodItemObj($foodMenuEntity){
            /**
             * FoodItemObj Obj setter
             */

            $this->foodMenuEntity = $foodMenuEntity;
        }
        function setMatronObj($matronEntity){
            /**
             * MatronObj setter
             */
            
            $this->matronEntity = $matronEntity;
        }
        function setCustomerObj($customerEntity){
            /**
             * customerObj setter
             */

            $this->customerEntity = $customerEntity;
        }

        // GETTERS

        function getFoodItemObj(){
            /**
             * FoodItemObj setter
             */

            return $this->foodMenuEntity;
        }
        function getOwner(){
            /**
             * owner getter
             */

            return $this->owner;
        }
        function getServedStatus(){
            /**
             * served status getter
             */

            return $this->served;
        }
        function getMatronObj(){
            /**
             * MatronObj getter
             */

            return $this->matronEntity;
        }
        function getCustomerObj(){
            /**
             * CustomerObj
             */

            return $this->customerEntity;
        }

        //=================MODEL FUNCTIONALITIES=========================//

        public function insert(){
            /**
             * inserts Obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->served_field,
                self::$db->food_item_id,
                self::$db->matron_id,
                self::$db->customer_id,

                self::$db->served_field,
                self::$db->food_item_id,
                self::$db->matron_id,
                self::$db->customer_id
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $food_item_id = $this->foodMenuEntity->getID();
            $matron_id = $this->matronEntity ? $this->matronEntity->getID() : "";
            $customer_id = $this->customerEntity->getID();

            $insert_stmt->bindparam(':'.self::$db->served_field, $this->served);
            $insert_stmt->bindparam(':'.self::$db->food_item_id, $food_item_id);
            $insert_stmt->bindparam(':'.self::$db->matron_id, $matron_id);
            $insert_stmt->bindparam(':'.self::$db->customer_id, $customer_id);

            $insert_stmt->execute();
        }

        public function insertWithID($cus_id="", $food_itm_id="", $mat_id=""){
            /**
             * inserts Obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,

                self::$db->served_field,
                self::$db->food_item_id,
                self::$db->matron_id,
                self::$db->customer_id,

                self::$db->served_field,
                self::$db->food_item_id,
                self::$db->matron_id,
                self::$db->customer_id
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $food_item_id = $food_itm_id;
            $matron_id = $mat_id;
            $customer_id = $cus_id;

            $insert_stmt->bindparam(':'.self::$db->served_field, $this->served);
            $insert_stmt->bindparam(':'.self::$db->food_item_id, $food_item_id);
            $insert_stmt->bindparam(':'.self::$db->matron_id, $matron_id);
            $insert_stmt->bindparam(':'.self::$db->customer_id, $customer_id);

            $insert_stmt->execute();
        }

        public function updateMatronColumn($mat_id=""){
            /**
             * updates the matron_id column when matron is known
             */

            $stmt = "UPDATE %s.%s SET %s=:%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,

                self::$db->matron_id,
                self::$db->matron_id,
                self::$db->customer_id,
                self::$db->customer_id

            );
            $update_stmt = self::$db->db_conn->prepare($query);

            $matron_id = $this->matronEntity ? $this->matronEntity->getID() : $mat_id;
            $customer_id = $this->customerEntity->getID();

            $update_stmt->bindparam(':'.self::$db->matron_id, $matron_id);
            $update_stmt->bindparam(':'.self::$db->customer_id, $customer_id);

            $update_stmt->execute();
        }

        public function retrieveAll(){
            /**
             * returns all OrderEntity items in a database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

 
        public function retrieveByID($id){
            /**
             * returns OrderEntity item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->orders_id,
                self::$db->orders_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->orders_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function retrieveByCustomerID($cus_id){
            /**
             * returns OrderEntity item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->customer_id,
                self::$db->customer_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->customer_id, $cus_id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function retrieveByServedStatus($status){
            /**
             * returns OrderEntity item with a particular served status
             * (0 = "not served && 1 = "served").
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->served_field,
                self::$db->served_field
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->served_field, $status);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function deleteByID($id){
            /**
             * deletes OrderEntity item with a particular id.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->orders_id,
                self::$db->orders_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->orders_id, $id);

            $delete_stmt->execute();
        }
    }
?>