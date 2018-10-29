<?php
    // import file
    require "connection.php";
    require "db_queries.php";

    $queries = new Queries();
    $conn = new ConnectionProvider();

    class InitDatabase {
        //===This class creates all tables===//

        private $db_conn;

        // constructor
        public function __construct(){
            global $conn, $connectionCredential, $queries;
            $this->db_conn = $conn->getConnection();

            // create database if not created
            $this->db_conn->exec($queries->createDatabaseQuery(
                                        $connectionCredential['credential']['dbname']
                                    )
                                );
        }


        // create tables
        // public function createDataBaseTables(){

        // }
    }

    $db = new InitDatabase();



?>






