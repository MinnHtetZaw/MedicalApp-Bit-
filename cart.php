<?php  
session_start(); 
include('header1.php');
include('cartfunction.php');

if(isset($_GET['action'])) 
{
	$action=$_GET['action'];

	if($action==="buy") 
	{
		$mid=$_GET['MedicineID'];
		$BuyQuantity=$_GET['txtBuyQuantity'];
		Add($mid,$BuyQuantity);
	}
	elseif($action==="clearall")
	{
		ClearAll();
	}
	elseif($action==="remove")
	{
		$mid=$_GET['MedicineID'];
		Remove($mid);
	}
}
else
{
	$action="";
}
?>
<html>
<head>
	<title>Shopping Cart</title>
</head>
<body>
<form>

<fieldset>
<legend>Medicine Detail :</legend>
<?php  
if(!isset($_SESSION['ShoppingCart'])) 
{
	echo "<p>Empty Cart</p>";
	echo "<img src='images/cart_is_empty.png'  width='300' height='300'/>";
	echo "<br/>";
	echo "<br/><a href='medicinedisplay.php'>Medicine Display</a>";
	exit();
}
?>
<table align="center" border="1" cellpadding="10px">
<tr>
	<th>Image</th>
	<th>Medicine</th>
	<th>Medicine Name</th>
	<th>Price</th>
	<th>Buy Quantity</th>
	<th>Sub Total</th>
	<th>Action</th>
</tr>
<?php

	$size=count($_SESSION['ShoppingCart']);

	for ($i=0;$i<$size;$i++) 
	{ 	
		$Image1=$_SESSION['ShoppingCart'][$i]['medicineimage'];
		$ProductID=$_SESSION['ShoppingCart'][$i]['medicineid'];
		$ProductName=$_SESSION['ShoppingCart'][$i]['medicinename'];
		 $Price=$_SESSION['ShoppingCart'][$i]['price'];
		 $BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		 $SubTotal= $Price * $BuyQuantity;

		echo "<tr>";
		echo "<td><img src='$Image1' width='100px' height='100px'/></td>";
		echo "<td>$ProductID</td>";
		echo "<td>$ProductName</td>";
		echo "<td>$Price MMK</td>";
		echo "<td>$BuyQuantity Pcs</td>";
		echo "<td>$SubTotal MMK</td>";

		echo "<td><a href='cart.php?action=remove&MedicineID=$ProductID'>Remove</a></td>";

		echo "</tr>";
	}
?>
<tr>
	<td colspan='7' align="right">
	TotalAmount : <b><?php echo CalculateTotalAmount() ?></b> MMK<br/>
	TotalQuantity : <b><?php echo CalculateTotalQuantity() ?></b> Pcs<br/>
	<a href="medicinedisplay.php">Medicine Display</a> |
	<a href="cart.php?action=clearall">Empty Cart</a> |
	<a href="Checkout.php">Make Checkout</a> 
	</td>
</tr>
</table>

</fieldset>
</form>
</body>
</html>
<?php
include('footer.php');
?>