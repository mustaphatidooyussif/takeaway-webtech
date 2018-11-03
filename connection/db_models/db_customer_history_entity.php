<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();
    // FoodMenuEntity
    require_once "db_food_menu_entity.php";
    // CustomerEntity
    require_once "db_customer_entity.php";
    // OrderEntity
    require "db_order_entity.php";



    class CustomerOrdersHistoryEntity{
        /**
         * customer orders history Obj
         */

         // db resource
        static public $db;

        // credentials
        public $id; // history_id
        public $customerEntity = null; // CustomerEntity Obj
        public $ak_orderEntity = null; // OrderEntity Obj
        public $bb_orderEntity = null; // OrderEntity Obj

        function __construct($id, $cusEntity){
            /**
             * constructor
             */

            global $db;
            self::$db = $db;

            $this->id = $id;
            $this->customerEntity = $cusEntity;
        }

        // SETTERS 

        function setCustomerEntity($customerEntity){
            /**
             * customerEntity setter
             */

            $this->customerEntity = $customerEntity;
        }
        function setAk_orderEntity($ak_orderEntity){
            /**
             * ak_orderEntity setter
             */

            $this->ak_orderEntity = $ak_orderEntity;
        }
        function setBb_orderEntity($bb_orderEntity){
            /**
             * bb_orderEntity setter
             */

            $this->bb_orderEntity = $bb_orderEntity;
        }

        // GETTERS

        function getID(){
            /**
             * id getter
             */

            return $this->id;
        }
        function getCustomerEntity(){
            /**
             * customerEntity getter
             */

            return $this->customerEntity;
        }
        function getAk_orderEntity(){
            /**
             * ak_orderEntity getter
             */

            return $this->ak_orderEntity;
        }
        function getBb_orderEntity(){
            /**
             * bb_orderEntity getter
             */

            return $this->bb_orderEntity;
        }


        
        //=================MODEL FUNCTIONALITIES=========================//

        public function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table,

                self::$db->history_id,
                self::$db->customer_id,
                self::$db->sak_orders_id,
                self::$db->sbb_orders_id,

                self::$db->history_id,
                self::$db->customer_id,
                self::$db->sak_orders_id,
                self::$db->sbb_orders_id
            );
            $insert_stmt = self::$db->db_conn->prepare($query);

            $cus_id = $this->customerEntity ? $this->customerEntity->getID() : "";
            $ak_order_hist_id = $this->ak_orderEntity ? $this->ak_orderEntity->getID() : "";
            $bb_order_hist_id = $this->bb_orderEntity ? $this->bb_orderEntity->getID() : "";
            

            $insert_stmt->bindparam(':'.self::$db->history_id, $this->id);
            $insert_stmt->bindparam(':'.self::$db->customer_id, $cus_id);
            $insert_stmt->bindparam(':'.self::$db->sak_orders_id, $ak_order_hist_id);
            $insert_stmt->bindparam(':'.self::$db->sbb_orders_id, $bb_order_hist_id);
            
            $insert_stmt->execute();
        }

        static function retrieveAll(){
            /**
             * returns all customer history items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

 
        public  function retrieveByCustomerID(){
            /**
             * returns customer history items related to a particular customer id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table,
                self::$db->customer_id,
                self::$db->customer_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $cus_id = $this->customerEntity->getID();

            $retrieve_stmt->bindparam(':'.self::$db->customer_id, $cus_id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public  function retrieveByID($id){
            /**
             * returns customer history item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table,
                self::$db->history_id,
                self::$db->history_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->bindparam(':'.self::$db->history_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function deleteByCustomerID(){
            /**
             * deletes all customer history item related to a particular customer id.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table,
                self::$db->customer_id,
                self::$db->customer_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);

            $cus_id = $this->customerEntity->getID();

            $delete_stmt->bindparam(':'.self::$db->customer_id, $cus_id);

            $delete_stmt->execute();
        }

        public function deleteByID($id){
            /**
             * deletes a customer history item with a particular id.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->customer_history_table,
                self::$db->history_id,
                self::$db->history_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);

            $delete_stmt->bindparam(':'.self::$db->history_id, $id);

            $delete_stmt->execute();
        }

    }
    
    // test
    // $cush->setCustomerEntity($cus);
    // $cush = new CustomerOrdersHistoryEntity(123, $cus);
    // $cush1 = new CustomerOrdersHistoryEntity(3030303, $cus);

    // $cush->setAk_orderEntity($ord_ak);
    // $cush->setBb_orderEntity($ord_bb);
    // $cush1->setAk_orderEntity($ord_ak);
    // $cush1->setBb_orderEntity($ord_bb);
    // $cush->insert();
    // $cush1->insert();
    // $retrieve_stmt = $cush->retrieveAll();
    // $retrieve_stmt = $cush->retrieveByID(3030303);
    // $cush1->deleteByID(3030303);

    // while ($row = $retrieve_stmt->fetch()){ 
    //         $h_id = $row['history_id'];
    //         $c_id = $row['customer_id'];
    //         $ao_id = $row['ak_orders_id'];
    //         $bo_id = $row['bb_orders_id'];
    //         echo "<br>";
    //         var_dump($h_id);
    //         var_dump($c_id);
    //         var_dump($ao_id);
    //         var_dump($bo_id);
    //     }

    // var_dump($cush);

?>