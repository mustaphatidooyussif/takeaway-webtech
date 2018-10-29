<?php 
    class MatronEnitity{
        public $id;
        public $username;
        public $email;

        function __contstruct($id, $username, $email){
            $this->$id = $id;
            $this->$username = $username;
            $this->$email;
        }
    }

?>