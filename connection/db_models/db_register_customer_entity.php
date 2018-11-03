<?php 

    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

    class RegisterCustomer{

        public $id;
        public $firstname;
        public $lastname;
        public $username;
        public $email;
        public $password;
        public $confirm_pass;
        static public $db;


        function __construct($firstname,$lastname,$username,$email,$password,$confirm_pass){

            global $db;
            self::$db = $db;
            $this->firstname = $firstname;
            $this->lastname = $lastname;
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
            $this->confirm_pass = $confirm_pass;

        }

        function insert(){
            /**
             * inserts obj credentials to database when invoked.
             */

            $stmt = "INSERT INTO %s.%s (%s, %s, %s, %s, %s, %s) VALUES (:%s, :%s, :%s, :%s, :%s, :%s);";

            $query = sprintf(
                $stmt,
                self::$db->db_name,
                self::$db->registration_table,
                self::$db->new_user_firstname,
                self::$db->new_user_lastname,
                self::$db->new_user_username,
                self::$db->new_user_email,
                self::$db->new_user_password,
                self::$db->new_user_confirm_password,
                self::$db->new_user_firstname,
                self::$db->new_user_lastname,
                self::$db->new_user_username,
                self::$db->new_user_email,
                self::$db->new_user_password,
                self::$db->new_user_confirm_password

            );

            $insert_stmt = self::$db->db_conn->prepare($query);

            $insert_stmt->bindparam(':'.self::$db->new_user_firstname, $this->firstname);
            $insert_stmt->bindparam(':'.self::$db->new_user_lastname, $this->lastname);
            $insert_stmt->bindparam(':'.self::$db->new_user_email, $this->username);
            $insert_stmt->bindparam(':'.self::$db->new_user_password, $this->email);
            $insert_stmt->bindparam(':'.self::$db->new_user_confirm_password, $this->password);
            $insert_stmt->bindparam(':'.self::$db->new_user_confirm_password, $this->confirm_pass);

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
                self::$db->registration_table
            );

            $retrieve_stmt = self::$db->db_conn->prepare($query);

            $retrieve_stmt->execute();

            return $retrieve_stmt;
        }
    }
?>