<?php
 if(isset($_POST["add_to_cart"]))  
 { 
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "food_item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'food_item_id'               =>     $_GET["food_item_id"],  
                     'food_item_name'               =>     $_POST["food_item"],  
                     'price'          =>     $_POST["price"],  
                     'type'          =>     $_POST["type"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
          //echo "kkkkkkkkkkkkkkkkkkkkkk";
           $item_array = array(  
                'food_item_id'               =>     $_POST["food_item_id"],  
                'food_item_name'               =>     $_POST["food_item"],  
                'price'          =>     $_POST["price"],  
                'type'          =>     $_POST["type"] 
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  

      print_r($_SESSION["shopping_cart"]);
 }  
//  if(isset($_GET["action"]))  
//  {  
//       if($_GET["action"] == "delete")  
//       {  
//            foreach($_SESSION["shopping_cart"] as $keys => $values)  
//            {  
//                 if($values["item_id"] == $_GET["id"])  
//                 {  
//                      unset($_SESSION["shopping_cart"][$keys]);  
//                      echo '<script>alert("Item Removed")</script>';  
//                      echo '<script>window.location="index.php"</script>';  
//                 }  
//            }  
//       }  
//  }  
 ?> 

<?php include('template-parts/admin-header.php'); ?>
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
                                <?php print_r($_SESSION);?>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Akornor Jollof</td>
                                                <td>Full Portion</td>
                                                <td>Ghc8.50</td>
                                                
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>                                                
                                            </tr>
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
                                    <form id="menu_form" method="post" action="customer-food-menu.php"></form>
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                                              $result2 = $db->selectAllFromTable('akorno_food_menu');
                                              while ($row = $result2->fetch()){?>
                                                    <tr>
                                                        <td><input type="text" name="food_item_id" form="menu_form" value="<?php echo $row['food_item_id']; ?>" readonly="readonly"></td>
                                                        <td><input type="text" name="food_item" form="menu_form" value="<?php echo $row['food_item']; ?>" readonly="readonly"></td>
                                                        <td><input type="text" name="type" form="menu_form" value="<?php echo $row['type']; ?>" readonly="readonly"></td>
                                                        <td><input type="text" name="price" form="menu_form" value="<?php echo $row['price']; ?>" readonly="readonly"></td>
                                                        <td><input type="submit" name="add_to_cart" form="menu_form" class="btn btn btn-success btn-fill pull-right" value="ADD"></td>
                                                        
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