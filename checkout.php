<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	session_start();
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con,"shopping");
	// Specify the query to Insert Record
	$sql = "insert into Shopping_Cart_Final(CustomerID,ItemName,Quantity,Price,Total,OrderDate)  select CustomerID,ItemName,Quantity,Price,Total,OrderDate from Shopping_Cart where CustomerID=".$_SESSION['ID']."";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	$con = mysqli_connect ("localhost","root");
	// Select Database
	mysqli_select_db($con,"shopping");
	// Specify the query to Insert Record
	$sql = "delete from Shopping_Cart where CustomerID=".$_SESSION['ID']."";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Thank You For Your order");window.location=\'Cart.php\';</script>';
	
	?>
</body>
</html>