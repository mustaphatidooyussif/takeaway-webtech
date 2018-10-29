<?php 

    class Queries {

        // build orders table query
        public function createOrdersTableQuery(){

            $ordersTableQuery = "CREATE TABLE IF NOT EXISTS orders (
                id INT NOT NULL AUTO_INCREMENT,
                PRIMARY KEY(id),
                customer_id INT NOT NULL,
                food_item VARCHAR(50),
                price INT,  
                quantity INT,
                serve VARCHAR(50),
                customer_name VARCHAR(50),
                customer_id INT,
                served_by VARCHAR(50)
            )";
        }

        // build persons table query
        public function createLoginTableQuery($table_name, $id_field_name, $username_field_name, $password_field_name){

            $loginTableQuery = "CREATE TABLE IF NOT EXISTS %s (
                %s INT NOT NULL AUTO_INCREMENT,
                PRIMARY KEY(%s),
                %s VARCHAR(30) NOT NULL,
                %s VARCHAR(50)
            )";

            return sprintf(
                $loginTableQuery,
                $table_name,
                $id_field_name,
                $id_field_name,
                $username_field_name,
                $password_field_name
            );
        }

        // create database query
        public function createDatabaseQuery($db_name){
            $db = "CREATE DATABASE IF NOT EXISTS %s";
            
            return sprintf(
                $db,
                $db_name
            );
        }

    


    }
?>