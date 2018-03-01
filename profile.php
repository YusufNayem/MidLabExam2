<?php
session_start();

if (isset($_SESSION['username']) ){
$GLOBALS['username']=$_SESSION['username'];
	$servername ="localhost";
	$dbusername 	="root";
	$dbpassword 	="";
	$dbname 	="lab";
	
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	
	if(!$conn)
	{
		die("Connection Error!".mysqli_connect_error());
	}
	
	$sql = "select * from user where username='$username'";
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result)>0)
	{
		
		while($row=mysqli_fetch_assoc($result))
		{
			$GLOBALS['name']=$row['name'];
			$GLOBALS['email']=$row['email'];
			$GLOBALS['gender']=$row['gender'];
			$GLOBALS['dob']=$row['dob'];
			$GLOBALS['picture']=$row['picture'];
		}
		
	}else
	{
		echo "Result not found!";
	}

	mysqli_close($conn);
?>

<fieldset>
    <legend><b>PROFILE</b></legend>
	<form>
		<br/>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td> <?php echo $name; ?> </td>	
				<td rowspan="7" align="center">
					<?php
                            echo '<img height="48" src="'.$picture.'">';
                    ?>
                    <br/>
                    <a href="picture.php">Change</a>
				</td>
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td> <?php echo $email; ?> </td>	
			</tr>		
			<tr><td colspan="3"><hr/></td></tr>			
			<tr>
				<td>Gender</td>
				<td>:</td>
				<td> <?php echo $gender; ?> </td>	
			</tr>
			<tr><td colspan="3"><hr/></td></tr>
			<tr>
				<td>Date of Birth</td>
				<td>:</td>
				<td> <?php echo $dob; ?> </td>	
			</tr>
		</table>	
        <hr/>
        <a href="#">Edit Profile</a>	
	</form>
</fieldset>

<?php

}
else
{
	echo "Login First";
}



?>