<?php
session_start();

if (isset($_COOKIE['username']))
 {
    $_SESSION["username"] = $_COOKIE['username'];
    header("Location:loggedin_layout.php");
 }
 else
 {
?>

<form action="checklogin.php" method="POST">
  <fieldset>
    <legend><b>LOGIN</b></legend>
    <form action="#" method="POST">
        <table>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <hr />
        <input name="remember" type="checkbox">Remember Me
        <br/><br/>
        <input type="submit" value="Submit">        
        <a href="forgot_password.php">Forgot Password?</a>
    </form>
</fieldset>
  
</form>

<?php
}
?>