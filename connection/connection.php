<?php 
    // import credentials
    $connectionCredential = include "credentials.php";

    class ConnectionProvider {

        private $conn;

        // Constructor
        public function __construct(){
                global $connectionCredential;
                $host = $connectionCredential['credential']['host'];
                $dns = "mysql:host=$host";

                try {
                    $this->conn = new PDO(
                        $dns, 
                        $connectionCredential['credential']['db_username'], 
                        $connectionCredential['credential']['db_password'], 
                        $connectionCredential['credential']['opt']
                    );
                }    
                catch(PDOException $e){
                    echo "Connection Failed" . $e->getMessage();
                }
        }

        // connection getter
        public function getConnection(){
            return $this->conn;
        }

        // destroy connection
        public function __destruct(){
            unset($this->conn);
        }
    }

?>