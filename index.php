
<!DOCTYPE html>
<html>
<head>
    <title>Customer Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
    
<body>
    <div id="login-page">
        <h1>LOGIN</h1>
    </div>
    <div id="ayinawu-login-input">
        <form method="POST">
            <div id="ayinawu_logo">
                <h6>takeAway</h6>
            </div>
            <p>
                <label>Username</label>
                <input type="text" id="ayinawu-login-user" class="search" name="ayinawu-login-user" required />
            </p>
            
            <p>
                <label>Password</label>
                <input type="password" id="ayinawu-login-password" class="search" name="ayinawu-login-password" required/>
            </p>
        
            <p>
                <input type="submit" id="ayinawu-login-btn" name="ayinawu-login-btn" value="Login" />
            </p>
            
        </form>
    </div>
    
    
    <?php

    if(isset($_POST["ayinawu-login-btn"])){
        $username = $_POST['ayinawu-login-user'];
        $password = $_POST['ayinawu-login-password'];
        $error = "";
        $success = "";
        if($username == "Ayinawu"){
            if($password == "123"){
                $error = "";
                $success = "Welcome Ayinawu";
                header("Location:welcome.php");
            
            }else{
                $error = "Invalid Password";
                $success = "";
        
            }
        }else{
            $error = "Invalid Username";
            $success = "";
        }
    }
    ?>
    
</body>

</html>

