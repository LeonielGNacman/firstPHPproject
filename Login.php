<?php
include("connections.php");
ob_start();
session_start();
if (isset($_POST['btnlog'])) {
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password'";
    $results = mysqli_query($connections, $query);
    if (mysqli_num_rows($results) == 1) {
     
$_SESSION['last_name'] = $last_name;
$_SESSION['first_name'] = $first_name;
$_SESSION['middle_name'] = $middle_name;
$_SESSION['gender'] = $gender;
$_SESSION['address'] = $address;
$_SESSION['contact_number'] = $contact_number;
$_SESSION['user_name'] = $user_name;
$_SESSION['password'] = $pass;

      $_SESSION['id']=$current_user_id;
      $_SESSION['success'] = "You are now logged in";

      $_SESSION['userId'] = $results;



      header("Location: Welcome.php");
    }else {
        echo '<script>alert("Your Username or Password is Wrong")</script>';
    }
    
  }
 
?>


<html>
<head>
<title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<body>


    <div class="loginbox">
    <img src="css/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form method="post">
            <p>Username</p>
            <input type="text" name="user_name" required>
            <p>Password</p>
            <input type="password" name="password" required>
            <input type="submit" name="btnlog" value="Login" >
            
            <a href="Signup.php">Don't have an account?</a>&nbsp&nbsp&nbsp<a href="admin-access.php">Administrator</a>
        </form>
        
    </div>

</body>
</head>
</html>
