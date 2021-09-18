<?php
include("connections.php");
ob_start();
session_start();
if (isset($_POST['btnlog'])) {
$admin_user = $_POST['admin_user'];
$admin_password = $_POST['admin_password'];
$query = "SELECT * FROM admin WHERE admin_user='$admin_user' AND admin_password='$admin_password'";
    $results = mysqli_query($connections, $query);
    if (mysqli_num_rows($results) == 1) {
     
$_SESSION['admin_user'] = $admin_user;
$_SESSION['admin_password'] = $admin_password;



      header("Location: admin.php");
    }else {
        echo '<script>alert("Your Username or Password is Wrong")</script>';
    }
    
  }
 
?>


<html>
<head>
<title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/admin-access.css">
<body>
  


    <div class="loginbox">
    <img src="css/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form method="post" action="admin-access.php">
            <p>Admin User</p>
            <input type="text" name="admin_user" required>
            <p>Admin Password</p>
            <input type="password" name="admin_password" required>
            <input type="submit" name="btnlog" value="Login" >
            
            
        </form>
        
    </div>

</body>
</head>
</html>
