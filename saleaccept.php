<?php  
include('header2.php');
include('connect.php');

$id=$_REQUEST['searchid'];

$update="UPDATE medicinesale SET status='Approve' 
		 WHERE medicinesaleid='$id'";

$ret=mysqli_query($connect,$update);


if($ret)
{
	echo "<script>alert('Booking Approved.') 
	window.location='medicineapprove.php'</script>";


}
else
	{
		echo mysqli_error($connect);
	}

?>

<?php
include('footer.php');
?>