
<?php include('template-parts/admin-header.php');?>





    <div class="wrapper">
      <?php include('template-parts/acafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/acafeteria-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                 <div class="card center-element">
                    <form method="post" action="acafeteria-delete-menu.php">
                          <h4>Enter Food Item to Delete</h4>
                          <div class="form-group">
                            <input type="text" name="food_item" class="form-control" id="item_to_delete" required>
                          <div>
                          <button type="submit" name="submit"class="btn btn-danger btn-fill">Delete</button>

                    </form>
<?php
if(isset($_POST["food_item"])){

    require "connection/initDatabase.php";
    require "connection/db_models/db_food_menu_entity.php";

    $db = new initDatabase();
    $db->createDataBaseTables();

    $fooditem = $_POST['food_item'];

    $dbdelete = $db->deleteByItem($fooditem, "akorno_food_menu");
    //var_dump($dbdelete);

    if($dbdelete->rowCount() == 1){
      echo "<h4>delete success</h4>";
    }
    else{
      echo "<h4>kindly select correct item to delete</h4>";
    }
    
    
  }
  
  ?>



                  
                  </div>
              </div>
            </div>
                            
<?php include('template-parts/admin-footer.php'); ?>
