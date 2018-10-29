<?php 
    require("entities/admin-entity.php");
    require("../connection.php");

    class AdminModel{
        
        function addAdmin(){
            $conn = new ConnectionProvider().getConnection();//get database connection.

            $sql = "INSERT INTO admins (username, email) VALUES ('John', 'Doe', 'john@example.com')";
        }
    }
?>