
<?php

include "authguard.php";
include "menu.html";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-image: url('../Shared/images/bgimg.png');
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 p-4">

    <form action="upload.php" class="w-50 bg-info rounded p-5" method="POST" enctype="multipart/form-data">

    <h3 class="text-center text-light">Upload Product</h3>

        <input class="form-control mt-4" type="text" name="name" placeholder="Product Name">
        <input class="form-control mt-3" type="number" name="price" placeholder="Product Price">
        <textarea class="form-control mt-3" name="detail" placeholder="Product Description" cols="30" rows="5"></textarea>
        <input class="form-control mt-3" type="file" name="pdtimg" accept=".jpg,.png">
        <div class="text-center mt-3">
            <button class='btn btn-success'>Upload</button>
        </div>

    </form>

    </div>
</body>
</html>