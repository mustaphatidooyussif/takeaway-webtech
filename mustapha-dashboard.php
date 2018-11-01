
<?php include('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php include('template-parts/admin-sidebar.php'); ?>
      
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/admin-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">

                                    <!--Cafeterias Table-->
                                    <div class="header">
                                        <h4 class="title">All Cafeterias</h4>
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
                                                
                                                    $cafeterias = $db->selectAllFromTable('cafeterias');
                                                    while($cafeteria = $cafeterias->fetch()){?>
                                                        <tr>
                                                            <td><?php echo $cafeteria['cafeterias_ids'] ?></td>
                                                            <td><?php echo $cafeteria['cafeteria_uname'] ?></td>
                                                            <td><?php echo $cafeteria['cafeteria_email'] ?></td>
                                                            <td><button type="button" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                        </tr>                                                     
                                                   <?php }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

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
                                                      $bigben_users = $db->selectAllFromTable('matron_details');
                                                      while($user = $bigben_users->fetch()){?>
                                                            <tr>
                                                                <td><?php echo $user['matron_id']; ?></td>
                                                                <td><?php echo $user['matron_username']; ?></td>
                                                                <td><?php echo $user['matron_email']; ?></td>
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
                                                        $bigben_users = $db->selectAllFromTable('matron_details');
                                                        while($user = $bigben_users->fetch()){?>
                                                                <tr>
                                                                    <td><?php echo $user['matron_id']; ?></td>
                                                                    <td><?php echo $user['matron_username']; ?></td>
                                                                    <td><?php echo $user['matron_email']; ?></td>
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
                                        <form>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" class="form-control" placeholder="Email Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Subject</label>
                                                        <input type="text" class="form-control" placeholder="Subject">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Message</label>
                                                        <textarea rows="5" class="form-control" placeholder="Message body here"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right">Send</button>
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Admin1</td>
                                                        <td>admin1@ashesi.edu.gh</td>
                                                        <td><button type="button" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Admin 2</td>
                                                        <td>admin2@ashesi.edu.gh</td>
                                                        <td><button type="button" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                            </div>
                            
<?php include('template-parts/admin-footer.php'); ?>
