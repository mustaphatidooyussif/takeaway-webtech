<?php 

    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

    class CustomerEntity{
        /**
         * Createa an Obj for customer.
         */

        // db resource
        static public $db;

        // credentials
        public $id;
        public $username;
        public $password;

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

        function getID(){
            /**
             * id getter.
             */
            return $this->id;
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

        //=================MODEL FUNCTIONALITIES=========================//

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s) VALUES (:%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table,
                self::$db->matron_id,
                self::$db->matron_username,
                self::$db->matron_password,
                self::$db->matron_id,
                self::$db->matron_username,
                self::$db->matron_password
            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->matron_id, $this->id);
            $insert_stmt->bindparam(':'.self::$db->matron_username, $this->username);
            $insert_stmt->bindparam(':'.self::$db->matron_password, $this->password);
            $insert_stmt->execute();
        }

        static function retrieveAll(){
            /**
             * returns all customer items in the database table.
             */

            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();
            $row = $retrieve_stmt->fetch();

            while ($row){ 
                    $id = $row['matron_id'];
                    $username = $row['matron_username'];
                    var_dump($id);
                    var_dump($username);
                }
        }

 
        static function retrieveByID($id){
            /**
             * returns customer item with a particular id.
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

            return $retrieve_stmt->execute();
        }

        static function retrieveByUsername($username){
            /**
             * returns customer item with a particular username.
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
            
            return $retrieve_stmt->execute();
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

    // test
    $cus = new CustomerEntity("06002021", "atule", "1234");
    // $cus->insert();
    $cus->retrieveAll();
    // while ($row = $data->fetch()){ 
    //     $id = $cus['matron_id'];
    //     $username = $cus['matron_username'];
    //     var_dump($id);
    //     var_dump($username);
    // }
    // var_dump($data);



?>