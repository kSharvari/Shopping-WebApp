
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
include "authguard.php";
include "menu.html";

include_once "../Shared/connection.php";

$userid = $_SESSION['userid'];

// Retrieve orders for the current user from the database
$sql_result = mysqli_query($conn, "SELECT * FROM orders WHERE userid = $userid");

// Fetch and display orders
while ($row = mysqli_fetch_assoc($sql_result)) {
    echo "<div class='order-card'>
            <h3>Order ID: " . $row['orderid'] . "</h3>
            <p>Product Name: " . $row['productname'] . "</p>
            <p>Details: " . $row['details'] . "</p>
            <p>Price: Rs. " . $row['price'] . "</p>
            <p>Order Date: " . $row['created_date'] . "</p>
            <p>Status: " . $row['Status'] . "</p>

          </div>";
}
?>

