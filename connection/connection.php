<?php 
    require("credentials.php");

    class ConnectionProvider {
        private $conn;

        function getConnection() {
        if ($conn == null || is_resource($conn)) {
            try {
                $conn = new PDO("mysql:host=$host", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "CREATE DATABASE $database";
                // use exec() because no results are returned
                $conn->exec($sql);

               //Create admin table if not exist.
               $admins = "CREATE TABLE IF NOT EXISTS admins (
                    id INT NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY(id),
                    username VARCHAR(30) NOT NULL,
                    email VARCHAR(50)
                )";

               $matrons = "CREATE TABLE IF NOT EXISTS matrons (
                    id INT NOT NULL AUTO_INCREMENT,
                    PRIMARY KEY(id),
                    username VARCHAR(30) NOT NULL,
                    email VARCHAR(50)
                )";

                //check price datatype
                $orders = "CREATE TABLE IF NOT EXISTS orders (
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

                $conn->exec($admins);
                $conn->exec($matrons);
                $conn->exec($orders);
                return $conn;
                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                }
        }
        }

        function createDatabase(){

        }
        $conn = null; 
    }

?>