<?php
    // import file
    require "connection.php";
    require "db_queries.php";

    $queries = new Queries();
    $conn = new ConnectionProvider();

    class InitDatabase {
        //===This class creates all tables===//

        private $db_conn;
        private $db_name;
        private $queryObj;

        // matron table credentials
        private $matron_table = "matron_login";
        private $matron_id = "matron_id";
        private $matron_username = "matron_username";
        private $matron_password = "matron_password";

        // matron table credentials
        private $customer_table = "customer_login";
        private $customer_id = "customer_id";
        private $customer_username = "customer_username";
        private $customer_password = "customer_password";

        // food menu table credentials
        private $ak_food_menu_table = "akorno_food_menu";
        private $bb_food_menu_table = "bigben_food_menu";
        private $food_item_id = "food_item_id";
        private $food_item_field = "food_item";
        private $price_field = "price";
        private $type_field = "type";
        private $category_field = "category";

        // orders table credentials
        private $ak_orders_table = "akorno_orders";
        private $bb_orders_table = "bigben_orders";
        private $orders_id = "orders_id";
        private $served_field = "served";

        // customer history table credentials
        private $customer_history_table = "customer_history";
        private $history_id=  "history_id";
        private $ak_history_table = "akorno_orders_history";
        private $bb_history_table = "bigben_orders_history";




        // constructor
        public function __construct(){
            global $conn, $connectionCredential, $queries;
            $this->db_conn = $conn->getConnection();
            $this->db_name = $connectionCredential['credential']['dbname'];
            $this->queryObj = $queries;

            // create database if not created
            $this->db_conn->exec($this->queryObj->buildDatabaseQuery($this->db_name));
            // use created database
            $this->db_conn->exec($this->queryObj->buildUseDbQuery($this->db_name));
        }


        // create tables
        public function createDataBaseTables(){
            // login tables
            $matron_login_table_query = $this->queryObj->buildLoginTableQuery($this->db_name, $this->matron_table, $this->matron_id, $this->matron_username, $this->matron_password);
            $customer_login_table_query = $this->queryObj->buildLoginTableQuery($this->db_name, $this->customer_table, $this->customer_id, $this->customer_username, $this->customer_password);
            
            // food menu tables
            $akornor_food_menu_table_query = $this->queryObj->buildFoodMenuTableQuery($this->db_name, $this->ak_food_menu_table, $this->food_item_id, $this->food_item_field, $this->price_field, $this->type_field, $this->category_field);
            $bigben_food_menu_table_query = $this->queryObj->buildFoodMenuTableQuery($this->db_name, $this->bb_food_menu_table, $this->food_item_id, $this->food_item_field, $this->price_field, $this->type_field, $this->category_field);
            
            // orders tables
            $akornor_orders_table_query = $this->queryObj->buildOrdersTableQuery($this->db_name, $this->ak_orders_table, $this->orders_id, $this->served_field, $this->food_item_id, $this->matron_id, $this->customer_id, $this->matron_table, $this->customer_table, $this->ak_food_menu_table);
            $bigben_orders_table_query = $this->queryObj->buildOrdersTableQuery($this->db_name, $this->bb_orders_table, $this->orders_id, $this->served_field, $this->food_item_id, $this->matron_id, $this->customer_id, $this->matron_table, $this->customer_table, $this->bb_food_menu_table);

            // history tables 
            $customer_history_table_query = $this->queryObj->buildCustomerHistoryTableQuery($this->db_name, $this->customer_history_table, $this->history_id, $this->orders_id, "ak_".$this->orders_id, "bb_".$this->orders_id, $this->ak_orders_table, $this->bb_orders_table);      
            $akornor_history_table_query = $this->queryObj->buildCafeteriaHistoryTableQuery($this->db_name, $this->ak_history_table, $this->history_id, $this->orders_id, $this->ak_orders_table);
            $bb_history_table_query = $this->queryObj->buildCafeteriaHistoryTableQuery($this->db_name, $this->bb_history_table, $this->history_id, $this->orders_id, $this->bb_orders_table);
            
            // queries list
            $queries = [
                $matron_login_table_query, $customer_login_table_query,
                $akornor_food_menu_table_query, $bigben_food_menu_table_query,
                $akornor_orders_table_query, $bigben_orders_table_query,
                $customer_history_table_query, $akornor_history_table_query, $bb_history_table_query
            ];

            foreach($queries as $sql){
                $this->db_conn->exec($sql);
                // var_dump($customer_history_table_query);
            }
        }
    }

    $db = new InitDatabase();
    $db->createDataBaseTables();



?>






