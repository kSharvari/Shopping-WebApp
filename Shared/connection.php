<?php

$conn=new mysqli("localhost","root","","ecom_project");
if($conn->connect_error){
    echo "Connection Failed";
    die;
}


?>