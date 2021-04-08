<?php include "../include/dbconnect.php";  
    if(!isset($_SESSION['admin'])){
        header("location: adminlogin.php");
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>


<div class="container mt-5">

    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="categories.php" class="list-group-item list-group-item-action">Categories</a>
                <a href="products.php" class="list-group-item list-group-item-action">Products</a>
                <a href="adminlogin.php" class="list-group-item list-group-item-action">logout</a>
            </div>
        </div>
        <div class="col-lg-9">
           <h2 class="lead float-start">Manage Products</h2>
            <a href="add_product.php" class="btn btn-success float-end">Add new Product</a>
           <table class="table">
                <tr>
                    <th>id</th>
                    <th>TItle</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>discount Price</th>
                    <th class="text-center">Action</th>
                </tr>

                <?php 
                    $calling_product = mysqli_query($connect,"select * from products");
                    while($row = mysqli_fetch_array($calling_product)){
                ?>

                    <tr>
                        <td><?= $row['p_id'];?></td>
                        <td><?= $row['p_title'];?></td>
                        <td><?= $row['brand'];?></td>
                        <td><?= $row['price'];?></td>
                        <td><?= $row['p_category_id'];?></td>
                        <td>Rs. <?= $row['discounted_price'];?>/-</td>
                        <td class="text-center">
                            <a href="products.php?del=<?= $row['p_id'];?>" class="btn btn-danger">delete</a>
                            <a href="pro_edit.php?edit=<?= $row['p_id'];?>" class="btn btn-danger">edit</a>
                            <a href="pro_view.php?view=<?= $row['p_id'];?>" class="btn btn-danger">view</a>
                        </td>
                    </tr>
                        <?php }?>
                
           </table>
        </div>
    
    </div>

</div>
    
</body>
</html>
<?php 
    if(isset($_GET['del'])){
        $id =$_GET['del'];
        $query = mysqli_query($connect, "DELETE FROM  products where p_id='$id'");
        echo "<script>open('products.php','_self')</script>";
    }
?>