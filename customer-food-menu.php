
<?php 
    // set path to look
    // set_include_path('C:/xampp/htdocs/takeaway-webtech/connection/db_models/');
    // import files from connection folder
    // OrderEntity
    require_once("connection/db_models/db_order_entity.php");
    // FoodMenuEntity
    require_once("connection/db_models/db_food_menu_entity.php");
    // include files
    include('template-parts/customer-header.php');


?>
<!-- Processing form on submit -->
<?php 
    if(isset($_POST['submit'])){
        // retrieve data from form
        $food_item_id = $_POST['food_item_id'];
        echo $food_item_id;
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
?>



 <div class="wrapper"> <!-- WRAPPER -->
    <?php include('template-parts/atule-customer-navbar.php'); ?>
        <div class="atule-content"><!-- CONTENT CONTAINER-->

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
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <!-- Populate orders page with ordered items -->
                                            <?php 
                                                // retrieve orders items belonging to customer and not served from orders table
                                                $orders = $db->retrieveByServedStatusAndID($db->ak_orders_table, "1");
                                                
                                                while ($row = $orders->fetch()){ 
                                                    $food_item_id = $row['food_item_id'];
                                                    //  get undered food menu items from food menu table
                                                    $unserved_orders = $db->selectItemByColumn($db->ak_food_menu_table, $db->food_item_id, $food_item_id);
                                                    $unserved_row = $unserved_orders->fetch();  
                                            ?>

                                                    <tr>
                                                        <td><?php echo $row['orders_id']; ?></td>
                                                        <td><?php echo $unserved_row['food_item']; ?></td>
                                                        <td><?php echo $unserved_row['type']; ?></td>
                                                        <td><?php echo $unserved_row['price']; ?></td>
                                                        
                                                        <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>
                                                    </tr>
                                                <?php } ?>
                                                
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row atule-orders-table"><!-- orders submit button -->
                                    <div class="col-md-3 atule-total-price">
                                        <label>Total Price: </label>
                                        <button type="button" class="btn btn-light disabled">Ghc13.50</button>
                                    </div>
                                    <div class="col-md-3 atule-submit-orders">
                                        <button type="submit" class="btn btn btn-success">Submit order</button>
                                    </div>
                                </div><!-- end orders submit button -->
                            </div> 
                        </div>
                    </div>
            </div><!-- END ORDERS CONTAINER -->



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
                                    <form id="menu_form" method="post" action=""></form>
                                    <table class="table  table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                              $result2 = $db->selectAllFromTable('akorno_food_menu');
                                              while ($row = $result2->fetch()){?>
                                                    <tr>
                                                        <td><input class="atule-food-menu-item" type="text" name="food_item_id" form="menu_form" value="<?php echo $row['food_item_id']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" name="food_item" form="menu_form" value="<?php echo $row['food_item']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" name="type" form="menu_form" value="<?php echo $row['type']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" name="price" form="menu_form" value="<?php echo $row['price']; ?>" readonly="readonly"></td>
                                                        <td><input class="atule-food-menu-item" type="text" name="category" form="menu_form" value="<?php echo $row['category']; ?>" readonly="readonly"></td>
                                                        <td><button type="submit" name="submit" form="menu_form" class="btn btn btn-success">ADD</button></td>                                                        
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