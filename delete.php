<?php
 include("connections.php");
 $user_id = $_GET["user_id"];

 $get_record = mysqli_query($connections, "SELECT * FROM user WHERE user_id='$user_id'");
 $check_get_record =mysqli_num_rows($get_record);

 if($check_get_record > 0 ){
 	$row = mysqli_fetch_assoc($get_record);
 	$db_first_name = $row["first_name"];
 	$db_middle_name = $row["middle_name"];
 	$db_last_name = $row["last_name"];

 	$full_name = ucfirst($db_first_name) . " " . ucfirst($db_middle_name) . " " . ucfirst($db_last_name);

 	if(isset($_POST["btnDelete"])){
 		mysqli_query($connections, "DELETE FROM user WHERE user_id='$user_id'");

 		header("Location: admin.php");
 	}
 ?>

<body style="background-color: FFB06A;">
<form method="post">
	<h1>You are about to delete <font color="red"><?php echo $full_name; ?>  </font></h1>
	<br>
	<h3> Are you sure? </h3>
	<br>
	<input type="submit" name="btnDelete" value="Delete">
	&nbsp;
	<a href="admin.php">Cancel</a>


</form>

</body>
<?php
 }else{

 	echo "<h1> 404 PAGE NOT FOUND</h1>";
 }


?>