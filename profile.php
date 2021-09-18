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
 


  }


?>
<body style="background-color: FFB06A;">
      <link rel="stylesheet" type="text/css" href="css/view.css">

</table>
<form method="post">
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
  font-size: 95%;" value="BACK" onclick="window.location.href='Welcome.php'"/>
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
</form>
      <title>View Profile</title>
<table border="0" width="15%" class="table">
<form method="post">

    <h2 align="center" style="color: red;"><b> HI! <?php echo $db_user_name; ?></b></h2>


  <tr>
    <td><b>Name: <?php echo $full_name; ?></b></td>
  </tr>
  <tr>
    <td><b>Gender: <?php echo $db_gender; ?></b></td>
  </tr>
  <tr>
    <td><b>Address: <?php echo $db_address; ?></b></td>
  </tr>
  <tr>
    <td><b>Contact no: <?php echo $db_contact_number; ?></b></td>
  </tr>

</form>
  </table>
</body>