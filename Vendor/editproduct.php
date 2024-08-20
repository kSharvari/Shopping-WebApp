<?php
include "authguard.php";
include "menu.html";
include_once "../Shared/connection.php";

if(isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    $product_query = mysqli_query($conn, "SELECT * FROM product WHERE pid = $pid");
    $product = mysqli_fetch_assoc($product_query);
}


?>

<html>
<head>
<style>
        body{
            background-image: url('../Shared/images/bgimg.png');
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100 p-3">

    <form action="updateproduct.php" method="POST" class="w-50 bg-info rounded p-4" enctype="multipart/form-data">

    <h3 class="text-center text-light">Update Product</h3>


        <input type="hidden" name="pid" value="<?php echo $product['pid']; ?>">
        <label for="name">Product Name:</label>
        <input class="form-control mt-2" type="text" id="name" name="name" value="<?php echo $product['name']; ?>"><br>
        <label for="detail">Product Description:</label>

        <textarea cols="30" rows="5" class="form-control mt-2" id="detail" name="detail"><?php echo $product['detail']; ?></textarea><br>


        <label for="price">Product Price:</label>
        <input class="form-control mt-2" type="text" id="price" name="price" value="<?php echo $product['price']; ?>"><br>
        <label for="pdtimg">Product Image:</label>
        <input class="form-control mt-2" type="file" name="pdtimg" accept=".jpg,.png" value="<?php echo $product['impath']; ?>">
        <div class="text-center mt-3">
            <button class='btn btn-primary' type="submit">Update Product</button>
        </div>

        

        
    </form>

</div>
</body>
</html> 