<?php require_once('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php require_once('template-parts/cafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php require_once('template-parts/cafeteria-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                <div class="card center-element">
                  <form method="post" id="myform" >
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
                </div>
              </div>
            </div>
                            
<?php require_once('template-parts/admin-footer.php'); ?>
