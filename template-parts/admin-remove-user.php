<?php include('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php include('template-parts/cafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/cafeteria-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                 <div class="card center-element">
                    <form method="post">
                          <h4>Enter Food Item to Delete</h4>
                          <div class="form-group">
                            <input type="text" name="food_item" class="form-control" id="item_to_delete" required>
                          <div>
                          <button type="submit" class="btn btn-danger btn-fill">Delete</button>
                      </form>
                  </div>
              </div>
            </div>
                            
<?php include('template-parts/admin-footer.php'); ?>
