<?php 
    // set path to look
    // set_include_path('C:/xampp/htdocs"/takeaway-webtech/connection/');
    // import file
    // require get_include_path()."initDatabase.php";
    // instantiate obj
    // $db = new InitDatabase();

    class AdminEntity{

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


    }

    $adm = new AdminEntity("06002020", "atule", "1234");
    var_dump($adm);


?>