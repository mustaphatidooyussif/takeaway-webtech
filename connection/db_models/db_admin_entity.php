<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();


    class AdminEntity{
        /**
         * Createa an Obj for admin.
         */

        // db resource
        static public $db;

        // credentials
        public $username;
        public $admin_email;
        public $password;
        public $aboutme;

        // constructor
        function __construct($username, $admin_email,  $password, $aboutme){
            /**
             * constructor 
             */

            global $db;
            self::$db = $db;

            $this->username = $username;
            $this->admin_email = $admin_email;
            $this->password = $password;
            $this->aboutme = $aboutme;
        }


        //=================MODEL FUNCTIONALITIES=========================//

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s);";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->admin_table_name,
                
                self::$db->admin_username,
                self::$db->admin_email,
                self::$db->admins_passwords,
                self::$db->admin_aboutme,

                self::$db->admin_username,
                self::$db->admin_email,
                self::$db->admins_passwords,
                self::$db->admin_aboutme
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->admin_username, $this->username);
            $insert_stmt->bindparam(':'.self::$db->admin_email, $this->admin_email);
            $insert_stmt->bindparam(':'.self::$db->admins_passwords, $this->password);
            $insert_stmt->bindparam(':'.self::$db->admin_aboutme, $this->aboutme);
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
            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

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
            
            $stmt = "DELETE FROM %s.%s WHERE %s=:%s";

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

    // // test
    // $cus1 = new AdminEntity("atule","atule@example.com", "06002021","I am a student");

    // $cus1->insert();
    // $retrieve_stmt = AdminEntity::retrieveAll();

    // while ($row = $retrieve_stmt->fetch()){ 
    //         $id = $row['admin_id'];
    //         $username = $row['admin_username'];
    //         var_dump($id);
    //         var_dump($username);
    //     }

    
?>