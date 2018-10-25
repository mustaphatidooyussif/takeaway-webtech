<!DOCTYPE html>
<html>
<head>
    <title>Customer Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/akornor_login.css">
    
</head>
    
<body>
    <div id="login-page">
        <h1>AKORNOR CAFETERIA</h1>
    </div>
    <div id="ayinawu-login-input">
        <form action="process.php" method="POST">
            <h3 id="log">LOGIN</h3>
            <p>
                <label>Username</label>
                <input type="text" id="ayinawu-login-user" name="ayinawu-login-user" placeholder="Username" />
            </p>
            
            <p>
                <label>Password</label>
                <input type="password" id="ayinawu-login-password" name="ayinawu-login-password" placeholder="Password" />
            </p>
        
            <p>
                <input type="submit" id="ayinawu-login-btn" value="Login" />
            </p>
            
        </form>
    </div>
    
</body>

</html>