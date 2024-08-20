
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* styles.css */
.order-card {
    width: 300px;
    background-color: #E9FFFF;
    margin: 20px;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 123, 255, 0.1);
    display: inline-block;
}

.order-card h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}

.order-card p {
    margin-bottom: 8px;
    font-size: 14px;
    color: #555;
}

    </style>
</head>
<body>


</body>
</html>



<?php
include_once "../Shared/connection.php";
include "authguard.php";
include "menu.html";


$userid = $_SESSION['userid'];

// Fetch orders for products belonging to the current vendor
$sql_result = mysqli_query($conn, "SELECT * FROM orders WHERE pid IN (SELECT pid FROM product WHERE uploaded_by = $userid)");

// Loop through the orders and display them
while ($row = mysqli_fetch_assoc($sql_result)) {
    // Display order details as needed
    echo "<div class='order-card'><h3> Order ID: " . $row['orderid'] . "</h3>";
    echo "<p>Client Id: " . $row['userid'] . "</p>";
    echo "<p>Product Name: " . $row['productname'] . "</p>
    <p>Details: " . $row['details'] . "</p>
    <p>Price: Rs. " . $row['price'] . "</p>";
    echo "<p>Order Date: " . $row['created_date'] . "</p> </div>";
   
}
?>