<?php
include "authguard.php";


include_once "../Shared/connection.php";

$userid = $_SESSION['userid'];

$cart_query = "SELECT * FROM cart WHERE uid=$userid";
    $cart_result = mysqli_query($conn, $cart_query);

    while ($cart_row = mysqli_fetch_assoc($cart_result)) {
        $pid = $cart_row['pid'];

        // Get product details
        $product_query = "SELECT * FROM product WHERE pid=$pid";
        $product_result = mysqli_query($conn, $product_query);
        $product_row = mysqli_fetch_assoc($product_result);

        // Insert item into the orders table
        $insert_order_query = "INSERT INTO orders (userid, pid, productname, details, price, impath,Status,uploaded_by) 
                               VALUES ($userid, $pid, '$product_row[name]', '$product_row[detail]', $product_row[price], '$product_row[impath]','Pending',$product_row[uploaded_by])";
        mysqli_query($conn, $insert_order_query);

        // Delete item from the cart
        $cartid = $cart_row['cartid'];
        $delete_cart_query = "DELETE FROM cart WHERE cartid=$cartid";
        mysqli_query($conn, $delete_cart_query);

        header("Location: viewcart.php");
        exit();
    }


?>