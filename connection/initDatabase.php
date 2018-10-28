<?php
    // import file
    require "connection.php";
    require "db_queries.php";

    $queries = new Queries();
    $conn = new ConnectionProvider();

    class InitDatabase {
        // This class creates all tables 


        private $db_conn;

        // constructor
        public function __construct(){
            global $conn, $connectionCredential, $queries;
            $this->db_conn = $conn->getConnection();
            
            $this->db_conn->exec($queries->createDatabaseQuery());
        }
    }

    $db = new InitDatabase();



?>






