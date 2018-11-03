<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

    class MatronEntity{
        /**
         * Createa an Obj for matron.
         */

        // db resource
        static public $db;

        // credentials
        public $id;
        public $username;
        public $password;
        public $email;
        public $cafeteria;

        // constructor
        function __construct($username, $password, $email, $cafeteria){
            /**
             * constructor 
             */

            global $db;
            self::$db = $db;
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->cafeteria = $cafeteria;
        }

        function getUsername(){
            /**
             * username getter
             */
            return $this->username;
        }
        function getPassword(){
            /**
             * password getter.
             */
            return $this->password;
        }

        function getCafeteria(){
            /**
             * password getter.
             */
            return $this->cafeteria;
        }

        function getEmail(){
            /**
             * password getter.
             */
            return $this->email;
        }

        //=================MODEL FUNCTIONALITIES=========================//

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table,
                self::$db->matron_id,
                self::$db->matron_username,
                self::$db->matron_password,
                self::$db->matron_email,
                self::$db->belong_to_cafeteria,
                self::$db->matron_id,
                self::$db->matron_username,
                self::$db->matron_password,
                self::$db->matron_email,
                self::$db->belong_to_cafeteria
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->matron_id, $this->id);
            $insert_stmt->bindparam(':'.self::$db->matron_username, $this->username);
            $insert_stmt->bindparam(':'.self::$db->matron_password, $this->password);
            $insert_stmt->bindparam(':'.self::$db->matron_email, $this->email);
            $insert_stmt->bindparam(':'.self::$db->belong_to_cafeteria, $this->cafeteria);
            $insert_stmt->execute();
        }

        static function retrieveAll(){
            /**
             * returns all matron items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

 
        static function retrieveByID($id){
            /**
             * returns matron item with a particular id.
             */

            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table,
                self::$db->matron_id,
                self::$db->matron_id
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->matron_id, $id);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }

        static function retrieveByUsername($username){
            /**
             * returns matron item with a particular username.
             */
            $stmt = "SELECT * FROM %s.%s WHERE %s=:%s";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table,
                self::$db->matron_username,
                self::$db->matron_username
            );
            $retrieve_stmt = self::$db->db_conn->prepare($query);
            $retrieve_stmt->bindparam(':'.self::$db->matron_username, $username);
            
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
                self::$db->matron_table,
                self::$db->matron_username,
                self::$db->matron_username
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->matron_username, $username);
            
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
                self::$db->matron_table,
                self::$db->matron_id,
                self::$db->matron_id
            );
            $delete_stmt = self::$db->db_conn->prepare($query);
            $delete_stmt->bindparam(':'.self::$db->matron_id, $id);

            $delete_stmt->execute();
        }

    }

    // // test
    // $cus1 = new MatronEntity( "atule", "06002021","akorno@gmail.com", "akorno");
    // $cus2 = new MatronEntity( "atule", "06002021","akorno@gmail.com", "akorno");
    // $cus2->insert();
    // $cus1->insert();
    // $retrieve_stmt = matronEntity::retrieveAll();

    // while ($row = $retrieve_stmt->fetch()){ 
    //         $id = $row['matron_id'];
    //         $username = $row['matron_username'];
    //         var_dump($id);
    //         var_dump($username);
    //     }


?>