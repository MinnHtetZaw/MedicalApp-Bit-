<?php  
session_start();
//include('connection.php');
include('header1.php');

if(isset($_GET['id'])) 
{
	$id=$_GET['id'];

	 $query="SELECT *
			FROM medicine
			WHERE medicineid='$id'";
	$ret=mysqli_query($connect,$query);
	$arr=mysqli_fetch_array($ret);

	$mid=$arr['medicineid'];
	$mname=$arr['medicinename'];
	$price=$arr['price'];
	$mfdate=$arr['manufacturedate'];
	$expdate=$arr['expiredate'];
	$mimg=$arr['medicineimage'];
	
}
else
{
	echo "<script>window.location='medicinedispaly.php'</script>";
}
?>
<html>
<head>
<title>Medicine Detail :</title>
<script type="text/javascript">

function ChangeGallery(PhotoSrc) 
{
	document.images.ImgPhoto.src=PhotoSrc;
}

</script>
</head>
<body>
<form action="cart.php" method="get">
<input type="hidden" name="MedicineID" value="<?php echo $mid ?>"/>
<input type="hidden" name="action" value="buy"/>
<fieldset>
<legend>Medicine Detail of <?php echo $mname ?></legend>
<table align="center">
<tr>
	<td>
	<img src="<?php echo $mimg ?>" width="500px" height="400px" id="ImgPhoto"/><br/>
</td>
	<!--______________________________________-->
	<td>
		<table height="400px" width="480px">
		<tr>
			<td>Medicine Name</td>
			<td>
			: <b><?php echo $mname ?></b>
			</td>
		</tr>
		<tr>
			<td>Price</td>
			<td>
			: <b style="color:blue;"><?php echo $price ?></b> MMK
			</td>
		</tr>
		<tr>
			<td>Manufacture Date</td>
			<td>
			: <b><?php echo $mfdate ?></b>
			</td>
		</tr>
		
		<tr>
			<td>Expire Date</td>
			<td>
			: <b><?php echo $expdate ?></b>
			</td>
		</tr>
		
		<tr>
			<td>Buying Quantity</td>
			<td>
			: <input type="number" name="txtBuyQuantity"/ required>
			
			  <input type="submit" name="btnAdd" value="Buy Now"/>
			</td>
		</tr>
		</table>
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