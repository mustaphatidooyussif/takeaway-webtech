<?php include('template-parts/admin-header.php'); ?>

    <div class="wrapper">
      <?php include('template-parts/bcafeteria-sidebar.php'); ?>
        <div class="main-panel">
          <!--navbar-->
            <?php include('template-parts/cafeteria-navbar.php'); ?>

            <!--Main content area-->
            <div class="content">
              <div class="container-fluid">
                 <!--Table-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header center-element">
                            <h4 class="title">AVAILABLE ORDERS</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <th>Food Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Serve</th>
                                    <th>Customer</th>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
              </div>
            </div>
                     
<?php include('template-parts/admin-footer.php'); ?>
