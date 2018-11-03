
<?php 
    // OrderEntity
    require_once("connection/db_models/db_order_entity.php");
    // FoodMenuEntity
    require_once("connection/db_models/db_food_menu_entity.php");
    // include files
    require_once('template-parts/customer-header.php');


?>
<!-- Processing form on submit -->
<?php
    if(isset($_POST['submit'])){
        // retrieve data from form
        $food_item_id = $_POST['food_item_id'];
        $food_item = $_POST['food_item'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        // instantiate FoodEntity
        $ak_fmu = new FoodMenuEntity("akorno_food_menu", $food_item, $price, $type, $category);
        // instantiate OrderEntity
        $ordEntity = new OrderEntity("akorno_orders");
        // insert into orders table
        $ordEntity->insertWithID($cus_id="1", $food_itm_id=$food_item_id);

    }

    // process when remove is clicked
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['action'])){
            if ($_GET['action'] =='remove_order'){
                //Delete an order by the id
                $db->deleteItemById($db->ak_orders_table, $db->orders_id, intval($_GET['orders_id']));
            }
        }
    }
?>



 <div class="wrapper"> <!-- WRAPPER -->
    <?php 
        // retrieve orders items belonging to customer and not served from orders table
        $orders = $db->retrieveByServedStatusAndID($db->ak_orders_table, "1");
        $number_of_orders = $orders->rowCount();
        require_once('template-parts/atule-customer-navbar.php'); 
        ?>

        <div class="atule-content"><!-- CONTENT CONTAINER-->

            <?php
                
                if($number_of_orders > 0 ){ ?>

                    <div class="container-fluid"> <!-- ORDER CONTAINER -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Your Orders</h4>
                                        </div>
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Food Item</th>
                                                    <th>Type</th>
                                                    <th>Price (Ghc)</th>
                                                </thead>
                                                <tbody>
                                                    <!-- Populate orders page with ordered items -->
                                                    <?php 
                                                        $total_price=0;
                                                        $orders_id_array = [];
                                                        while ($row = $orders->fetch()){ 
                                                            $food_item_id = $row['food_item_id'];
                                                            //  get undered food menu items from food menu table
                                                            $unserved_orders = $db->selectItemByColumn($db->ak_food_menu_table, $db->food_item_id, $food_item_id);
                                                            $unserved_row = $unserved_orders->fetch();  
                                                            // retrieve price
                                                            $price = $unserved_row['price'];
                                                            // total price
                                                            $total_price += $price;
                                                            // get orders id
                                                            $orders_id = $row['orders_id'];
                                                            array_push($orders_id_array, $orders_id);
                                                            
                                                    ?>
                                                            <tr>
                                                                <!-- form declaration -->
                                                                <form method="get" class="unserved-orders" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="<?php echo "order-".$orders_id;?>"></form>
                                                            
                                                                <td><?php echo $orders_id; ?></td>
                                                                <td><?php echo $unserved_row['food_item']; ?></td>
                                                                <td><?php echo $unserved_row['type']; ?></td>
                                                                <td><?php echo $price; ?></td>
                                                                
                                                                <input type="hidden" form="<?php echo "order-".$orders_id ?>" name="orders_id" value="<?php echo $orders_id; ?>">
                                                                <td><button type="submit" name="action" value="remove_order" form="<?php echo "order-".$orders_id; ?>" class="btn btn-danger btn-fill pull-right">Remove order</button></td>
                                                            </tr>

                                                        <?php } ?>

                                                        <!-- input value for submit orders form-->
                                                        <input type="hidden" form="submit_order_form" name="orders_ids" value="<?php echo serialize($orders_id_array); ?>">
                                                        
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <div class="row atule-orders-table"><!-- orders submit button -->
                                        <form method="post" action="customer-food-menu-test.php" id="submit_order_form"></form>
                                            <div class="col-md-3 atule-total-price">
                                                <label>Total Price: </label>
                                                <button type="button" value="<?php echo $total_price?>" class="btn btn-light disabled"><?php echo "Ghc".$total_price?></button>
                                                <input type="hidden" form="submit_order_form" name="total_price" value="<?php echo $total_price?>">                                                
                                            </div>
                                            <div class="col-md-3 atule-submit-orders">
                                            <button type="submit" name="submit_order" value="submit_order" form="submit_order_form" class="btn btn btn-success">Submit order</button>
                                                
                                            </div>
                                        </div><!-- end orders submit button -->
                                    </div> 
                                </div>
                            </div>
                    </div><!-- END ORDERS CONTAINER -->
            <?php } ?>



            <div class="row atule-searchbox"><!-- SEARCH AND FILTER BOXES -->
                <div class="col-md-4" >
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="search food menu " aria-describedby="sizing-addon1">
                    </div>
                </div>

                <div class="col-md-2 atule-filter">
                    <div class="input-group input-group-lg">
                        <div class="input-group-btn">
                            <!-- Button and dropdown menu -->
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Breakfast</a></li>
                                <li><a href="#">Lunch</a></li>
                                <li><a href="#">Supper</a></li>
                                <li><a href="#">Drinks & Snacks</a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control" aria-label="..." value="Filter By">
                    </div>
                </div>
            </div><!-- END SEARCH AND FILTER BOXES -->


                <div class="container-fluid"> <!-- FOOD MENU CONTAINER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Akornor Food Menu</h4>
                                    <p class="category">Here is a subtitle for this table</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    
                                    <table class="table  table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price (Ghc)</th>
                                            <th>Category</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                              $result2 = $db->selectAllFromTable('akorno_food_menu');
                                              while ($row = $result2->fetch()){?>
                                                    <form id="<?php echo $row['food_item_id']; ?>" method="post" action="" class='add-order-form'></form>
                                                    <tr>
                                                        <td><input class="atule-food-menu-item" type="text" id= "food_item_id" name="food_item_id" form="<?php echo $row['food_item_id']; ?>" value="<?php echo $row['food_item_id']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" id= "food_item" name="food_item" form="<?php echo $row['food_item_id']; ?>" value="<?php echo $row['food_item']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" id= "type" name="type" form="<?php echo $row['food_item_id']; ?>" value="<?php echo $row['type']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" id= "price" name="price" form="<?php echo $row['food_item_id']; ?>" value="<?php echo $row['price']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" id= "category" name="category" form="<?php echo $row['food_item_id']; ?>" value="<?php echo $row['category']; ?>" readonly="readonly"></td>
                                                        <td><button type="submit" name="submit" form="<?php echo $row['food_item_id']; ?>" class="btn btn btn-success">ADD</button></td>                                                        
                                                    </tr>
                                             <?php }

                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- END FOOF MENU CONTAINER -->

        </div><!-- END CONTENT DIV -->

        </div><!-- END WRAPPER DIV -->

<?php include('template-parts/atule-customer-footer.php'); ?>