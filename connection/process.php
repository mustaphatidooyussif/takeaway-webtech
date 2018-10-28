
<?php
$con = mysqli_connect("localhost", "root", "ayinawu1", "loginpage");

if(isset($_POST['ayinawu-login-btn'])){
    $username = mysqli_real_escape_string($con, $_POST['ayinawu-login-user']);
    $password = mysqli_real_escape_string($con, $_POST['ayinawu-login-password']);
    
    if($username!="" && $password!=""){
        $sql = "SELECT * from customers WHERE username='$username' and password='$password'";
        
        $result = mysqli_query($con, $sql);
        
        $row = mysqli_fetch_array($result);
        
        if($row['username']==$username && $row['password']==$password){
            echo "Login successful! Welcome ".$row['username'];
            
        }else{
            echo "Failed to login";
        }
    }
}
?>
