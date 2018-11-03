<?php 
    // set path to look
    set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    require_once get_include_path()."initDatabase.php";
    // instantiate obj
    $db = new InitDatabase();

class Cafeteria{
     // db resource
    static public $db;
    public $username;
    public $email;

    function __construct($username, $email){
        global $db;
        self::$db = $db;
        $this->username = $username;
        $this->email = $email;
    }

    function insert(){
        /**
         * inserts obj credentials to database when invoked.
         */

        $stmt = "INSERT INTO %s.%s (%s, %s) VALUES (:%s, :%s)";

        $query = sprintf(
            $stmt,
            self::$db->db_name,
            self::$db->cafeteria_table,
            self::$db->cafeteria_uname,
            self::$db->cafeteria_email,
            self::$db->cafeteria_uname,
            self::$db->cafeteria_email
        );
        $insert_stmt = self::$db->db_conn->prepare($query);

        // $insert_stmt->bindparam(':'.self::$db->admin_id, $this->id);
        $insert_stmt->bindparam(':'.self::$db->cafeteria_uname, $this->username);
        $insert_stmt->bindparam(':'.self::$db->cafeteria_email, $this->email);
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
            self::$db->cafeteria_table
        );

        $retrieve_stmt = self::$db->db_conn->prepare($query);
        
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
            self::$db->cafeteria_table,
            self::$db->cafeteria_uname,
            $username
        );
        $retrieve_stmt = self::$db->db_conn->prepare($query);
        $retrieve_stmt->bindparam(':'.self::$db->cafeteria_uname, $username);
        
        $retrieve_stmt->execute();
        
        return $retrieve_stmt;
    }

    

}

?>