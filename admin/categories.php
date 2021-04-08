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
                <div class="col-12">
                        <a href="add_categories.php" class="btn btn-success float-end">Add new categories</a>
                            <table class="table">
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                <?php 
                                    $calling_cat = mysqli_query($connect,"select * from categories");
                                    print_r($calling_cat);
                                    while ($row = mysqli_fetch_array($calling_cat)){ 
                                ?>
                                <tr>
                                    <td><?= $row['id'];?></td>
                                    <td><?= $row['title'];?></td>
                                    <td><?= substr($row['description'],0,20);?>...</td>
                                    <td class="text-center">
                                        <a href="categories.php?del=<?= $row['id'];?>" class="btn btn-danger">delete</a>
                                        <a href="cat_edit.php?edit=<?= $row['id'];?>" class="btn btn-danger">edit</a>
                                    </td>
                                </tr>
                                <?php } ?>

                            </table>
                </div>
            
            </div>
        </div>
    
    </div>

</div>
    
</body>
</html>
<?php 
    if(isset($_GET['del'])){
        $id =$_GET['del'];
        $query = mysqli_query($connect, "DELETE FROM  categories where id='$id'");
        echo "<script>open('categories.php','_self')</script>";
    }
?>