<?php include "include/dbconnect.php";?>
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


    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-group-item list-group-item-action active">Categories</div>
                <?php                     
                    $calling_cat = mysqli_query($connect,"select * from categories");            
                    while($row = mysqli_fetch_array($calling_cat)): 
                ?>
                <a href="index.php?cat=<?= $row['title'];?>" class="list-group-item list-group-item-action"><?= $row['title'];?>
                        <span class="float-end">(<?= count_data("select * from products where p_category_id='".$row['id']."'");?>)</span>
                </a>
                <?php endwhile;?>
            </div>
            <div class="col-lg-9">
                <div class="row">   
                <?php

                if(isset($_GET['find'])){
                        $search = $_GET['category'];
                        $calling_product = mysqli_query($connect,"select * from products where p_title LIKE '%$search%' or p_category_id='$search'");
                    }

                    elseif(isset($_GET['cat'])){
                        $cat_id = $_GET['cat'];
                        $calling_product = mysqli_query($connect,"select * from products JOIN categories ON products.p_category_id = categories.id WHERE categories.title='$cat_id'");
                    } 
                    else{
                        $calling_product = mysqli_query($connect,"select * from products JOIN categories ON products.p_category_id = categories.id");
                    }

                    $count = mysqli_num_rows($calling_product);
                    if($count < 1){
                        echo "<h1 class='text-danger'>not found .....</h1>";
                    }

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