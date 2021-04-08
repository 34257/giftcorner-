<?php include "include/dbconnect.php"; 
    
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
<?php include "include/header.php";?>
<div class="">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg">
            <div class="container-fluid">
                <!-- <a href="index.php" class="navbar-brand "><img src="admin/product_image/a09e8833-c011-4e9b-8ab5-efdb333ae7aa.png" height="60px" alt=""></a> -->
                        <?php                     
                            $calling_cat = mysqli_query($connect,"select * from categories");            
                            while($row = mysqli_fetch_array($calling_cat)): ?>
                        <a href="index.php?cat=<?= $row['title'];?>" class="navbar-brand small"><img  class="rounded-circle" src="<?= "admin/product_image/".$row['cat_icon'];?>" width="60px" height="60px" alt=""><div class="text-center small"><?= $row['title'];?></div></a>

                        <?php endwhile;?>        
            </div>
        </nav>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
                
            <div class="col-lg-12">
                <div class="row">  
                    <?php
                        if(isset($_GET['find'])){
                                $search = $_GET['search'];
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
                    
                        <div class="col-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">               
                                    <img src="<?= "admin/product_image/".$row['image'];?>" class="w-100" height="300px" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="row mt-3 text-center">
                                    <div class="col">
                                        <a href="cart.php?cart&p_id=<?= $row['id'];?>" class="nav-link text-uppercase btn btn-danger btn-lg lead mb-2 mt-2 "> <b>add to cart</b></a>
                                            
                                    </div>
                                    <div class="col">
                                        
                                        <a href="" class=" nav-link text-uppercase btn btn-warning btn-lg lead  mt-2"><b>buy now</b></a>
                                            
                                    </div>
                                    
                                </div>
                            </div>                                              
                        </div>
                    <div class="col-lg-8">
                        <h6 class=" font-weight-bolder"><?= $row['p_title'];?></h6>
                        <h4 class="text-danger"> Extra ₹ <?= $row['discounted_price'];?> off</h4>
                        <h4>Rs. <?= $row['price'];?>/-</h4>
                        <h4> <?= $row['brand'];?></h4>
                        <h6 class="small font-weight-bolder text-truncate "><?= $row['p_title'];?></h6> 
                                <div class="card">
                                    <div class="card-header text-center"><b>Products Description</b></div>
                                    <div class="card-body">
                                    <img src="<?= "admin/product_image/".$row['image'];?>" class="w-80" height="150px" alt="">                                  
                                    <h6 class=" font-weight-bolder"><?= $row['p_description'];?></h6>                                                
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
            <div class="row">
                <?php
                        $id = $_GET['view'];
                        $calling_product = mysqli_query($connect,"select * from products JOIN categories ON products.p_category_id = categories.id where p_id !='$id' ");
                        $count = mysqli_num_rows($calling_product);                    

                    while($row = mysqli_fetch_array($calling_product)){
                ?>
                <div class="col-3 mb-4">
                    <a href="view.php?view=<?= $row['p_id'];?>" class="nav-link p-0 m-0">
                        <div class="card">
                            <img src="<?= "admin/product_image/".$row['image'];?>" class="w-100" height="200px" alt="">
                            <div class="card-body">
                                <h4>Rs. <?= $row['price'];?>/-</h4>
                                <h4> <?= $row['brand'];?></h4>
                                <h6 class="small font-weight-bolder text-truncate "><?= $row['p_title'];?></h6>
                            </div>
                        </div>
                     </a>
                </div>
                <?php } ?>
            </div>
       </div>
    </div>
            </div>
    

<?php include "include/footer.php";?>

</body>
</html>