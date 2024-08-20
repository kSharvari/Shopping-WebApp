<?php
include_once "../Shared/connection.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ppid = $_POST['pid'];
    $pname = $_POST['name'];
   $pdetail = $_POST['detail'];
   $pprice = $_POST['price'];
   

    $pdtimg="../Shared/images/".$_FILES["pdtimg"]["name"];

     move_uploaded_file($_FILES["pdtimg"]["tmp_name"],$pdtimg);
    // Update product details in the database
    $update_query = "UPDATE product SET name='$pname', detail='$pdetail', price='$pprice', impath='$pdtimg' WHERE pid=$ppid";
    mysqli_query($conn, $update_query);

    // Redirect back to the product listing page or any other page as needed
    header("Location: view.php");
    exit();
}
?>