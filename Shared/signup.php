<?php

$uname=$_POST['uname'];
$upass=$_POST['upass1'];

$umail=$_POST['email'];

$hash_pwd=md5($upass);
$usertype=$_POST['usertype'];

include_once "connection.php";



$status=mysqli_query($conn,"insert into user(user_name,user_mail,user_pwd,user_type) values('$uname','$umail','$hash_pwd','$usertype')");
if($status){
    echo "User Signup Success";
}
else{
    echo "Signup Failed";
    echo mysqli_error($conn);
}

?>