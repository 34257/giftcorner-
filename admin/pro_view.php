<?php include "../include/dbconnect.php"; 
    if(!isset($_SESSION['admin'])){
        header("location: adminlogin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<?php include "../include/header.php";?>

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
                <div class="row">  
                    <?php
                        if(isset($_GET['find'])){
                                $search = $_GET['category'];
                                $calling_product = mysqli_query($connect,"select * from products where p_title LIKE '%$search%' or brand='$search'");
                            }                    
                            else{
                                $calling_product = mysqli_query($connect,"select * from products");
                            }

                            $count = mysqli_num_rows($calling_product);
                            if($count < 1){
                                echo "<h1 class='text-danger'>not found .....</h1>";
                            }

                            $id = $_GET['view'];
                            $pro_call = mysqli_query($connect, "select * from products where p_id='$id'");
                            $row = mysqli_fetch_array($pro_call);

                    ?>
                    
                        <div class="col-8 mb-4">
                            <div class="card shadow">
                                <div class="card-body">               
                                    <img src="<?= "product_image/".$row['image'];?>" class="w-100" height="300px" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row mt-3 text-center">
                                    <div class="col-lg-6">
                                        <a href="" class="text-uppercase btn btn-danger btn-lg lead mb-2 mt-2 "><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                </svg> <b>add to cart</b></a>
                                            
                                    </div>
                                    <div class="col-lg-6">
                                        
                                        <a href="" class="text-uppercase btn btn-warning btn-lg lead  mt-2"><b>buy now</b></a>
                                            
                                    </div>
                                    
                                </div>
                            </div>                                              
                        </div>
                    <div class="col-lg-4">
                        <h6 class=" font-weight-bolder"><?= $row['p_description'];?></h6>
                        <h4 class="text-danger"> Extra ₹ <?= $row['discount_price'];?> off</h4>
                        <h4>Rs. <?= $row['price'];?>/-</h4>
                        <h4> <?= $row['brand'];?></h4>
                        <h6 class="small font-weight-bolder text-truncate "><?= $row['p_title'];?></h6> 
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center"><b>Products Description</b></div>
                                    <div class="card-body">
                                    <img src="<?= "product_image/".$row['image'];?>" class="w-100" height="100px" alt="">                                  
                                    <h6 class=" font-weight-bolder"><?= $row['p_description'];?></h6>                                                
                                    </div>
                                </div>
                            </div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?php include "../include/footer.php";?>

</body>
</html>