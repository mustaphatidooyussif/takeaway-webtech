<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Akornor Food Menu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link rel="stylesheet" href="assets/css/atule-customer-food-menu.css" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

</head>
<body>

    <div class="wrapper"> <!-- WRAPPER -->

        <nav class="navbar navbar-default navbar-fixed"> <!-- NAVBAR -->
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                        <a class="navbar-brand" href="#">
                            <span>
                                <img src="./assets/img/invert_colors_white_36x36.png" width="30" height="30" class="d-inline-block align-top" alt="">
                                takeAway
                            </span>
                        </a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown atule-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <p>
                                    Select cafeteria
                                    <b class="caret"></b>
                                </p>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Akornor</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Bigben</a></li>
                            </ul>
                        </li>

                        <li class="atule-dropdown">
                            <a href="">
                                <p>History</p>
                            </a>
                        </li>

                        <li class="atule-dropdown">
                            <a href="">
                                <i class="fas fa-cart-plus" style="padding-bottom: 14px;"></i>
                                <span class="badge">5</span>
                            </a>
                        </li>
                        <li class="dropdown atule-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="far fa-user" style="padding-bottom: 14px;"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><!-- END NAVBAR -->


        
        <div class="atule-content"><!-- CONTENT CONTAINER-->

            <p class="atule-dotted-square">Please select cafeteria to display food menu</p>

        </div><!-- END CONTENT DIV -->

    </div><!-- END WRAPPER DIV -->



            

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	// demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Food Menu</b> - select food to order."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>
</body>
</html>
