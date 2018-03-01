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
            $GLOBALS['picture']=$row['picture'];
        }
        
    }else
    {
        echo "Result not found!";
    }
    mysqli_close($conn);
?>


<table width="100%" align="center" cellspacing="0" cellpadding="10" border="1">
    <tr>
        <td colspan="2" valign="middle" height="70">
            <table width="100%">
                <tr>
                    <td>
                        <a href="#">
                            <?php
                            echo '<img height="48" src="'.$picture.'">';
                            ?>
                            
                        </a>
                    </td>
                    <td align="right">
                        Logged in as <a href="#"><?php echo $_SESSION["username"]; ?></a>&nbsp;|
                        <a href="logout.php">Logout</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="190" valign="top">
            <b>&nbsp;Account</b><hr />
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="profile.php">View Profile</a></li>
                <li><a href="picture.php">Change Profile Picture</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </td>
        <td valign="top">
            
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            Copyright &copy; 2017
        </td>
    </tr>
</table>

<?php

}else{
        echo "Please login first";
    }

?>