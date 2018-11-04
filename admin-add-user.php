<?php require_once('template-parts/admin-header.php'); ?>
    <?php 
        require_once('connection/db_models/db_matron_entity.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['add_user'])){
              if(!empty($_POST["user_name"]) & !empty($_POST["user_email"]) & !empty($_POST["user_cafeteria"])){
                $matron = new MatronEntity($_POST["user_name"], $_POST["default_password"], $_POST["user_email"], $_POST["user_cafeteria"]);
                $matron->insert();
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
                  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                      <fieldset>
                        <legend>Add User</legend>
                          <div  class="form-group">
                            <label for="user_name">Name</label>
                            <input type="text" name="user_name" class="form-control" id="user_name" required>
                          </div>
                          <div  class="form-group">
                            <label for="user_email">Email</label>
                            <input type="email" name="user_email" class="form-control" id="user_email" required>
                          </div>
                          <div  class="form-group">
                            <input type="hidden" name="default_password" class="form-control" value="takeaway" id="default_password">
                          </div>
                          <div  class="form-group">
                            <label for="user_cafeteria">Cafeteria</label>
                            <input type="text" name="user_cafeteria" class="form-control" id="user_cafeteria" required>
                          </div>
                          <br>
                          <br>
                          <button type="submit" name="add_user" class="btn btn-primary btn-fill">Add Menu</button>

                      </fieldset>
                    </form>
                </div>
              </div>
            </div>
                            
<?php require_once('template-parts/admin-footer.php'); ?>
