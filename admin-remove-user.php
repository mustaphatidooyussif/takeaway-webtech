<?php require_once('template-parts/admin-header.php'); ?>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET['action'])){
                if ($_GET['action'] =='remove_user'){
                    //Delete an admin by the id
                    $db->deleteItemColumn($db->matron_table, $db->matron_email, $_GET['remove_email']);
                }
            }
        }

    ?> 
    <div class="wrapper">
      <?php require_once('template-parts/admin-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php require_once('template-parts/admin-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                 <div class="card center-element">
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                          <h4>Enter the email of matron to Delete</h4>
                          <div class="form-group">
                            <input type="text" name="remove_email" class="form-control" id="remove_email" required>
                          <div>
                          <button type="submit" name="action" value="remove_user" class="btn btn-danger btn-fill">Delete</button>
                      </form>
                  </div>
              </div>
            </div>
                            
<?php require_once('template-parts/admin-footer.php'); ?>
