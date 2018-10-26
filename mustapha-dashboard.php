<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="images/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Take Away</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="pacificblue" data-image="images/sidebar-5.jpg">

            <!--

        Tip 1: you can change the color of the sidebar using: data-color="pacificblue | navyblue | blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Take Away
                    </a>
                </div>

                <ul class="nav">
                    <li class="active">
                        <a href="mustapha-dashboard.php">
                            <i class="pe-7s-graph"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="mustapha-user.php">
                            <i class="pe-7s-user"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="mustapha-cafeteria.php">
                            <i class="pe-7s-note2"></i>
                            <p>Cafeteria</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-tasks"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Add Cafeteria</a></li>
                                    <li><a href="#">Remove Cafeteria</a></li>
                                    <li><a href="#">Add User</a></li>
                                    <li><a href="#">Remove User</a></li>
                                    <li><a href="mustapha-admins.php">Add Admin</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Search</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <p>Log out</p>
                                </a>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <!--Cafeterias-->
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

            <footer class="footer">
                <div class="container-fluid">
                   <!--Footer code will go here-->
                </div>
            </footer>

        </div>
    </div>


</body>

<!--   Core JS Files   -->
<script src="js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

        $.notify({
            icon: 'pe-7s-gift',
            message: "Welcome to <b>Take Away Dashboard</b>"

        }, {
            type: 'info',
            timer: 4000000
        });

    });
</script>

</html>