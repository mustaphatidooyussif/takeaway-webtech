

<!DOCTYPE html>
<html>
	<head>
		<title>Metron Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        

	   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="jquery.3.2.1.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <style><?php include 'css/bigben.css'; ?></style> 
        <style><?php include 'css/bigbenfooter.css'; ?></style>   

         </head>
<!------ Include the above in your HEAD tag ---------->

<body id="bbody">
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>

<div id="wrapper">

    <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars" aria-hidden="true" style="color: white;"></i>
            </button>
            <div class="navbar-brand">   
            </div>
        </div>

        <form action="" class="navbar-form navbar-left">
            <div class="input-group">
              <div class="input-group-btn">
                  <button class="btn  search-btn-icon">
                   <i class="fa fa-search" aria-hidden="true"></i>                  
                  </button>
               </div>
              <input type="Search" placeholder="Search..." class="form-control-serch search-box" />   
            </div>     
        </form>

        <!-- Top Menu Items -->
        <div class="items">
          <ul class="nav navbar-right top-nav">        
            <li class="editpro">
              <i class="fasett fa-cog" aria-hidden="true" class="menu-button" id="menu-button"></i> 
              <h5 class="pull-left login-person-head">Welcome WaLiA SaAB</h5> 
            </li>
          </ul>
        </div>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="background-color: #616060; border:1px solid #616060;">
            <ul class="nav navbar-nav side-nav">
              <a href="#"><img class="logostyle" src="images/aimg1.jpg" alt="LOGO""></a>
                <li>
                   <a class="active" href="bindex.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-home" aria-hidden="true"></i>   <span style="color:white;">  Home </span></a>
                </li>
                <li>
                    <a class="#" href="baddmenu.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user-o" aria-hidden="true"></i>   <span style="color:white;">Add Menu</span></a>
                </li>
                <li>
                    <a class="#" href="bdeletemenu.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-calendar" aria-hidden="true"></i>   <span style="color:white;"> Delete Menu </span></a>
                </li>
                <li>
                    <a class="#" href="BigBenDisplayMenu.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-envelope" aria-hidden="true"></i>  <span style="color:white;">Display Available Menu</span></a>
                </li>
                <li>
                    <a class="#" href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-cogs" aria-hidden="true"></i>   <span style="color:white;">Orders</span></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
  </nav>


<div class="container-fluid">
<div class="row text-center">
    
<div class="col-md-12 dashhead">

<h1> Welcome To Big Ben Matron Dashboard</h1>



</div>
</div>
</div>

  </div><!-- /#wrapper -->

  <br>
<br>
<br>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  <div class="footer-bottom">
<div class="container">
          <div class="row">
            <div class="col-sm-6 ">
              <div class="copyright-text">
                <p>CopyRight © 2018 Big All Rights Reserved</p>
              </div>
            </div> <!-- End Col -->
            
          </div>
        </div>
</div>
</body>
		
</html>

