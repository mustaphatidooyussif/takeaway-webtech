<?php 

    // set path to look
    set_include_path('C:/xampp/htdocs/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();


    class FoodMenuEntity{
        /**
         * Createa an Obj for food menu item.
         */

        // db resource
        static public $db;

        // credentials
        public $owner; // use the table name where the obj belongs in the database
        public $item;
        public $price;
        public $type;
        public $category;

        // constructor
        function __construct($owner, $item, $price, $type, $category){
            /**
             * constructor 
             */

            global $db;
            self::$db = $db;

            $this->owner = $owner;
            $this->item = $item;
            $this->price = $price;
            $this->type = $type;
            $this->category = $category;
        }

        // GETTERS

        function getOwner(){
            /**
             * owner getter
             */

            return $this->owner;
        }
        function getItem(){
            /**
             * item getter
             */

            return $this->item;
        }
        function getPrice(){
            /**
             * price getter
             */

            return $this->price;
        }
        function getType(){
            /**
             * type getter
             */
            return $this->type;
        } 
        function getCategory(){
            /**
             * category getter
             */
            return $this->category;
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
                $this->owner,

                self::$db->food_item_field,
                self::$db->price_field,
                self::$db->type_field,
                self::$db->category_field,
                
                self::$db->food_item_field,
                self::$db->price_field,
                self::$db->type_field,
                self::$db->category_field
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->food_item_field, $this->item);
            $insert_stmt->bindparam(':'.self::$db->price_field, $this->price);
            $insert_stmt->bindparam(':'.self::$db->type_field, $this->type);
            $insert_stmt->bindparam(':'.self::$db->category_field, $this->category);

            $insert_stmt->execute();
        }

        public function retrieveAll(){
            /**
             * returns all foodMenuEntity items in the database table.
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
             * returns foodMenuEntity item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->food_item_id,
                self::$db->food_item_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->food_item_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        public function retrieveByItem($item){
            /**
             * returns foodMenuEntity item with a particular item name.
             */
            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->food_item_field,
                self::$db->food_item_field
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->food_item_field, $item);
            
            $retrieve_stmt->execute();
            
            return $retrieve_stmt;
        }

        public function retrieveByCategory($category){
            /**
             * returns foodMenuEntity items in a particular category.
             */
            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->category_field,
                self::$db->category_field
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->category_field, $category);
            
            $retrieve_stmt->execute();
            
            return $retrieve_stmt;
        }


        public function deleteByItem($item){
            /**
             * deletes foodMenuEntity with a particular item name
             */

            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->food_item_field,
                self::$db->food_item_field
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->food_item_field, $item);
            
            $delete_stmt->execute();
        }

        public function deleteByID($id){
            /**
             * deletes foodMenuEntity with a particular id.
             */
            
            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                $this->owner,
                self::$db->food_item_id,
                self::$db->food_item_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->food_item_id, $id);

            $delete_stmt->execute();
        }

    }

    // test
    // $cus1 = new FoodMenuEntity("bigben_food_menu", "312", "Rice", "Ghc8.5", "full Portion", "Breakfast");
    // $cus2 = new FoodMenuEntity("bigben_food_menu", "455", "Banku", "Ghc8.5", "half Portion", "Breakfast");
    // $cus3 = new FoodMenuEntity("akorno_food_menu", "4565", "Waakye", "Ghc8.5", "half Portion", "Breakfast");
    // $cus1->insert();
    // $cus2->insert();
    // $cus3->insert();
    // $retrieve_stmt = $cus1->retrieveAll();

    // while ($row = $retrieve_stmt->fetch()){ 
    //         $id = $row['food_item_id'];
    //         $food_item = $row['food_item'];
    //         $price = $row['price'];
    //         $category = $row['category'];
    //         echo "<br>";
    //         var_dump($id);
    //         var_dump($food_item);
    //         var_dump($price);
    //         var_dump($category);
    //     }

?>