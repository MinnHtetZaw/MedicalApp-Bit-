<?php  
session_start();
include('connect.php');

include('cartfunction.php');
include('header1.php');
if(!isset($_SESSION['Patientid'])) 

	{
		echo "<script>window.alert('Your Shopping Cart is Empty')</script>";
		echo "<script>window.location='medicinedisplay.php'</script>";
		exit();
	}

if(isset($_POST['btnCheckout'])) 
{
	//Insert Orders--------------------------------------------------

	$txtsaleid=$_POST['txtsaleid'];
	$txtsaledate=$_POST['txtsaledate'];
	$txtstatus='Pending';
	$txtCardInfo=$_POST['txtCardInfo'];
	$txtPaymentID=$_POST['txtPaymentID'];
	$txtpaymentdate=$_POST['txtpaymentdate'];
	
	
	//----------------------------------------------

	$pid=$_SESSION['Patientid'];
	$name=$_SESSION['PatientName'];
	$TotalAmount=CalculateTotalAmount();
	$TotalQuantity=CalculateTotalQuantity();
	$Status="Pending";

	//Insert Order Data in table.

	$query="INSERT INTO medicinesale
			(`medicinesaleid`, `saledate`, `status`, `totalcost`,`totalquantity`, `patientid`,`paymentid`)
		    VALUES ('$txtsaleid','$txtsaledate','$txtstatus','$TotalAmount','$TotalQuantity', '$pid','$txtPaymentID')";
	$ret=mysqli_query($connect,$query);


	//Payment--------------------------------------------------


	$pay="INSERT INTO payment
					(`paymentid`,`paymentdate`)
					VALUES 
					('$txtPaymentID','$txtpaymentdate')";
	$ret=mysqli_query($connect,$pay);
					
	//Payment--------------------------------------------------


	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size; $i++) 
	{ 
		$ProductID=$_SESSION['ShoppingCart'][$i]['medicineid'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		
		echo $insert_ODetail="INSERT INTO salelist
				 (medicinesaleid, medicineid, quantity)
				 VALUES 
				 ('$txtsaleid','$ProductID','$BuyQuantity')";
		$ret=mysqli_query($connect,$insert_ODetail);

//		$updateQty="UPDATE foodtable
//					SET Quantity=Quantity-'$BuyQuantity'
//					WHERE FoodID='$ProductID'";
		
//		$ret=mysqli_query($connect,$updateQty);
	}

	if($ret)
	{
		unset($_SESSION['ShoppingCart']);
		echo "<script>window.alert('Checkout Process Complete')</script>";
		echo "<script>window.location='medicinedisplay.php'</script>";
	}
	else
	{
		echo "<p>Something went wrong in Checkout Form :" . mysqli_error($connect) . "</p>";
	}
}
?>
<html>
<head>
<title>Checkout</title>

<script type="text/javascript">

function CalculatePayment() 
{
	var TotalAmount=0;
	TotalAmount=document.getElementById('txtcost').value;
	TotalAmount=TotalAmount / 2;
	document.getElementById('txtNetAmount').value=TotalAmount;
	document.getElementById('txtPendingAmount').value=TotalAmount;
}

function DisplayCard() 
{
	
}

function HideCard() 
{
	
}

</script>

</head>
<body>
<form action="checkout.php" method="post">
<fieldset>
<legend>Secure Checkout :</legend>
<table align="center" height="550px" width="550px" bgcolor="">
<tr>
	<td>MedicineSale ID</td>
	<td>
	 : <input type="text" name="txtsaleid" value="<?php echo AutoID('medicinesale','medicinesaleid','MS_',6) ?>" readonly/>
	</td>
</tr>

<tr>
	<td>Sale Date</td>
	<td>
	 : <input type="text" name="txtsaledate" value="<?php echo date('Y-m-d') ?>" readonly/>
	</td>
</tr>

<tr>
	<td>Patient Name</td>
	<td>
	 : <input type="text" name="txtpname" value="<?php echo $_SESSION['Patientid'] ?>" readonly/>
	</td>
</tr>
<tr>
	<td>Total Cost</td>
	<td>
	 : <input type="text" id="txtcost" name="txtcost" value="<?php echo CalculateTotalAmount() ?>" readonly/> MMK
	</td>
</tr>

<tr>
	<td>Total Quantity</td>
	<td>
	 : <input type="text" name="txtTotalQuantity"  value="<?php echo CalculateTotalQuantity() ?>" readonly /> Pcs
	</td>
</tr>
<tr>
	<td>Payment Option</td>
	<td>
	 : <input onClick="HideCard()" type="radio" name="rdoPaymentOption" value="COD" checked/> <abbr title="Cash on Pick Up">Cash On Pick Up</abbr>
	  
	   <input type="text" name="txtCardInfo" size="25" placeholder="#### #### #### ####" style="display:none;"/>
	</td>
</tr>
<tr>
	<td>Payment ID</td>
	<td>
	 : <input type="text" name="txtPaymentID" value="<?php echo AutoID('payment','paymentid','Pay_',6) ?>" readonly/>
	</td>
</tr>
	<td>Payment Date:</td>
	<td>
	  <input style="width:500px;display:block" name="txtpaymentdate" id="datepicker">
	</td>
</tr>


<tr>
	<td></td>
	<td>
	<input type="submit" name="btnCheckout" value="Checkout Now"/>
	<button><a href="cart.php?action=clear">Cancel</a></button>
	</td>
</tr>
</table>
</fieldset>
</br>

<table align="center" border="1" cellpadding="10px">
<tr>	
	<th>Image</th>
	<th>Food Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th>SubTotal</th>
	
</tr>
<?php 
	$size=count($_SESSION['ShoppingCart']);

	for($i=0;$i<$size;$i++) 
	{ 
		$Image1=$_SESSION['ShoppingCart'][$i]['medicineimage'];
		list($width,$height)=getimagesize($Image1);
		$w=$width/5; 
		$h=$height/5; 

		$ProductID=$_SESSION['ShoppingCart'][$i]['medicineid'];
		$ProductName=$_SESSION['ShoppingCart'][$i]['medicinename'];
		$Price=$_SESSION['ShoppingCart'][$i]['price'];
		$BuyQuantity=$_SESSION['ShoppingCart'][$i]['BuyQuantity'];
		$SubTotal=$Price * $BuyQuantity;

		echo "<tr>";
		echo "<td><img src='$Image1' width='$w' height='$h' /></td>";
		echo "<td>$ProductName</td>";
		echo "<td>$Price MMK</td>";
		echo "<td>$BuyQuantity Pcs</td>";
		echo "<td>$SubTotal MMK</td>";
		echo "</tr>";
	}
?>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
</table>
</form>
</body>
</html>
<?php
include('footer.php');
?>