<?php

include_once "../Shared/connection.php";

include "authguard.php";
$pid=$_GET['pid'];

$status = mysqli_query($conn,"Delete from product where pid=$pid");
if($status){
    echo "Product removed successfully";
    header("location:view.php");
}
else{
    echo "Failed to delete cart item";
    echo mysqli_error($conn);
}
?>