<?php
session_start();
include('connect.php');
include('headerlogin.php');

if(isset($_SESSION['count']))
{
	$count=$_SESSION['count'];
	if($count==3)
	{
		echo "<script>
		alert('3 Time Login Fail')
		window.location='LoginTimer.php'</script>";
	}
}

if (isset($_POST['btnlogin'])) 
{
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	
	$insert="Select * from patient
			where patientemail='$email' 
			and patientpassword='$password'
			";

	$ret=mysqli_query($connect,$insert);
	$count=mysqli_num_rows($ret);

	if ($count>0) 
	{	
		$row=mysqli_fetch_array($ret);
		
		$_SESSION['Patientid']=$row['patientid'];
		$_SESSION['Email']=$email;
		$_SESSION['PatientName']=$row['patientname'];

		echo "<script>alert('Patient Login Sucessfully');
			window.location.assign('display.php');</script>";


	}

	else
 {	
		$select1="select * from staff where staffemail='$email' and staffpassword='$password'";
		$ret1=mysqli_query($connect,$select1);
		$count1=mysqli_num_rows($ret1);

		if ($count1>0) 
		{	
			$row1=mysqli_fetch_array($ret1);
			$_SESSION['adminid']=$row1['staffid'];
		
			echo "<script>alert('Admin Login Sucessfully');window.location.assign('Adminhomepage.php');</script>";
		}

		else
		{
			echo "<script>alert('Please Login Again');
						window.location.assign('Login.php');</script>";	
			
			
			if(isset($_SESSION['count']))
			{
				$_SESSION['count']++;
			}
			else
			{
				$_SESSION['count']=1;
			}
			
		}
	}
}
?>
<html>
<head>
	<title></title>
</head>
<body>

<h1 align="center">Login Form</h1>

<form action="Login.php" method='POST'>

<table align="center" height="600px" width="470px" bgcolor="">
<tr>
	<td>Email Address</td>
	<td><input type="email" name="txtemail" placeholder="Enter Email" required></td>
</tr>

<tr>
	<td>Password</td>
	<td><input type="Password" name="txtpassword" placeholder="Enter Password" required></td>
</tr>

<tr>
	<td></td>
	<td><input type="submit" value="Login" id="submit" name="btnlogin"> <input type="reset" name="btncancel" value="Cancel"></td>
</tr>
<tr>
	<td colspan="2" align="center"><a href="patient.php"><u style="color:blue; font-weight:bold;">Register For Patient</u></a></td>
</tr>
<tr>
	<td colspan="2" align="center"><a href="staff.php"><u style="color:blue; font-weight:bold;">Register For Staff</u></a></td>
</tr>
</table>
</form>


<?php
include('footer.php');
?>