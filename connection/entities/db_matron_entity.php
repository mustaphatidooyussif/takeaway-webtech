<?php 
    // set path to look
    // set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    // require get_include_path()."initDatabase.php";
    // instantiate obj
    // $db = new InitDatabase();

    class MatronEntity{

        // credentials
        public $id;
        public $username;
        public $password;

        // constructor
        function __construct($id, $username, $password){
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


    }

    $mat = new MatronEntity("06002020", "atule", "1234");
    // var_dump($mat);



?>