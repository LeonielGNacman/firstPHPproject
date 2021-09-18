<?php
include("connections.php");

if(empty($_GET["search"])){

	echo "Index must not be empty!";
}else{
	 $search = $_GET["search"];

	 $terms = explode(" ", $check);

	 $query = "SELECT * FROM user WHERE ";

	 $i = 0;

	
}	

?>