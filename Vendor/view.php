
<?php
include "authguard.php";
include "menu.html";
?>

<html>
    <head>
        <style>

           
            .card{
                width:310px;
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
                height:250px;
            }

            .detail{
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        
    <script>
        function confirmDelete(pid){
            res=confirm("Are you sure want to remove the product?")
            if(res){
                window.location=`deleteproduct.php?pid=${pid}`;
            }
        }

        function editProduct(pid) {
        window.location = `editproduct.php?pid=${pid}`;
    }
        

    </script>
    </body>

</html>

<?php


include_once "../Shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where uploaded_by=$_SESSION[userid]");


while($row=mysqli_fetch_assoc($sql_result)){
  
    echo "<div class='card p-4 m-4'>
    <button onclick=confirmDelete($row[pid]) class='delete btn'>X</button>
    <h3 class='name font-weight-bold'>$row[name]</h3>
    <h5 class='price text-danger'>Rs.$row[price]</h5>
    <img class='pdtimg rounded p-1' src='$row[impath]'>
    <div class='detail'>$row[detail]</div>

    <div class='text-center'>
    <button onclick=editProduct($row[pid]) class='btn btn-primary m-2'>Edit Product</button>
    </div>

    
    </div>";

}



?>