<?php require_once('template-parts/admin-header.php'); ?>
<?php 
        require_once('connection/db_models/db_admin_entity.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if(isset($_POST['add_admin'])){
              if(!empty($_POST["admin_username"]) & !empty($_POST["admin_email"])){
                $admin =  new AdminEntity($_POST["admin_username"],$_POST["admin_email"],md5($_POST["default_password"]),$_POST["about_admin"], $_POST["prev"]); 
                $admin->insert();
              }

          }
        }
    ?>
    <div class="wrapper">
      <!--Side bar-->
      <?php require_once('template-parts/admin-sidebar.php'); ?>

        <div class="main-panel">
          <!--navbar-->
            <?php require_once('template-parts/admin-navbar.php'); ?>

            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                        <!---Message cafeteria-->
                        <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">New Admin</h4>
                                    </div>
                                    <div class="content">
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                            <input type="text" name="admin_username" class="form-control" placeholder="username" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" name="admin_email"class="form-control" placeholder="Email address" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="default_password" value="takeaway">
                                            <input type="hidden" name="about_admin" value="I am an admin.">
                                            <input type="hidden" name="prev" value="admin">

                                            <button type="submit" name="add_admin" class="btn btn-info btn-fill pull-right">Add</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>


                        </div>

<?php require_once('template-parts/admin-footer.php'); ?>
