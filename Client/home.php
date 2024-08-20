
<?php
include "authguard.php";
include "menu.html";
?>

<html>
    <head>
        <style>
            .card{
                width:320px;
                height:fit-content;
                background-color: #ace5ee;
                margin:10px;
                display:inline-block;
            }   
            .delete{
                background:maroon;
                width:fit-content;
                position:absolute;
                top:0;
                right:0;
                color:white;                
            }
            .name{
                text-transform:capitalize;
            }        
            .pdtimg{
                width:100%;
                height:300px;
            }
            .add-cart{
                width:24px;
            }

            .detail{
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        
    </body>

</html>

<?php


include_once "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product");


while($row=mysqli_fetch_assoc($sql_result)){
  
    echo "<div class='card p-4 m-4'>
    
    <h3 class='name font-weight-bold'>$row[name]</h3>
    <h5 class='price text-danger'>Rs.$row[price]</h5>
    <img class='pdtimg rounded p-1' src='$row[impath]'>
    <div class='detail m-1'>$row[detail]</div>

    <div class='text-center mt-2'>
    <a href='addcart.php?pid=$row[pid]' class='btn btn-primary' >
        Add to Cart
    </a>
    </div>

    </div>";

}



?>