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
    <link rel="stylesheet" href="assets/css/light-bootstrap-dashboard.css" />


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

            <div class="container-fluid"> <!-- ORDER CONTAINER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Your Orders</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Akornor Jollof</td>
                                                <td>Full Portion</td>
                                                <td>Ghc8.50</td>
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td><button type="button" class="btn btn-danger btn-fill pull-right">Remove order</button></td>                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="row atule-orders-table"><!-- orders submit button -->
                                    <div class="col-md-3 atule-total-price">
                                        <label>Total Price: </label>
                                        <button type="button" class="btn btn-light disabled">Ghc13.50</button>
                                    </div>
                                    <div class="col-md-3 atule-submit-orders">
                                        <button type="submit" class="btn btn btn-success">Submit order</button>
                                    </div>
                                </div><!-- end orders submit button -->
                            </div> 
                        </div>
                    </div>
            </div><!-- END ORDERS CONTAINER -->



            <div class="row atule-searchbox"><!-- SEARCH AND FILTER BOXES -->
                <div class="col-md-4" >
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="search food menu " aria-describedby="sizing-addon1">
                    </div>
                </div>

                <div class="col-md-2 atule-filter">
                    <div class="input-group input-group-lg">
                        <div class="input-group-btn">
                            <!-- Button and dropdown menu -->
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Breakfast</a></li>
                                <li><a href="#">Lunch</a></li>
                                <li><a href="#">Supper</a></li>
                                <li><a href="#">Drinks & Snacks</a></li>
                            </ul>
                        </div>
                        <input type="text" class="form-control" aria-label="..." value="Filter By">
                    </div>
                </div>
            </div><!-- END SEARCH AND FILTER BOXES -->


                <div class="container-fluid"> <!-- FOOD MENU CONTAINER -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Akornor Food Menu</h4>
                                    <p class="category">Here is a subtitle for this table</p>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>ID</th>
                                            <th>Food Item</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Akornor Jollof</td>
                                                <td>Full Portion</td>
                                                <td>Ghc8.50</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Minerva Hooper</td>
                                                <td>$23,789</td>
                                                <td>Curaçao</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sage Rodriguez</td>
                                                <td>$56,142</td>
                                                <td>Netherlands</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Philip Chaney</td>
                                                <td>$38,735</td>
                                                <td>Korea, South</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Doris Greene</td>
                                                <td>$63,542</td>
                                                <td>Malawi</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Mason Porter</td>
                                                <td>$78,615</td>
                                                <td>Chile</td>
                                                <td><button type="button" class="btn btn-success btn-fill pull-right"><i class="fa fa-plus"></i> <b>ADD</b></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- END FOOF MENU CONTAINER -->

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
