<h1>Product List</h1> 
    <table> 
        <?php 
    
    $sql="SELECT * FROM products ORDER BY name ASC"; 
    $query=mysql_query($sql); 
        
    while ($row=mysql_fetch_array($query)) { 
            
    ?> 
        <tr> 
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td><?php echo $row['price'] ?>$</td> 
            <td><a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Add to cart</a></td> 
        </tr> 
    <?php 
            
    } 

    ?>
    </table>