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
                <p>This is the admin settings page.</p>
                <?php $var = $_SERVER['DOCUMENT_ROOT'].'/takeaway-webtech/customer-dashboard.php'; $var;?>
            </div>
        </div><!--End of Main content area-->

<?php include('template-parts/admin-footer.php'); ?>
