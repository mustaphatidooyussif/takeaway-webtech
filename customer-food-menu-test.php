<?php
    require_once('template-parts/customer-header.php');


    $total_price = $_POST['total_price'];
    $orders_id = unserialize($_POST['orders_ids']);

    foreach($orders_id as $id) {
        $orders = $db->selectItemByColumn($db->ak_orders_table, $db->orders_id, $id);
        $order_item = $orders->fetch();
        $food_item_id = $order_item['food_item_id'];
        //  get undered food menu items from food menu table
        $unserved_food_item = $db->selectItemByColumn($db->ak_food_menu_table, $db->food_item_id, $food_item_id);
        // retrieve data
        $row = $unserved_food_item->fetch();
        print_r($row["food_item"]);
        print_r($row["price"]);

    }




    

?>