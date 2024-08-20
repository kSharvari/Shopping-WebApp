
<?php

session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['upass'];

$hash_pwd=md5($upass);

include_once "connection.php";


$sql_result=mysqli_query($conn,"select * from user where user_name='$uname' and user_pwd='$hash_pwd'");

if(mysqli_num_rows($sql_result)==0)
{
    echo "<h1>Invalid credentials</h1>";
    die;
}

    echo "<h1>Login Success</h1>";
    
    $row=mysqli_fetch_assoc($sql_result);
    print_r($row);

    $_SESSION['login_status']=true;
    $_SESSION['usertype']=$row['user_type'];
    $_SESSION['userid']=$row['user_id'];

    if($row['user_type']=="Vendor"){
        header("location:../Vendor/home.php");

    }
    else if($row['user_type']=="Client"){

        header("location:../Client/home.php");
    }


?>