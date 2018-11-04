<?php
    // import file
    require_once "connection.php";
    require_once "db_queries.php";

    $queries = new Queries();
    $conn = new ConnectionProvider();

    class InitDatabase {
        //===This class creates all tables===//

        // resources
        public $db_conn;
        public $db_name;
        public $queryObj;

        //Caferteris
        public $cafeteria_table = "cafeterias";
        public $cafeterias_ids = "cafeterias_ids";
        public $cafeteria_uname = "cafeteria_uname";
        public $cafeteria_email = "cafeteria_email";

        // matron table credentials
        public $matron_table = "matron_details";
        public $matron_id = "id";
        public $matron_username = "username";
        public $matron_password = "password";
        public $matron_email = "email";
        public $belong_to_cafeteria = "cafeteria";

        // special ids
        public $sak_orders_id = "ak_orders_id";
        public $sbb_orders_id = "bb_orders_id";


        // matron table credentials
        public $customer_table = "customer_login";
        public $customer_id = "customer_id";
        public $customer_username = "customer_username";
        public $customer_password = "customer_password";

        // food menu table credentials
        public $ak_food_menu_table = "akorno_food_menu";
        public $bb_food_menu_table = "bigben_food_menu";
        public $food_item_id = "food_item_id";
        public $food_item_field = "food_item";
        public $price_field = "price";
        public $type_field = "type";
        public $category_field = "category";

        // orders table credentials
        public $ak_orders_table = "akorno_orders";
        public $bb_orders_table = "bigben_orders";
        public $orders_id = "orders_id";
        public $served_field = "served";

        // customer history table credentials
        public $customer_history_table = "customer_history";
        public $history_id=  "history_id";
        public $ak_history_table = "akorno_orders_history";
        public $bb_history_table = "bigben_orders_history";

        //Admin details
        public $admin_table_name = "admins_table";
        public $admins_ids = "admins_ids";
        public $admin_username = "admin_username";
        public $admins_passwords = "admins_passwords";
        public $admin_email = "admin_email";
        public $admin_aboutme = 'aboutme';

        ///Registration details
        public $registration_table = "customers";
        public $new_user_id = "id";
        public $new_user_firstname = "firstname";
        public $new_user_lastname = "lastname";
        public $new_user_email = "email";
        public $new_user_password = "password";
        public $new_user_confirm_password = 'confirm_password';
        public $new_user_username = 'username';

        //
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

            //registration table
            $customer_registration_table =  $this->queryObj->buildCustomerRegistrationQuery($this->db_name, $this->registration_table, $this->new_user_id, $this->new_user_firstname, $this->new_user_lastname, $this->new_user_username, $this->new_user_email, $this->new_user_password, $this->new_user_confirm_password);

            //admin table
            $admin_details_table = $this->queryObj->buildAdminTableQuery($this->db_name, $this->admin_table_name, $this->admins_ids, $this->admin_username, $this->admin_email, $this->admins_passwords, $this->admin_aboutme);
            
            // login tables
            $matron_login_table_query = $this->queryObj->buildMatronLoginTableQuery($this->db_name, $this->matron_table, $this->matron_id, $this->matron_username, $this->matron_password, $this->matron_email, $this->belong_to_cafeteria);
            $customer_login_table_query = $this->queryObj->buildLoginTableQuery($this->db_name, $this->customer_table, $this->customer_id, $this->customer_username, $this->customer_password);
                        
            // food menu tables
            $akornor_food_menu_table_query = $this->queryObj->buildFoodMenuTableQuery($this->db_name, $this->ak_food_menu_table, $this->food_item_id, $this->food_item_field, $this->price_field, $this->type_field, $this->category_field);
            $bigben_food_menu_table_query = $this->queryObj->buildFoodMenuTableQuery($this->db_name, $this->bb_food_menu_table, $this->food_item_id, $this->food_item_field, $this->price_field, $this->type_field, $this->category_field);
            
            // orders tables
            $akornor_orders_table_query = $this->queryObj->buildOrdersTableQuery($this->db_name, $this->ak_orders_table, $this->orders_id, $this->served_field, $this->food_item_id, $this->matron_id, $this->customer_id, $this->matron_table, $this->customer_table, $this->ak_food_menu_table);
            $bigben_orders_table_query = $this->queryObj->buildOrdersTableQuery($this->db_name, $this->bb_orders_table, $this->orders_id, $this->served_field, $this->food_item_id, $this->matron_id, $this->customer_id, $this->matron_table, $this->customer_table, $this->bb_food_menu_table);

            // history tables 
            $customer_history_table_query = $this->queryObj->buildCustomerHistoryTableQuery($this->db_name, $this->customer_history_table, $this->history_id, $this->orders_id, $this->customer_id, $this->customer_table, "ak_".$this->orders_id, "bb_".$this->orders_id, $this->ak_orders_table, $this->bb_orders_table);
            $akornor_history_table_query = $this->queryObj->buildCafeteriaHistoryTableQuery($this->db_name, $this->ak_history_table, $this->history_id, $this->orders_id, $this->ak_orders_table);
            $bb_history_table_query = $this->queryObj->buildCafeteriaHistoryTableQuery($this->db_name, $this->bb_history_table, $this->history_id, $this->orders_id, $this->bb_orders_table);
            $cafeteria_create_table_query = $this->queryObj->buildCafeteriaTableQuery($this->db_name, $this->cafeteria_table, $this->cafeterias_ids, $this->cafeteria_uname, $this->cafeteria_email);
            
            // queries list
            $queries = [
                $matron_login_table_query, $customer_login_table_query,
                $akornor_food_menu_table_query, $bigben_food_menu_table_query,
                $akornor_orders_table_query, $bigben_orders_table_query,
                $customer_history_table_query, $akornor_history_table_query, $bb_history_table_query,
                $cafeteria_create_table_query, $admin_details_table,$customer_registration_table
            ];

            // loop and execute queries
            foreach($queries as $sql){
                $this->db_conn->exec($sql);
            }

            
        }

        public function selectAllFromTable($table_name){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name
            );

            $retrieve_stmt = $this->db_conn->prepare($query);
            
            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }
        
        public function authenticateUser($email, $password){
            
        }
        public function retrieveByServedStatusAndID($owner, $cus_id){
            /**
             * returns OrderEntity item with a particular served status and customer id
             * (0 = "not served && 1 = "served").
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $owner,
                $this->customer_id,
                $this->customer_id
            );
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$this->customer_id, $cus_id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }


        public function selectItemByColumn($table_name, $col_name, $col_val){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s;";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name,
                $col_name,
                $col_name
            ); 
            
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$col_name, $col_val);
            
            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function deleteItemById($table_name, $col_name, $col_val){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s;";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name,
                $col_name,
                $col_name
            ); 
            
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$col_name, $col_val);
            
            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function deleteItemColumn($table_name, $col_name, $col_val){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s;";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name,
                $col_name,
                $col_name
            ); 
            
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$col_name, $col_val);
            
            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }
    }
    

    
    // $db = new InitDatabase();
    // $db->createDataBaseTables();



?>






