<?php
    //import file
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
        public $matron_id = "matron_id";
        public $matron_username = "matron_username";
        public $matron_password = "matron_password";
        public $matron_email = "matron_email";
        public $belong_to_cafeteria = "belong_to_cafeteria";

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



        // delete menu item
        public function deleteByItem($item, $table_name){
            /**
             * returns foodMenuEntity item with a particular item name.
             */
            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name,
                $this->food_item_field,
                $this->food_item_field   
            );
            $delete_stmt = $this->db_conn->prepare($query);

            $delete_stmt->bindparam(':'.$this->food_item_field, $item);
            
            $delete_stmt->execute();
            return $delete_stmt;
        }

        
        public function retrieveByCategory($category,$table_name){
            /**
             * returns foodMenuEntity items in a particular category.
             */
            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name,
                $this->category_field,
                $this->category_field
            );
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$this->category_field, $category);
            
            $retrieve_stmt->execute();
            
            return $retrieve_stmt;
        }










        // create tables
        public function createDataBaseTables(){
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
                $cafeteria_create_table_query, $admin_details_table
            ];

            // loop and execute queries
            foreach($queries as $sql){
                $this->db_conn->exec($sql);
            }

            
        }

        public function selectAllFromTable_Ord($query){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            // $stmt = "SELECT * FROM %s.%s;";

            // $query = sprintf(
            //     $stmt,
            //     $this->db_name,
            //     $table_name
            // );

            $retrieve_stmt = $this->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function selectAllFromTable($table_name, $query){
            /**
             * returns all foodMenuEntity items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $table_name
            );

            $retrieve_stmt = $this->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function retrieveByServedStatusAndID($owner, $cus_id, $status){
            /**
             * returns OrderEntity item with a particular served status and customer id
             * (0 = "not served && 1 = "served").
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s AND %s=:%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $owner,
                $this->customer_id,
                $this->customer_id,
                $this->served_field,
                $this->served_field
            );
            $retrieve_stmt = $this->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.$this->customer_id, $cus_id);
            $retrieve_stmt->bindparam(':'.$this->served_field, $status);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function updateByServedStatusAndID($owner, $cus_id, $order_id, $status){
            /**
             * updates  order with a particular order id and customer id
             * (0 = "not served && 1 = "served").
             */

            $stmt = "UPDATE %s.%s SET %s=:%s WHERE %s=:%s AND %s=:%s";

            $query = sprintf(
                $stmt,
                $this->db_name,
                $owner,
                $this->served_field,
                $this->served_field,
                $this->customer_id,
                $this->customer_id,
                $this->orders_id,
                $this->orders_id
            );
            $update_stmt = $this->db_conn->prepare($query);
            $update_stmt->bindparam(':'.$this->served_field, $status);
            $update_stmt->bindparam(':'.$this->customer_id, $cus_id);
            $update_stmt->bindparam(':'.$this->orders_id, $order_id);

            $update_stmt->execute();

            // return $retrieve_stmt;
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

        // return wild card results
        // wild card query for live search
        public function retriveWildCardResults($table_name, $search_data){
            $stmt = "SELECT * FROM take_db.akorno_food_menu 
                     WHERE food_item_id LIKE '%".$search_data."%'
                     OR food_item LIKE '%".$search_data."%'
                     OR price LIKE '%".$search_data."%'
                     OR type LIKE '%".$search_data."%'
                     OR category LIKE '%".$search_data."%'";


            // $query = sprintf(
            //     $stmt,
            //     $this->db_name,
            //     $table_name,

            //     $this->food_item_id,
            //     $this->food_item_id,

            //     $this->food_item_field,
            //     $this->food_item_field,

            //     $this->price_field,
            //     $this->price_field,

            //     $this->type_field,
            //     $this->type_field,

            //     $this->category_field,
            //     $this->category_field

            // );
            // $card = "%$search_data%";
            // $retrieve_stmt = $this->db_conn->prepare($stmt);
            // $retrieve_stmt->bindparam(':'.$this->food_item_id, $w);
            // $retrieve_stmt->bindValue(':'.$this->food_item_field, $card);
            // $retrieve_stmt->bindValue(':'.$this->price_field, $card);
            // $retrieve_stmt->bindValue(':'.$this->type_field, $card);
            // $retrieve_stmt->bindValue(':'.$this->category_field, $card);
            

            // $retrieve_stmt->execute();

            return $stmt;
            // var_dump($stmt);
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
    

    
//     $db = new InitDatabase();
//     $db->createDataBaseTables();



?>






