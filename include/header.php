<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg">
    <div class="container">
        <a href="index.php" class="navbar-brand">Giftcorner</a>

        <form action="" method="get" class="d-flex mx-auto">
            <!-- <input type="text" class="form-control" name="search" size="50%" placeholder="search title or brand..."> -->
            <select name="category"  class="form-control">
                            <?php 
                            $calling_cat = mysqli_query($connect,"select * from categories");
                            while($row = mysqli_fetch_array($calling_cat)){
                            ?>
                            <option value="<?= $row['id'];?>"><?= $row['title'];?></option>
                            <?php } ?>
                    </select>
            <input type="submit" class="btn btn-danger" name="find">
        </form>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item"><a href="admin/adminlogin.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="" class="nav-link">About</a></li>
            <li class="nav-item"><a href="cart.php" class="nav-link">Cart <sup><span class="badge bg-danger">0</span></sup></a></li>
        </ul>
    </div>
</nav>