<?php
    session_start();
    require_once('connection/initDatabase.php');
    require_once('connection/db_queries.php');
    require_once('connection/db_models/db_register_customer_entity.php');
    $db = new InitDatabase();  //create db and tables if not exists
    $db->createDataBaseTables();

    $errors = array(); //form errors array

    //funtion to remove special charchers from input
    function trim_characters($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['register'])){
            if(!empty($_POST['reg_email']) & !empty($_POST['fname']) &!empty($_POST['lname']) & !empty($_POST['uname']) & !empty($_POST['psw']) & !empty($_POST['c_psw'])){
                $username = trim_characters($_POST['uname']);
                $firstname = trim_characters($_POST['fname']);
                $lastname = trim_characters($_POST['lname']);
                $email = trim_characters($_POST['reg_email']);
                $password = trim_characters($_POST['psw']);
                $c_password = trim_characters($_POST['c_psw']);
                $prev = trim_characters($_POST['prev']);
                
                //reports error if empty fills
                if (empty($username)) { array_push($errors, "Username is required"); }
                if (empty($email)) { array_push($errors, "Email is required"); }
                if (empty($password)) { array_push($errors, "Password is required"); }
                if ($password != $c_password) {
                  array_push($errors, "The two passwords do not match");
                }
                
                $result_by_email = $db->selectItemByColumn($db->registration_table, $db->new_user_email, $email)->fetch();
                $result_by_username = $db->selectItemByColumn($db->registration_table, $db->new_user_username, $username)->fetch();

                if($result_by_email){
                    if($result_by_email['email']==$email){
                        array_push($errors, "Email already exist");
                    }
                }

                if($result_by_username){
                    if($result_by_username['username']==$username){
                        array_push($errors, "Username already exist");
                    }
                }
                if(count($errors)== 0){
                    $password = md5($password);
                    $c_password = md5($c_password);
                    $new_customer  = $db->register($firstname,$lastname,$username,$email,$password,$c_password, $prev);
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    header('location: customer-dashboard.php');
                }

            }
        }
        else if(isset($_POST['login'])){
            if(!empty($_POST['inputEmail']) & !empty($_POST['inputPassword'])){
                $email = $_POST['inputEmail'];
                $password = $_POST['inputPassword'];
                
                if (empty($email)) {
                    array_push($errors, "Email is required");
                }
                if (empty($password)) {
                    array_push($errors, "Password is required");
                }

                if (count($errors) == 0) {
                    $password = md5($password);
                    //TODO: Authenticate the user and check if true

                    //Authenticate user as a customer or an admin or a matron. 
                    $customer = $db->authenticateUser($db->registration_table, $email, $password);
                    $matron = $db->authenticateUser($db->matron_table, $email, $password);
                    $admin = $db->authenticateUser($db->admin_table_name, $email, $password);

                    if ($customer->rowCount() || $matron->rowCount() || $admin->rowCount()) {
                        $_SESSION['password'] = $password;
                        $_SESSION['email'] = $email;
                        
                        if($customer->rowCount()){
                            header('location: customer-dashboard.php');
                        }
                        else if($matron->rowCount()){
                            $_SESSION['cafeteria'] = $matron->fetch()['previlege'];
                            header('location: cafeteria-dashboard.php');   
                        }
                        else if($admin->rowCount()){
                            echo "admin";
                            header('location: mustapha-dashboard.php'); 
                        }
                        else{
                            array_push($errors, "Wrong username/password combination");
                        }
                    }else {
                        array_push($errors, "Wrong username/password combination");
                    }
                }

            }
        }
    }
 ?>
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
            <form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" name="login" type="submit"><span class="glyphicon glyphicon-off"></span> Sign in</button>
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
                <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
                        <input type="email" class="form-control" id="email" name="reg_email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="psw"> Password</label>
                        <input type="password" class="form-control" id="psw" name="psw" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="c_psw"> Confirm Password</label>
                        <input type="password" class="form-control" id="c_psw" name="c_psw" placeholder="Confirm your password">
                    </div>
                    <input type="hidden" class="form-control" name="prev" value="customer">
                    <button type="submit" name="register" class="btn btn-primary btn-block"></span> Register </button>
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

