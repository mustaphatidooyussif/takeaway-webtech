<?php 

    class Queries {

        // build customer history table query
        public function buildCustomerHistoryTableQuery($db_name, $table_name, $id_field, $c_id, $customer_id, $customer_table, $fk_cafeteria_id1, $fk_cafeteria_id2, $cafeteria_table1, $cafeteria_table2){
            $customerHistoryTabeQuery = "CREATE TABLE IF NOT EXISTS `%s`.`%s` (
                `%s` INT NOT NULL AUTO_INCREMENT,
                `%s` VARCHAR(45) NOT NULL,
                `%s` VARCHAR(45),
                `%s` VARCHAR(45),
                PRIMARY KEY (`%s`)
            )";

            return sprintf(
                $customerHistoryTabeQuery,
                $db_name,
                $table_name,

                $id_field,
                $customer_id,
                $fk_cafeteria_id1,
                $fk_cafeteria_id2,
                $id_field
            );
        }

        // build cafeteria history table query
        public function buildCafeteriaHistoryTableQuery($db_name, $table_name, $id_field, $fk_cafeteria_id, $cafeteria_table){
            
            $cafeteriaHistoryTabeQuery = "CREATE TABLE IF NOT EXISTS `%s`.`%s` (
                `%s` INT NOT NULL AUTO_INCREMENT,
                `%s` VARCHAR(45) NOT NULL,
                PRIMARY KEY (`%s`)
            )";

            return sprintf(
                $cafeteriaHistoryTabeQuery,
                $db_name,$table_name,
                $id_field,$fk_cafeteria_id,
                $id_field
            );
        }

        // build cafeteria  table query
        public function buildCafeteriaTableQuery($db_name, $table_name, $id, $cafeteria_user_name, $cafeteria_email){
            
            $cafeteriaTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                %s INT NOT NULL AUTO_INCREMENT,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                PRIMARY KEY(%s)
            )";

            return sprintf(
                $cafeteriaTableQuery,
                $db_name,
                $table_name,
                $id, 
                $cafeteria_user_name, 
                $cafeteria_email,
                $id
            );
        }
        
        // build food menu table query
        public function buildFoodMenuTableQuery($db_name, $table_name, $id_field, $food_item_field, $price_field, $type_field, $category_field){  

            $foodMenuTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                %s INT NOT NULL AUTO_INCREMENT,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                PRIMARY KEY (%s)
            )";

            return sprintf(
                $foodMenuTableQuery,
                $db_name,
                $table_name,
                $id_field,
                $food_item_field,
                $price_field,
                $type_field,
                $category_field,
                $id_field
            );
        }

        // build orders table query
        public function buildOrdersTableQuery($db_name, $table_name, $id_field, $served_field, $food_menu_id, $matron_id, $customer_id, $matron_table, $customer_table, $food_menu_table){
            $ordersTableQuery = "CREATE TABLE IF NOT EXISTS `%s`.`%s` (
                `%s` INT NOT NULL AUTO_INCREMENT,
                `%s` INT NULL DEFAULT 0,
                `%s` VARCHAR(45),
                `%s` VARCHAR(45),
                `%s` VARCHAR(45),
                PRIMARY KEY (`%s`)
            )";
            
            return sprintf(
                $ordersTableQuery,
                $db_name,
                $table_name,
                $id_field,
                $served_field,
                $food_menu_id,
                $matron_id,
                $customer_id,
                $id_field,

                $food_menu_id,
                $db_name,
                $food_menu_table,
                $food_menu_id
            );
        }

        // build persons table query
        public function buildLoginTableQuery($db_name, $table_name, $id_field_name, $username_field_name, $password_field_name){            
            $loginTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                    %s INT NOT NULL AUTO_INCREMENT ,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    PRIMARY KEY (%s)
            )";

            return sprintf(
                $loginTableQuery,
                $db_name,
                $table_name,
                $id_field_name,
                $username_field_name,
                $password_field_name,
                $id_field_name
            );
        }

        // build admin table query
        public function buildAdminTableQuery($db_name, $admin_table_name, $id, $admin_username, $admin_email, $admin_password, $admin_aboutme){            
            $loginTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                    %s INT NOT NULL AUTO_INCREMENT,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    PRIMARY KEY (%s)
            )";

            return sprintf(
                $loginTableQuery,
                $db_name,
                $admin_table_name,
                $admin_aboutme,
                $id,
                $admin_username,
                $admin_email,
                $admin_password,
                $admin_aboutme,
                $id
            );
        }

        public function buildCustomerRegistrationQuery($db_name, $table_name, $id, $firstname, $lastname, $username, $email, $password, $c_password){
            $tableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                %s INT NOT NULL AUTO_INCREMENT,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                %s VARCHAR(45) NOT NULL,
                PRIMARY KEY (%s)
            )";

            return sprintf(
                $tableQuery,
                $db_name,
                $table_name,
                $id,
                $firstname,
                $lastname,
                $username,
                $email,
                $password,
                $c_password,
                $id

            );
        }

        // build persons table query
        public function buildMatronLoginTableQuery($db_name, $table_name, $id_field_name, $username_field_name, $password_field_name, $email, $belong_to_cafeteria){            
            $loginTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                    %s INT NOT NULL AUTO_INCREMENT,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    %s VARCHAR(45) NOT NULL,
                    PRIMARY KEY (%s)
            )";

            return sprintf(
                $loginTableQuery,
                $db_name,
                $table_name,
                $id_field_name,
                $username_field_name,
                $password_field_name,
                $email,
                $belong_to_cafeteria,
                $id_field_name

            );
        }
        // create database query
        public function buildDatabaseQuery($db_name){
            $db = "CREATE DATABASE IF NOT EXISTS %s";
            
            return sprintf(
                $db,
                $db_name
            );
        }

        // use a database
        public function buildUseDbQuery($db_name){
            $db_use = "USE %s";

            return sprintf(
                $db_use,
                $db_name
            );
        }

    }
?>