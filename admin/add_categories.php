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
                <a href="adminlogout.php" class="list-group-item list-group-item-action">logout</a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row">

                <div class="col-8">
                    <div class="card shadow-sm">
                        <div class="card-header mx-auto">add categories</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="p_title"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Icon</label>
                                    <input type="file" name="cat_icon"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>description</label>
                                    <textarea type="text" name="description" rows="7" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="add_cat" value="add_cat"  class="btn btn-success w-100">
                                </div>
                            </form>
                            
                            <?php
                                if(isset($_POST['add_cat'])){
                                    $title = $_POST['title'];
                                    $cat_icon  = $_FILES['cat_icon']['name'];
                                    $tmp_image = $_FILES['cat_icon']['tmp_name'];
                                
                                    move_uploaded_file($tmp_image,"../product_image/$cat_icon");

                                    $description = $_POST['description'];

                                    $query = mysqli_query($connect,"insert into categories(title,cat_icon,description) value ('$title','$cat_icon','$description')");
                                    
                                    if($query){
                                        echo "<script>window.open('categories.php','_self')</script>";
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div>   
            </div>
        </div>
    
    </div>

</div>
    
</body>
</html>