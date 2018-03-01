<?php
session_start();
if(isset($_POST['username'])&&isset($_POST['password']))
{
    $username     =$_POST['username'];
    $password     =$_POST['password'];
    $servername   ="localhost";
    $dbusername   ="root";
    $dbpassword   ="";
    $dbname       ="lab";
    
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    
    if(!$conn){
        die("Connection Error!".mysqli_connect_error());
    }
    
    $sql = "select * from user";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){
        
        while($row=mysqli_fetch_assoc($result)){
            if ($username==$row['username'] && $password==$row['password']) 
            {
                $_SESSION["username"] =$row['username'];
                if (isset($_POST['remember'])) 
                {
                setcookie("username", $username, time() + (86400 * 30), "/");
                setcookie("pass", $password, time() + (86400 * 30), "/");
                }
                header("Location: loggedin_layout.php?username=$username");
            }
            else
            {
              echo "Wrong Id or Password";
            }
        }
        
    }else{
        echo "Result not found!";
    }
    mysqli_close($conn);
}
?>