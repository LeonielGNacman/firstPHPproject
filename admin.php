<head>
	<input class="btnlog"type="button" name="" style="width: 150px;
  padding: 15px;
  cursor: pointer;
  box-shadow: 6px 6px 5px; #999;
  webkit-box-shadow: 6px 6px 5px #999;
  -moz-box-shadow: 6px 6px 5px #999;
  font-weight: bold;
  background: #ffff00;
  color: #000;
  border-radius: 10px;
  border: 1px solid #999; 
  font-size: 95%;" value="LOG OUT" onclick="window.location.href='Logout.php'"/>
</head>
<body>
	<style>
		body{
			background-color: FFB06A;

		}
	</style>
<title>ADMIN</title>
<center>
	<h1> ADMINISTRATOR</h1>
<hr size="4">
<?php
$search = $searchErr = "";


?>
<title>Administrator</title>
<table border="0" width="70%">
<form method="post">


	<tr>
		<td><b>Name</b></td>
		<td><b>Gender</b></td>
		<td><b>Address</b></td>
		<td><b>Contact no.</b></td>
		<td><b>Username</b></td>
		<td><b>Password</b></td>
		<td><center><b>Option</b></td>


	</tr>

	<tr>
		<td colspan="7"> <hr> </td>
	</tr>
	
<?php
	include("connections.php"); 




	$full_name = "";

	$view_query = mysqli_query($connections, "SELECT * FROM user"); 

	while ($row = mysqli_fetch_assoc($view_query)) {
		
		$user_id = $row["user_id"];

		$db_first_name = $row["first_name"];
		$db_middle_name = $row["middle_name"];
		$db_last_name = $row["last_name"];
		$db_gender = $row["gender"];
		$db_address = $row["address"];
		$db_contact_number = $row["contact_number"];
		$db_user_name = $row["user_name"];
		$db_password = $row["password"];

		$full_name = ucfirst($db_first_name) . " " . ucfirst($db_middle_name) . " " . ucfirst($db_last_name);



		echo "
				<tr> 
					<td>$full_name</td>
					<td>$db_gender</td>
					<td>$db_address</td>
					<td>$db_contact_number</td>
					<td>$db_user_name</td>
					<td>$db_password</td>
					<td>
						<center>

						<a href='edit.php?user_id=$user_id'>Update</a>

						<a href='delete.php?user_id=$user_id'>Delete </a>
					</td>

					<tr>
						<td colspan='7'><hr></td>
					</tr> 


				</tr>

		";


	}


?>

</table>
</center>
</body>