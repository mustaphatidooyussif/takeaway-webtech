
<?php include('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php include('template-parts/bcafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/cafeteria-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                <div class="card center-element">
                  <form method="post" id="myform" action="bcafeteria-add-menu.php" >
                    <input type="hidden" name="submitted" value="true">
                      <fieldset>
                        <legend>Add Menu Item</legend>
                          <div  class="form-group">
                          <h4></h4>
                          <label for="F_item">Food Item:</label>
                          <input type="text" name="F_item" class="form-control" id="F_item" required>
                          </div>

                          <div  class="form-group">
                            <label for="Price">Price:</label>
                            <input type="number" name="Price" min="0" class="form-control" id="Price" required>
                          </div>


                          <div  class="form-group">
                            <label for="category">Type:</label>
                            <input list="category" name="type" class="form-control" id="type" required>
                              <datalist id="category">
                                <option>Full portion</option>
                                <option>Half portion</option>
                              </datalist>




                          <div  class="form-group">
                            <label for="category">Category:</label>
                            <input list="category" name="Category" class="form-control" id="category" required>
                              <datalist id="category">
                                <option>Breakfast</option>
                                <option>Lunch</option>
                                <option>Supper</option>
                              </datalist>
                          </div>

                          <br>
                          <br>

                          <button type="submit" onclick="#" class="btn btn-primary btn-fill">Add Menu</button>

                      </fieldset>
                    </form>
<?php
if(isset($_POST["submitted"])){

    require"connection/initDatabase.php";
    require"connection/db_models/db_food_menu_entity.php";

    $db = new initDatabase();
    $db-> createDataBaseTables();


    $fooditem = $_POST['F_item'];
    $price = $_POST['Price'];
    $type = $_POST['type'];
    $category = $_POST['Category'];

    $cus1 = new FoodMenuEntity("bigben_food_menu", "id", $fooditem, $price, $type, $category);
    $cus1->insert();

    echo "<h3>Added successfully<h3>";
  }
  else{
      die('<h3>Fill in all fields<h3>');
    }



  ?>
                </div>
              </div>
            </div>
                            
<?php include('template-parts/admin-footer.php'); ?>
