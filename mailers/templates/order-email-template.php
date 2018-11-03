<!DOCTYPE html>
<html lang="en">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../templates/mailers/css/light-bootstrap-dashboard.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
<body>
    
    <div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; ">
        <table style="width: 100%;">
        <tr>
            <td></td>
            <td bgcolor="#FFFFFF ">
            <div style="padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px; border: 1px solid lightseagreen;">
                <table style="width: 100%;background: #0088cc ;">
                <tr>
                    <td></td> 
                    <td>
                    <div>
                        <table width="100%">
                        <tr>
                            <td rowspan="2" style="text-align:center;padding:10px;">
                                <p style="color:white;float:left;">Take Away</p>
                                <span style="color:white;float:right;font-size: 13px;font-style: italic;margin-top: 20px; padding:10px; font-size: 14px; font-weight:normal;">
                                "Your online food ordering platform..."<span></span></span></td>
                        </tr>
                        </table>
                    </div>
                    </td>
                    <td></td>
                </tr>
                </table>
                <table style="padding: 10px;font-size:14px; width:100%;">
                <tr>
                    <td style="padding:10px;font-size:14px; width:100%;">
                        <p>Hi %username%,</p>
                        <p><br /> Thank you for using takeAway online food ordering system. Your order has been processed. Please find your order details. </p>
                        <table style="width: 100%;border: 1px solid black;">
                            <tr>
                                <th>Item</th>
                                <th>Price</th>
                            </tr>

                            <?php
                                $orders_id = unserialize($_POST['orders_ids']);
                                print_r($orders_id);
                                // loop crreate tr for each order id
                                foreach($orders_id as $id){ ?>
                                    <tr>
                                        <td><?php echo "%food_item%".$id; ?></td>
                                        <td><?php echo "%item_price%".$id; ?></td>
                                    </tr>
                                <?php  } ?>
                        </table>
                        <br>
                        <p>You will receive another email as soon as the order is served.</p>
                        <p> </p>
                        <p>Thank you regard</p> <br>
                                <!-- /Callout Panel -->
                    <!-- FOOTER -->
                    </td>
                </tr>
                <tr> 
                <td>
                    <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee;">
                        © 2018 <a href="#" target="_blank" style="color:#333; text-decoration: none;">takeAway</a>
                    </div>
                    </td>
                </tr>
                
                </table>
            </div>
    </body>
</html>