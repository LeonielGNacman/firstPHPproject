<?php 
include("inc-cart.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title> ADD TO CART</title>
		<h1> PHPESOS: Ticketnet </h1>
<link rel="stylesheet" type="text/css" href="css/home.css">
	</head>
	<body style="background-color: peru;">
		<div class="header">	

		<input class="btnlog"type="button" name="" value="View Profile" onclick="window.location.href='profile.php'"/>

		
</div>
	
	
	
		<ul>
			<li><a href="Welcome.php">HOME</a></li>
			<li><a href="cart.php">TICKETS</a>
				
		</li>
			<li><a href="about.html">ABOUT US</a></li>
			
		</ul>

<br>
<br>
<br>
<br>
		<hr size="5" style="color: black; border-top: 3px solid red;"> </hr>

		<br />
		<div class="container">
				<h1 align="center">Order Now </h1>
			<br />
			<br /><br />
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div>
				<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#8e8e8d; border-radius:5px; padding:16px;" align="center"> <br>
						<img src="pic/<?php echo $row["image"]; ?>"  /><br />

						<h4><?php echo $row["name"]; ?></h4>

						<h4>₱ <?php echo $row["price"]; ?></h4>

						<input type="number" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_event" value="<?php echo $row["event"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="color:black; border-radius:30px; background:-webkit-radial-gradient(left, red,green);" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h1 align="center">Order Details</h1>
			<div class="table-responsive">
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
							echo '<script>window.location="Welcome.php"</script>';
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">₱ <?php echo number_format($total, 2); ?></td>
						<td> <input type="submit" name="submit" value="Buy" ></td>

					</tr>
					<?php
					}
					?>
				</form>		
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>

