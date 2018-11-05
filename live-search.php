<!-- get posted data and query database for foodmenu -->
<?php

// OrderEntity
    require_once("connection/db_models/db_order_entity.php");
    // FoodMenuEntity
    require_once("connection/db_models/db_food_menu_entity.php");
    // include files
    require_once('template-parts/customer-header.php');
    
                                    $output = '';
                                    if(isset($_POST['query'])){
                                        
                                        if(!empty($_POST['query'])){
                                            $all_order_query = $db->retriveWildCardResults($db->ak_food_menu_table, $_POST['query']);
                                        }else{
                                            $all_order_query = "SELECT * FROM take_db.akorno_food_menu";
                                        };
                                    }else{
                                        $all_order_query = "SELECT * FROM take_db.akorno_food_menu";
                                    };
                                    
                                    // query database and retrieve all orders
                                    $allOrders = $db->selectAllFromTable_Ord($all_order_query);

                                    if($allOrders->rowCount() > 0){
                                        
                                        $output.="<div class='content table-responsive table-full-width'>
                                                        <table class='table  table-striped'>
                                                            <thead>
                                                                <th>ID</th>
                                                                <th>Food Item</th>
                                                                <th>Type</th>
                                                                <th>Price (Ghc)</th>
                                                                <th>Category</th>
                                                            </thead>
                                                            <tbody>";
                                                            // populate rows of table
                                                            // $result2 = $allOrders->fetch();

                                                            while ($row = $allOrders->fetch()){
                                                                
                                                                $output.='<form id="'.$row['food_item_id'].'" method="post" action="" class="add-order-form"></form>
                                                                <tr>
                                                                    <td><input class="atule-food-menu-item" type="text" id= "food_item_id" name="food_item_id" form="'.$row['food_item_id'].'" value="'.$row['food_item_id'].'" readonly="readonly"></td>
                                                                    <td><input class="atule-food-menu-item" type="text" id= "food_item" name="food_item" form="'.$row['food_item_id'].'" value="'.$row['food_item'].'" readonly="readonly"></td>
                                                                    <td><input class="atule-food-menu-item" type="text" id= "type" name="type" form="'.$row['food_item_id'].'" value="'.$row['type'].'" readonly="readonly"></td>
                                                                    <td><input class="atule-food-menu-item" type="text" id= "price" name="price" form="'.$row['food_item_id'].'" value="'.$row['price'].'" readonly="readonly"></td>
                                                                    <td><input class="atule-food-menu-item" type="text" id= "category" name="category" form="'.$row['food_item_id'].'" value="'.$row['category'].'" readonly="readonly"></td>
                                                                    <td><button type="submit" name="submit" form="'.$row['food_item_id'].'" class="btn btn btn-success">ADD</button></td>                                                        
                                                                </tr>';
                                                            }
                                                            // add remaining form html
                                                            $output.='
                                                            </tbody>
                                                    </table>
                                                </div>';

                                                echo $output;
                                                                
                                    } 
                                    // else {

                                    // }
                                ?>