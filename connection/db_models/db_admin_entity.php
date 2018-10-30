<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();


    class AdminEntity{
        /**
         * Createa an Obj for admin.
         */

        // db resource
        static public $db;

        // credentials
        public $id;
        public $username;
        public $password;

        // constructor
        function __construct($id, $username, $password){
            /**
             * constructor 
             */

            global $db;
            self::$db = $db;

            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }


        //=================MODEL FUNCTIONALITIES=========================//

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s) VALUES (:%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table,
                self::$db->admin_id,
                self::$db->admin_username,
                self::$db->admin_password,
                self::$db->admin_id,
                self::$db->admin_username,
                self::$db->admin_password
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->admin_id, $this->id);
            $insert_stmt->bindparam(':'.self::$db->admin_username, $this->username);
            $insert_stmt->bindparam(':'.self::$db->admin_password, $this->password);
            $insert_stmt->execute();
        }

        static function retrieveAll(){
            /**
             * returns all admin items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

 
        static function retrieveByID($id){
            /**
             * returns admin item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table,
                self::$db->admin_id,
                self::$db->admin_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->admin_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        static function retrieveByUsername($username){
            /**
             * returns admin item with a particular username.
             */
            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table,
                self::$db->admin_username,
                self::$db->admin_username
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->admin_username, $username);
            
            $retrieve_stmt->execute();
            
            return $retrieve_stmt;
        }

        static function deleteByUsername($username){
            /**
             * deletes item with a particular username
             */
            $stmt = "DELETE * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table,
                self::$db->admin_username,
                self::$db->admin_username
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->admin_username, $username);
            
            $delete_stmt->execute();
        }

        static function deleteByID($id){
            /**
             * deletes item with particular id.
             */
            
            $stmt = "DELETE * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table,
                self::$db->admin_id,
                self::$db->admin_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->admin_id, $id);

            $delete_stmt->execute();
        }


    }

    // test
    $cus1 = new AdminEntity("06002021", "atule", "1234");
    $cus2 = new AdminEntity("06002022", "atule1", "1234");
    $cus3 = new AdminEntity("06002023", "atule2", "1234");
    // $cus2->insert();
    // $cus3->insert();
    $retrieve_stmt = AdminEntity::retrieveAll();

    while ($row = $retrieve_stmt->fetch()){ 
            $id = $row['admin_id'];
            $username = $row['admin_username'];
            var_dump($id);
            var_dump($username);
        }

    
?>