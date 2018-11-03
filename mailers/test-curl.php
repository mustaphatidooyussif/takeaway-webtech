<?php
    $orders_data = explode('&', $_POST['orders_data']);
    
    $total_price = $orders_data[0];
    $orders_id = array_slice($orders_data, 1);
    print_r($total_price);
    print_r($orders_data);
?>