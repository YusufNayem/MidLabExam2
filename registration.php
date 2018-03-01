<?php
session_start();

if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['confirmPassword'])&&isset($_POST['gender'])&&isset($_POST['day'])&&isset($_POST['month'])&&isset($_POST['year'])&&isset($_POST['userName']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$confirmPassword=$_POST['confirmPassword'];
		$gender=$_POST['gender'];
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		$userName=$_POST['userName'];
		$dob    = $_POST['day']."/".$_POST['month']."/".$_POST['year'];
		if(empty($name))
		{
			echo "* Name Cannot be empty"; echo '</br> ';
		}
		elseif(empty($email))
		{
			echo "* Email Cannot be empty"; echo '</br> ';
		}
		elseif(empty($userName))
		{
			echo "* Username Cannot be empty"; echo '</br> ';
		}
		elseif(empty($password))
		{
			echo "* Password Cannot be empty"; echo '</br> ';
		}
		elseif(empty($confirmPassword))
		{
			echo "* Confirm passwprd Cannot be empty"; echo '</br> ';
		}
		elseif(empty($gender))
		{
			echo "* Gender Cannot be empty"; echo '</br> ';
		}
		elseif(empty($month))
		{
			echo "* Month Cannot be empty"; echo '</br> ';
		}
		elseif(empty($year))
		{
			echo "* Year Cannot be empty"; echo '</br> ';
		}
		elseif(empty($day))
		{
			echo "* Day Cannot be empty"; echo '</br> ';
		}
		elseif($confirmPassword!=$password)
		{
			echo "* Confirm Password Didn't Match"; echo '</br> ';
		}
		else
		{
		  $servername   ="localhost";
	      $dbusername 	="root";
	      $dbpassword 	="";
	      $dbname 	    ="lab";      
	
	      $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	
	     if(!$conn)
	     {
		  die("Connection Error!".mysqli_connect_error());
		 }
		 else
		 {
		 	$sql = "insert into user (`name`, `email`, `username`, `password`, `gender`, `dob`)  values ('$name','$email','$userName','$password','$gender','$dob')";
	
	        if(mysqli_query($conn, $sql))
	        {
		    //echo "<br/> Data Inserted!";
			header("Location: login.php");	
	        }
	        else
	        {
		    echo "<br/> SQL Error".mysqli_error($conn);
	        }
	        mysqli_close($conn);
	    }
		}
	}
?>

<fieldset>
    <legend><b>REGISTRATION</b></legend>
	<form action="#" method="POST">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="userName" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="password" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="confirmPassword" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" type="radio" value="male">Male
						<input name="gender" type="radio" value="female">Female
						<input name="gender" type="radio" value="other">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Date of Birth</legend>    
						<input type="text" name="day" size="2" />/
						<input type="text" name="month" size="2" />/
						<input type="text" name="year" size="4" />
						<font size="2"><i>(dd/mm/yyyy)</i></font>
					</fieldset>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit" value="Submit">
		<input type="reset">
	</form>
</fieldset>

<br> <br>

