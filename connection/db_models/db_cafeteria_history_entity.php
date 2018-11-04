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
    require_once "db_order_entity.php";


    class CafeteriaOrdersHistoryEntity{
        /**
         * Create an Obj for cafeteria history.
         */

        // db resource
        static public $db;


        // credentials
        public $id;
        public $owner; // use the table name where the obj belongs in the database
        public $orderEntity = null; // OrderEntity Obj

        function __construct($owner, $id, $orderEntity){
            /**
             * constructor
             */

            global $db;
            self::$db = $db;

            $this->owner = $owner;
            $this->id = $id;
            $this->orderEntity = $orderEntity;
        }

        // GETTERS

        function getOwner(){
            /**
             * owner getter
             */

            return $this->owner;
        }
        function getID(){
            /**
             * id getter
             */

            return $this->id;
        }
        function getOrderEntity(){
            /**
             * orderEntity getters
             */

            return $this->orderEntity;
        }

        
        //=================MODEL FUNCTIONALITIES=========================//

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s) VALUES (:%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->history_id,
                self::$db->orders_id,
                self::$db->history_id,
                self::$db->orders_id
            );
            $insert_stmt = self::$db->db_conn->prepare($query);

            $order_id = $this->orderEntity->getID();

            $insert_stmt->bindparam(':'.self::$db->history_id, $this->id);
            $insert_stmt->bindparam(':'.self::$db->orders_id, $order_id);
            
            $insert_stmt->execute();
        }

        public function retrieveAll(){
            /**
             * returns all history items in the database table.
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
             * returns history item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->history_id,
                self::$db->history_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->history_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function deleteByID($id){
            /**
             * deletes history item with particular id.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->history_id,
                self::$db->history_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);

            $delete_stmt->bindparam(':'.self::$db->history_id, $id);

            $delete_stmt->execute();
        }
        
    }
    
    // test
    $coh = new CafeteriaOrdersHistoryEntity("akorno_orders_history", "123", $ord_ak);
    // $coh->insert();
    // $retrieve_stmt = $coh->retrieveAll();
    // $retrieve_stmt = $coh->retrieveByID(123);
    // $coh->deleteByID("123");

    // while ($row = $retrieve_stmt->fetch()){ 
    //         $h_id = $row['history_id'];
    //         $o_id = $row['orders_id'];
    //         echo "<br>";
    //         var_dump($h_id);
    //         var_dump($o_id);
    //     }

?>