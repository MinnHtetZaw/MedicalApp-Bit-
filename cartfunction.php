<?php  
function Add($mid,$BuyQuantity)
{
	$connect=mysqli_connect('localhost','root','','booking_db');
	$query="SELECT * FROM medicine WHERE medicineid='$mid'";
	$ret=mysqli_query($connect,$query);
	$count=mysqli_num_rows($ret);
	
	if($count<1) 
	{
		echo "<p>No Record Found.</p>";
		exit();
	}
	$arr=mysqli_fetch_array($ret);

	$mname=$arr['medicinename'];
	$Price=$arr['price'];
	$mimg=$arr['medicineimage'];

	if(isset($_SESSION['ShoppingCart'])) 
	{
		$index=IndexOf($mid);

		if($index==-1) 
		{
			$size=count($_SESSION['ShoppingCart']);
			$_SESSION['ShoppingCart'][$size]['medicineid']=$mid;
			$_SESSION['ShoppingCart'][$size]['medicinename']=$mname;
			$_SESSION['ShoppingCart'][$size]['price']=$Price;
			$_SESSION['ShoppingCart'][$size]['BuyQuantity']=$BuyQuantity;
			$_SESSION['ShoppingCart'][$size]['medicineimage']=$mimg;	
		}
		else
		{
			$_SESSION['ShoppingCart'][$index]['BuyQuantity']+=$BuyQuantity;
		}
	}
	else
	{
		$_SESSION['ShoppingCart']=array();
		$_SESSION['ShoppingCart'][0]['medicineid']=$mid;
		$_SESSION['ShoppingCart'][0]['medicinename']=$mname;
		$_SESSION['ShoppingCart'][0]['price']=$Price;
		$_SESSION['ShoppingCart'][0]['BuyQuantity']=$BuyQuantity;
		$_SESSION['ShoppingCart'][0]['medicineimage']=$mimg;
	}
	echo "<script>window.location='cart.php'</script>";
}

function Remove($mid)
{
	$index=IndexOf($mid);

	if($index!=-1) 
	{
		unset($_SESSION['ShoppingCart'][$index]);
		echo "<script>window.location='cart.php'</script>";
	}
}

function ClearAll()
{
	unset($_SESSION['ShoppingCart']);
	echo "<script>window.location='cart.php'</script>";
}


function CalculateTotalAmount()
{
	$totalamount=0;

	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$Price=$_SESSION['ShoppingCart'][$i]['price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$totalamount=$totalamount+($Price * $BuyQuantity);
	}
	return $totalamount;
}
function CalculateTotalQuantity()
{
	$Qty=0;

	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$Qty=$Qty + ($BuyQuantity);
	}
	return $Qty;
}

function CalculateTax()
{
	$tax=0;
	$totalamount=CalculateTotalAmount();
	$tax=$totalamount * 0.05;

	return $tax;
}

function IndexOf($mid)
{
	if(!isset($_SESSION['ShoppingCart'])) 
	{
		return -1;
	}

	$size=count($_SESSION['ShoppingCart']);

	if($size==0) 
	{
		return -1;
	}

	for($i=0;$i<$size;$i++) 
	{ 
		if($mid == $_SESSION['ShoppingCart'][$i]['medicineid']) 
		{
			return $i;
		}
	}
	return -1;
}

?>