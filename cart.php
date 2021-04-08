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
<div class="container-fluid mt-5">
        <div class="row">           
            <div class="col-lg-8">
               <div class="card">
                <div class="card-header">mycart</div>
                </div>
            </div>
            <div class="col-lg-4">
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
        </div>
    </div>

<?php include "include/footer.php";?>
    
</body>
</html>