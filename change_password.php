<?php
session_start();

    if(isset($_SESSION["username"]) )
    {
    $username=$_SESSION['username'];
    $servername ="localhost";
    $dbusername   ="root";
    $dbpassword   ="";
    $dbname     ="lab";
    
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
            $GLOBALS['currentpassword']=$row['password'];
        }
        
    }else
    {
        echo "Result not found!";
    }

    if (isset($_POST['password']) && isset($_POST['newpassword'])  && isset($_POST['retypenewpassword'])  ) 
 {
    $GLOBALS['retypenewpassword']=$_POST['retypenewpassword'];

     if ($_POST['newpassword']!=$_POST['retypenewpassword']) 
 {
       echo "Retype Password Didn't Match";
 }
 elseif ($_POST['password']!=$currentpassword) 
 {
       echo "Current Password Didn't Match";
 }
 else
 {
    $sql = "UPDATE user SET password='$retypenewpassword' WHERE username='$username'";
    
            if(mysqli_query($conn, $sql))
            {
            //echo "<br/> Password Inserted!";
            header("Location: loggedin_layout.php?Success");
            }
            else
            {
            echo "<br/> SQL Error".mysqli_error($conn);
            }
 }

    mysqli_close($conn);
 }

?>

<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td><font size="3">Current Password</font></td>
				<td>:</td>
                <td><input type="password" name="password" /></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="green">New Password</font></td>
				<td>:</td>
                <td><input type="password" name="newpassword" /></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="red">Retype New Password</font></td>
				<td>:</td>
                <td><input type="password" name="retypenewpassword" /></td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" value="Submit" />
    </form>
</fieldset>

<?php

}else{
        echo "Please login first";
    }

?>