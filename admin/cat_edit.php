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
                        <div class="card-header mx-auto">Edit here categories</div>
                        <?php 
                            $edit_id = $_GET['edit'];
                            $query = mysqli_query($connect,"select  * from categories where id='$edit_id'");
                            $val = mysqli_fetch_array($query);
                        ?>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" name="title"  class="form-control" value="<?php echo $val['title'];?>">
                                </div>
                                <div class="mb-3">
                                    <label>description</label>
                                    <textarea type="text" name="description" rows="7" class="form-control" value="<?php echo $val['description'];?>"></textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="cat_update"  class="btn btn-success w-100">
                                </div>
                            </form>
                            
                            <?php
                                if(isset($_POST['cat_update'])){
                                    $title = $_POST['title'];
                                    $description = $_POST['description'];

                                    $query = mysqli_query($connect,"update  categories SET
                                    title='$title',description='$description' WHERE id='$edit_id'");
                                    
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