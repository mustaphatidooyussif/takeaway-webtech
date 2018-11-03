
<?php require_once('template-parts/admin-header.php'); ?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET['action'])){
            if ($_GET['action'] =='remove_cafeteria'){
                $db->deleteItemById($db->cafeteria_table, $db->cafeterias_ids, intval($_GET['cafeteria_id']));
            }
        }
    }

?>
<div class="wrapper">
	<!--sidebar-->
    <?php require_once('template-parts/admin-sidebar.php'); ?>

    <div class="main-panel">
			<!--navbar-->
				<?php require_once('template-parts/admin-navbar.php'); ?>

        <!--Main content area-->
        <div class="content">
            <div class="container-fluid">

                <!--Display all Cafeterias-->
                <div class="row">
                    <div class="col-md-12">
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
                                                <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="<?php $caferia_form_id = $cafeteria['cafeterias_ids']; echo $caferia_form_id;?>"></form>
                                                <td><?php echo $cafeteria['cafeterias_ids'] ?></td>
                                                <td><?php echo $cafeteria['cafeteria_uname'] ?></td>
                                                <td><?php echo $cafeteria['cafeteria_email'] ?></td>
                                                <input type="hidden" form="<?php echo $cafeteria['cafeterias_ids'] ?>" name="cafeteria_id" value="<?php echo htmlspecialchars($cafeteria['cafeterias_ids']); ?>">
                                                <td><button type="submit" name="action" value="remove_cafeteria" form="<?php $caferia_form_id = $cafeteria['cafeterias_ids']; echo $caferia_form_id;?>" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                            </tr>                                                     
                                                <?php }
                                                ?>
                                            </tbody>
                                        </table>

                                        </div>
                                    </div>
                                    </div>
                                    </div>


                                    <div class="card">
                                        <!--Big ben Users-->
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>User 1</td>
                                                        <td>user1@ashesi.edu.gh</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>User 2</td>
                                                        <td>user2@ashesi.edu.gh</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                            <td>User 3</td>
                                                            <td>user3@ashesi.edu.gh</td>
                                                        </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="card">
                                            <!--Akornor users-->
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
                                                    <tr>
                                                        <td>1</td>
                                                        <td>user1</td>
                                                        <td>user1@ashesi.edu.gh</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>User2</td>
                                                        <td>user2@ashesi.edu.gh</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--End of Main content area-->

<?php require_once('template-parts/admin-footer.php'); ?>
