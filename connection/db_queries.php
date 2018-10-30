<?php 

    class Queries {

        // build customer history table query
        public function buildCustomerHistoryTableQuery($db_name, $table_name, $id_field, $c_id, $customer_id, $customer_table, $fk_cafeteria_id1, $fk_cafeteria_id2, $cafeteria_table1, $cafeteria_table2){
            $customerHistoryTabeQuery = "CREATE TABLE IF NOT EXISTS `%s`.`%s` (
                `%s` INT NOT NULL AUTO_INCREMENT,
                `%s` INT NOT NULL,
                `%s` INT NOT NULL,
                `%s` INT NOT NULL,
                PRIMARY KEY (`%s`),
                FOREIGN KEY (`%s`)
                    REFERENCES `%s`.`%s` (`%s`),
                FOREIGN KEY (`%s`)
                    REFERENCES `%s`.`%s` (`%s`),
                FOREIGN KEY (`%s`)
                    REFERENCES `%s`.`%s` (`%s`)
            )";

            return sprintf(
                $customerHistoryTabeQuery,
                $db_name,
                $table_name,

                $id_field,
                $customer_id,
                $fk_cafeteria_id1,
                $fk_cafeteria_id2,
                $id_field,

                $customer_id,
                $db_name, 
                $customer_table,
                $customer_id,

                $fk_cafeteria_id1,
                $db_name, 
                $cafeteria_table1,
                $c_id,

                $fk_cafeteria_id2,
                $db_name,
                $cafeteria_table2,
                $c_id
            );
        }

        // build cafeteria history table query
        public function buildCafeteriaHistoryTableQuery($db_name, $table_name, $id_field, $fk_cafeteria_id, $cafeteria_table){
            
            $cafeteriaHistoryTabeQuery = "CREATE TABLE IF NOT EXISTS `%s`.`%s` (
                `%s` INT NOT NULL AUTO_INCREMENT,
                `%s` INT NOT NULL,
                PRIMARY KEY (`%s`),
                FOREIGN KEY (`%s`)
                    REFERENCES `%s`.`%s` (`%s`)
            )";

            return sprintf(
                $cafeteriaHistoryTabeQuery,
                $db_name,$table_name,
                $id_field,$fk_cafeteria_id,$id_field,
                $fk_cafeteria_id,$db_name,$cafeteria_table,$fk_cafeteria_id
            );
        }

        // build food menu table query
        public function buildFoodMenuTableQuery($db_name, $table_name, $id_field, $food_item_field, $price_field, $type_field, $category_field){    
            $foodMenuTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                %s INT NOT NULL AUTO_INCREMENT,
                %s VARCHAR(45) NOT NULL,
                %s INT NOT NULL,
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
                `%s` INT NOT NULL,
                `%s` INT NULL DEFAULT 0,
                `%s` INT NOT NULL,
                `%s` INT NOT NULL,
                `%s` INT NOT NULL,
                PRIMARY KEY (`%s`),
                FOREIGN KEY (`%s`) 
                    REFERENCES `%s`.`%s` (`%s`),
                FOREIGN KEY (`%s`)
                    REFERENCES `%s`.`%s` (`%s`)
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
                $food_menu_id,
                $matron_id,
                $db_name,
                $matron_table,
                $matron_id,
                $customer_id,
                $db_name,
                $customer_table,
                $customer_id
            );
        }

        // build persons table query
        public function buildLoginTableQuery($db_name, $table_name, $id_field_name, $username_field_name, $password_field_name){            
            $loginTableQuery = "CREATE TABLE IF NOT EXISTS %s.%s (
                    %s INT NOT NULL AUTO_INCREMENT,
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