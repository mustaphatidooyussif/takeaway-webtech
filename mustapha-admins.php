<?php include('template-parts/admin-header.php'); ?>
    <div class="wrapper">
      <!--Side bar-->
      <?php include('template-parts/admin-sidebar.php'); ?>

        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/admin-navbar.php'); ?>

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
                                        <form>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" class="form-control" placeholder="username">
                                                            </div>
                                                        </div>
                                                    </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" placeholder="Email address">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right">Add</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>


                            </div>

<?php include('template-parts/admin-footer.php'); ?>
