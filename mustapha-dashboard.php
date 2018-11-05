
<?php require_once('template-parts/admin-header.php'); ?>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if(isset($_GET['action'])){
                if ($_GET['action'] =='remove_admin'){
                    //Delete an admin by the id
                    $db->deleteItemById($db->admin_table_name, $db->admins_ids, intval($_GET['admin_id']));
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
                        <div class="row">
                            <div class="col-md-6">
                                <!--Big ben Users Table-->
                                <div class="card">
                                        <div class="header">
                                            <h4 class="title">Big ben users</h4>
                                        </div>
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                      $bigben_users = $db->selectItemByColumn($db->matron_table, $db->belong_to_cafeteria, strtolower("bigben"));
                                                      while($user = $bigben_users->fetch()){?>
                                                            <tr>
                                                                <td><?php echo $user['id']; ?></td>
                                                                <td><?php echo $user['username']; ?></td>
                                                                <td><?php echo $user['email']; ?></td>
                                                            </tr>
                                                    <?php }
                                                     ?>
                                                  
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <!--Akornor users-->
                                    <div class="card">
                                            <div class="header">
                                                <h4 class="title">Akornor Users</h4>
                                            </div>
                                            <div class="content table-responsive table-full-width">
                                                <table class="table table-hover table-striped">
                                                    <thead>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $akorno_users = $db->selectItemByColumn($db->matron_table, $db->belong_to_cafeteria, strtolower("akorno"));
                                                        // $akorno_users = $db->selectAllFromTable('matron_details');
                                                        while($user = $akorno_users->fetch()){?>
                                                                <tr>
                                                                    <td><?php echo $user['id']; ?></td>
                                                                    <td><?php echo $user['username']; ?></td>
                                                                    <td><?php echo $user['email']; ?></td>
                                                                </tr>
                                                        <?php }
                                                        ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                            </div>

                        <!---Message cafeteria-->
                        <div class="col-md-6">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Mesage Cafeteria</h4>
                                    </div>
                                    <div class="content">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <!-- <label>To</label> -->
                                                                <input type="email" name= "email" class="form-control" placeholder="To">
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <!-- <label>Subject</label> -->
                                                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea  id="editor" name="message" class="form-control editor" placeholder="Message body here"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" name="send_email" class="btn btn-info btn-fill pull-right">Send</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>

                                <div class="card">
                                        <!--Admins-->
                                        <div class="header">
                                            <h4 class="title">Admins</h4>
                                        </div>
                                        <div class="content table-responsive table-full-width">
                                            <table class="table table-hover table-striped">
                                                <thead>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th class="pull-right">Delete?</th>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                     $admins = $db->selectAllFromTable('admins_table');
                                                     while ($row = $admins->fetch()){?>
                                                        <tr>
                                                            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="<?php $admin_form_id = $row['admins_ids']; echo $admin_form_id;?>"></form>
                                                            <td><?php echo $row['id'];?></td>
                                                            <td><?php echo $row['username'];?></td>
                                                            <td><?php echo $row['email'];?></td>
                                                            <input type="hidden" form="<?php echo $row['id'] ?>" name="admin_id" value="<?php echo $row['id'] ?>">
                                                            <td><button type="submit" name="action" value="remove_admin" form="<?php $admin_form_id = $row['id']; echo $admin_form_id;?>" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                            </div>
                            
<?php require_once('template-parts/admin-footer.php'); ?>
