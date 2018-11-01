<!DOCTYPE html>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <!--Custom css-->
  <link href="css/ayinawu-customer-login.css" rel="stylesheet">

  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body class="ayinawu-body-style-cust">

    <div class="container">
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card">takeAway</p>
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><span class="glyphicon glyphicon-off"></span> Sign in</button>
            </form><!-- /form -->
            <p>Don't have an account? <a href="#" class="forgot-password" id="myBtn">
                create an account
            </a></p>
        </div><!-- /card-container -->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><i class="fas fa-user-plus"></i> Sign Up</h4>
                </div>
                <div class="modal-body" style="padding:40px 50px;">
                <form role="form">
                    <div class="form-group">
                        <label for="fname"> First name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="lname"> Last name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="uname"> Username</label>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="email"> Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="psw"> Password</label>
                        <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="c_psw"> Confirm Password</label>
                        <input type="password" class="form-control" id="c_psw" name="c_psw" placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"></span> Register </button>
                </form>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                
                </div>
            </div>
            
            </div>
        </div> 
        </div><!-- /container -->
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
    });
    </script>

</body>

</html>

