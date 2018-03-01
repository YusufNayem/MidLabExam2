<?php
session_start();
error_reporting(0);
 if(isset($_SESSION["username"]) )
    {
    $username=$_SESSION['username'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["myfile"]["name"]);
	$filename = $_FILES['myfile']['name'];
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$GLOBALS['fileUploadPath']="uploads/".$filename;
	
    if ($_FILES["myfile"]["size"] > 7000000) 
    {
        //echo "Sorry, your file is too large.";
    	//header("Location: home.php?status=sizeerror");
    }
    elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) 
    {
       // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //header("Location: home.php?status=formaterror");
    }
	elseif(move_uploaded_file($_FILES['myfile']['tmp_name'], $fileUploadPath)){
		//header("Location: home.php?status=filedone");
	}else
	{
		//header("Location: home.php?status=fileerror");
	}
    if (isset($_POST['submit'])) {
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
		 	 $sql = "UPDATE user SET picture='$fileUploadPath' WHERE username='$username'";
	
	        if(mysqli_query($conn, $sql))
	        {
		    //echo "<br/> Data Inserted!";
	        	header("Location: loggedin_layout.php?success");	
	        }
	        else
	        {
	        	echo "<br/> SQL Error".mysqli_error($conn);
	        }
	        mysqli_close($conn);
	    }
    }
         

?>


<fieldset>
    <legend><b>PROFILE PICTURE</b></legend>
    <form action="#" method="post" enctype="multipart/form-data" >
        <!--
        <img width="128" src="../image/user.png" />
        -->
        <br />
        <input type="file" name="myfile">
        <hr />
        <input type="submit" value="Submit" name="submit">
    </form>
</fieldset>

<?php

       
	}
	else
	{
		echo "Please Login First";
	}

	?>