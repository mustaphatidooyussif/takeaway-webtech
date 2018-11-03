<?php require_once('template-parts/admin-header.php'); ?>
    <?php 
        require_once('connection/db_models/cafeteria_entity.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['add_cafeteria'])){
              if(!empty($_POST["cafeteria_name"]) & !empty($_POST["cafeteria_email"])){
                  
                  $cafeteria = new Cafeteria($_POST['cafeteria_name'], $_POST['cafeteria_email']);
                  $cafeteria->insert();
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
                  <form method="post" id="cafeteria_add_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <fieldset>
                        <legend>Add Cafeteria</legend>
                          <div  class="form-group">
                          <h4></h4>
                          <label for="cafeteria_name">Name</label>
                          <input type="text" name="cafeteria_name" class="form-control" id="cafeteria_name" required>
                          </div>

                          <div  class="form-group">
                            <label for="cafeteria_email">Email Address</label>
                            <input type="email" name="cafeteria_email" class="form-control" id="cafeteria_email" required>
                          </div>
                          <br>
                          <br>
                          <button type="submit" name="add_cafeteria" class="btn btn-primary btn-fill">Add</button>
                      </fieldset>
                    </form>
                </div>
              </div>
            </div>
                            
<?php require_once('template-parts/admin-footer.php'); ?>
