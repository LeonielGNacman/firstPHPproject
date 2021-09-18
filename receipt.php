<?php
include("inc-cart.php");

?>

<html>
<head>
<title>Print Receipt</title>	
<h1 align="center" > Print Receipt</h1>

<style type="text/css">
	body{
		background-color: FFB06A;
		padding: 30px;
		margin-top: 70px;
		margin-left: 20px;
		margin-right: 20px;
	}
	h1{
		background-color: gray;
		font-size: 30px;
  		padding: 15px;
  		text-align: center;
  		box-shadow: 6px 6px 5px; #999;
  		webkit-box-shadow: 6px 6px 5px #999;
  		-moz-box-shadow: 6px 6px 5px #999;
  		font-weight: bold;
  		background: #ffff00;
 		 color: #000;
  		border-radius: 30px;
   
 		 font-size: 95%;
			}

</style>

</head>
<body>
	<br>

<table class="table table-bordered" border="4" align="center">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr >
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>₱ <?php echo $values["item_price"]; ?></td>
						<td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
				<form method="post" action="cart.php">
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}if(isset($_POST["submit"])){
							echo '<script>alert("Done")</script>';
							echo '<script>window.location="receipt.php"</script>';
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">₱ <?php echo number_format($total, 2); ?></td>
						<td> <input type="submit" name="submit" value="Print Receipt" ></td>

					</tr>
					<?php
					}
					?>
				</form>		
				</table>

</body>

</html>