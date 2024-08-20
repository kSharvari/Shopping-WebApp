
<?php
include "authguard.php";
include "menu.html";
?>

<html>
    <head>
        <style>

body {
            margin: 0;
            padding-bottom: 70px; /* Add padding to accommodate the sticky bottom bar */
        }
            .card{
                width:350px;
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

            .sticky_bottom{
                position: fixed;
                width:100%;
                bottom: 0; 
            }
        </style>
    </head>
    <body>

    <script>
        function confirmDelete(cartid){
            res=confirm("Are you sure want to remove from cart?")
            if(res){
                window.location=`deletecart.php?cartid=${cartid}`;
            }
        }

        function confirmOrder(cartid, pid) {
        res = confirm("Are you sure you want to place order?")
    if (res) {
        window.location = `place_order.php`;
    }
}
    </script>
        
    </body>

</html>

<?php


include_once "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where cart.uid=$_SESSION[userid]");

//<a href='deletecart.php?cartid=$row[cartid]' class='delete btn'>X</a>
$total=0;
while($row=mysqli_fetch_assoc($sql_result)){
  
    $total+=$row['price'];
    echo "<div class='card p-4 '>   
    <button onclick=confirmDelete($row[cartid]) class='delete btn'>X</button>
    <h3 class='name font-weight-bold'>$row[name]</h3>
    <h5 class='price text-danger'>Rs.$row[price]</h5>
    <img class='pdtimg rounded p-1' src='$row[impath]'>
    <div class='detail m-2'>$row[detail]</div>

    </div>";

}

echo "<div class='bg-primary sticky_bottom'>

    <div class='text-white text-center p-2'>Check Out Price 
    <span class='text-warning'>Rs.$total </span>
    <a href='place_order.php' class='d-inline-block'>
        <button class='btn btn-info'>Place Order</button>
    </a>
    
    </div>

</div>";



?>