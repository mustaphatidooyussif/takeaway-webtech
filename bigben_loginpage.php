<!DOCTYPE html>
<html>
<head>
    <title>Customer Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/bigben_login.css">
    
</head>
    
<body>
    <div id="login-page">
        <h1>BIGBEN CAFETERIA</h1>
    </div>
    <div id="ayinawu-login-input">
        <form action="process.php" method="POST">
            <div id="ayinawu_logo">
                <h6>takeAway</h6>
            </div>
            <p>
                <label>Username</label>
                <input type="text" id="ayinawu-login-user" name="ayinawu-login-user" />
            </p>
            
            <p>
                <label>Password</label>
                <input type="password" id="ayinawu-login-password" name="ayinawu-login-password" />
            </p>
        
            <p>
                <input type="submit" id="ayinawu-login-btn" value="Login" />
            </p>
            
        </form>
    </div>
    
</body>

</html>