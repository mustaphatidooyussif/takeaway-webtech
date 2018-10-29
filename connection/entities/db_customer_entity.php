<?php 

    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

    class CustomerEntity{

        // db resource
        public $db;


        // credentials
        public $id;
        public $username;
        public $password;

        // constructor
        function __construct($id, $username, $password){
            global $db;
            $this->db = $db;

            $this->id = $id;
            $this->username = $username;
            $this->password = $password;
        }

        // GETTERS

        // id getter
        function getID(){
            return $this->id;
        }
        // username getter
        function getUsername(){
            return $this->username;
        }
        // password getter
        function getPassword(){
            return $this->password;
        }

        //=================MOEDL FUNCTIONALITIES=========================//

        function insert(){
            $stmt = "INSERT INTO %s.%s (%s, %s, %s) VALUES (:%s, :%s, :%s)";

            $query = sprintf(
                $stmt,
                $this->db->db_name,
                $this->db->matron_table,
                $this->db->matron_id,
                $this->db->matron_username,
                $this->db->matron_password,
                $this->db->matron_id,
                $this->db->matron_username,
                $this->db->matron_password
            );

            $insert_stmt = $this->db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.$this->db->matron_id, $this->id);
            $insert_stmt->bindparam(':'.$this->db->matron_username, $this->username);
            $insert_stmt->bindparam(':'.$this->db->matron_password, $this->password);
            $insert_stmt->execute();
        }

        // returns all items in table
        static function retrieveAll(){
            $stmt = "SELECT * FROM %s.%s;";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->matron_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            return $retrieve_stmt->execute();
        }


        // return item with particular id
        static function retrieveByID($id){
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

        // return item with particular username
        static function retrieveByUsername($username){
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


    }

    // test
    $cus = new CustomerEntity("06002021", "atule", "1234");
    $cus->insert();
    $cus->retrieveAll();
    // var_dump($cus);



?>