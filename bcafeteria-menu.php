<?php include('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php include('template-parts/bcafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/cafeteria-navbar.php'); ?>
            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                  
                  <!--Break fast table-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="header center-only">
                            <h4 class="title">AVAILABLE MENU</h4>
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Break Fast</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Food Item Id</th>
                                        <th>Food Item</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        require"connection/initDatabase.php";
                                        require"connection/db_models/db_food_menu_entity.php";

                                        $db = new initDatabase();
                                        $db->createDataBaseTables();

                                        //$cus4 = new FoodMenuEntity("bigben_food_menu", "id", "Rice", "Ghc8.5", "full Portion", "Breakfast");
                                        
                                       $retrieve_stmt = $db->retrieveByCategory("Breakfast","bigben_food_menu");
                                        //$cus4->retrieveAll();
                                       //$retrieve_stmt = $db->retrieveAll("bigben_food_menu");
                                        

                                            while ($row = $retrieve_stmt->fetch()){
                                                $id = $row["food_item_id"];
                                                $food = $row["food_item"];
                                                $price = $row["price"];
                                                $type = $row["type"];
                                                $cat = $row["category"];
                                                

                                            echo "<tr>";
                                            echo "<td>".$id. "</td>";
                                            echo "<td>".$food. "</td>";
                                            echo "<td>".$price."</td>";
                                            echo "<td>".$type."</td>";
                                            echo "<td>".$cat."</td>";
                                            echo "</tr>";
                                         }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--Lunch table-->
                    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Lunch </h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Food Item Id</th>
                                        <th>Food Item</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        //require"connection/initDatabase.php";
                                       // require"connection/db_models/db_food_menu_entity.php";

                                        $db = new initDatabase();
                                        $db->createDataBaseTables();

                                        //$cus4 = new FoodMenuEntity("bigben_food_menu", "id", "Rice", "Ghc8.5", "full Portion", "Breakfast");
                                        
                                       $retrieve_stmt = $db->retrieveByCategory("Lunch","bigben_food_menu");
                                        //$cus4->retrieveAll();
                                       //$retrieve_stmt = $db->retrieveAll("bigben_food_menu");
                                        

                                            while ($row = $retrieve_stmt->fetch()){
                                                $id = $row["food_item_id"];
                                                $food = $row["food_item"];
                                                $price = $row["price"];
                                                $type = $row["type"];
                                                $cat = $row["category"];
                                                

                                            echo "<tr>";
                                            echo "<td>".$id. "</td>";
                                            echo "<td>".$food. "</td>";
                                            echo "<td>".$price."</td>";
                                            echo "<td>".$type."</td>";
                                            echo "<td>".$cat."</td>";
                                            echo "</tr>";
                                         }

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                  <!--Supper table-->
                  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Supper</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Food Item Id</th>
                                        <th>Food Item</th>
                                        <th>Price</th>
                                        <th>Type</th>
                                        <th>Category</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        //require"connection/initDatabase.php";
                                       // require"connection/db_models/db_food_menu_entity.php";

                                        $db = new initDatabase();
                                        $db->createDataBaseTables();

                                        //$cus4 = new FoodMenuEntity("bigben_food_menu", "id", "Rice", "Ghc8.5", "full Portion", "Breakfast");
                                        
                                       $retrieve_stmt = $db->retrieveByCategory("Supper","bigben_food_menu");
                                        //$cus4->retrieveAll();
                                       //$retrieve_stmt = $db->retrieveAll("bigben_food_menu");
                                        

                                            while ($row = $retrieve_stmt->fetch()){
                                                $id = $row["food_item_id"];
                                                $food = $row["food_item"];
                                                $price = $row["price"];
                                                $type = $row["type"];
                                                $cat = $row["category"];
                                                

                                            echo "<tr>";
                                            echo "<td>".$id. "</td>";
                                            echo "<td>".$food. "</td>";
                                            echo "<td>".$price."</td>";
                                            echo "<td>".$type."</td>";
                                            echo "<td>".$cat."</td>";
                                            echo "</tr>";
                                         }

                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
                            
<?php include('template-parts/admin-footer.php'); 
?> 