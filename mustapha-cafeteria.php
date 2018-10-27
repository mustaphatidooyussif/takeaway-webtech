<?php include('template-parts/admin-header.php'); ?>

<div class="wrapper">
	<!--sidebar-->
    <?php include('template-parts/admin-sidebar.php'); ?>

    <div class="main-panel">
			<!--navbar-->
				<?php include('template-parts/admin-navbar.php'); ?>

        <!--Main content area-->
        <div class="content">
            <div class="container-fluid">

                <!--Display all Cafeterias-->
                <div class="row">
                    <div class="col-md-12">
                            <div class="card">
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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Big Ben</td>
                                                    <td>bigben@ashesi.edu.gh</td>
                                                    <td><button type="button" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Akornor</td>
                                                    <td>akornor@ashesi.edu.gh</td>
                                                    <td><button type="button" class="btn btn-danger btn-fill pull-right">remove</button></td>
                                                </tr>
                                            </tbody>
                                        </table>

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
        </div><!--End of Main content area-->

<?php include('template-parts/admin-footer.php'); ?>
