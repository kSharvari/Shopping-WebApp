
<?php
include "authguard.php";
$pid=$_GET['pid'];
$userid=$_SESSION['userid'];

include "../Shared/connection.php";

$status=mysqli_query($conn,"insert into cart(uid,pid) values($userid,$pid)");
if($status){
    echo "Added to cart successfully!";
    header("location:home.php");
}
else{
    echo "Failed to Add Cart";
    echo mysqli_error($conn);
}

?>