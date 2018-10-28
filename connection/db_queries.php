<?php 
    // import credentials
    $connectionCredential = require "credentials.php";

    class Queries {
        // create database query
        public function createDatabaseQuery(){
            global $connectionCredential;
            $dbname =  $connectionCredential['credential']['dbname'];
            return "CREATE DATABASE IF NOT EXISTS $dbname";
        }
        // 




    }
?>