<?php
include("connections.php");

$user_id = $_GET["user_id"];
$get_record = mysqli_query($connections, "SELECT * FROM user WHERE user_id='$user_id'");

$get_record_num = mysqli_num_rows($get_record);

if($get_record_num > 0 ){
	
	while ($row = mysqli_fetch_assoc($get_record))  {

		$db_first_name = $row["first_name"];
		$db_middle_name = $row["middle_name"];
		$db_last_name = $row["last_name"];
		$db_gender = $row["gender"];
		$db_address = $row["address"];
		$db_contact_number = $row["contact_number"];
		$db_user_name = $row["user_name"];
		$db_password = $row["password"];
		
	}
 

		if(isset($_POST["btnUpdate"])){

			$new_first_name = $_POST["new_first_name"];
			$new_middle_name = $_POST["new_middle_name"];
			$new_last_name = $_POST["new_last_name"];
			$new_gender = $_POST["new_gender"];
			$new_address = $_POST["new_address"];
			$new_contact_number = $_POST["new_contact_number"];
			$new_user_name = $_POST["new_user_name"];
			$new_password = $_POST["new_password"];

			mysqli_query($connections, "UPDATE user SET first_name='$new_first_name', middle_name='$new_middle_name',
				last_name='$new_last_name', gender='$new_gender', address='$new_address', contact_number='$new_contact_number',
				user_name='$new_user_name', password='$new_password' WHERE user_id='$user_id'");

			header("Location: admin.php");
			
		}

			
		
	

?>
<title>Update</title>
<style>
	.error {
		color: red;
	}
	.admin{
		background-color: FFB06A; 
		
	}
</style>
<form method="post">
	<div class="admin">
	<center>
	<table border="1" >

	<tr><td>First Name</td>
		<td><input type="text" name="new_first_name" value="<?php echo $db_first_name; ?>"> </td>
	</tr>
	<tr><td>Middle Name</td>
		<td><input type="text" name="new_middle_name" value="<?php echo $db_middle_name; ?>"> </td>
	</tr>
	<tr><td>Last Name</td>	
		<td><input type="text" name="new_last_name" value="<?php echo $db_last_name; ?>"> </td>
	</tr>
	<tr><td>Gender</td>	
		<td><select name="new_gender">

			<option name="new_gender" <?php if($db_gender == "Male"){echo "selected";} ?>value="Male">Male</option>
			<option name="new_gender" <?php if($db_gender == "Female"){echo "selected";} ?>value="Female">Female</option>

			

		</select></td>
	</tr>
	<tr><td>Address</td>	
		<td><input type="text" name="new_address" value="<?php echo $db_address; ?>"> </td>
	</tr>
	<tr><td>Contact Number</td>	
		<td><input type="text" name="new_contact_number" value="<?php echo $db_contact_number; ?>"> </td>
	</tr>
	<tr><td>User Name</td>
		<td><input type="text" name="new_user_name" value="<?php echo $db_user_name; ?>"> </td>
	</tr>
	<tr><td>Password</td>
		<td><input type="text" name="new_password" readonly value="<?php echo $db_password; ?>"> </td>
	</tr>
	<tr><td align="center"><a href="admin.php">Cancel</a></td>
		<td><input type="submit" name="btnUpdate" value="Update"></td>
	</tr>
		

	



</center>
</div>
</form>
</table>

<?php

}else{
	echo "<h1>No Record Found.</h1>";


}


?>