<?php include "../include/dbconnect.php"; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">    
    <title>Admin | login</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
     
  </head>
  <body>
  <div class="container mt-5">
      <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">Please sign in</div>
                <div class="card-body">
                    <form action="adminlogin.php" method="post">
                        <div class="mb-3">
                        <labe>Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email address" required >
                        </div>
                        <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="mb-3">
                        <input type="submit" class="btn btn-primary w-100" name="adminlogin">
                        </div>                    
                        <p class="mt-5 mb-3 text-center  text-muted">&copy; 2020-2021</p>
                    </form>    
                </div>
            </div>
          </div>
      </div>
  </div>
  </body>
</html>
<?php 

      if(isset($_POST['adminlogin'])){
          $email = $_POST['email'];
          $password = $_POST['password'];

          $query = mysqli_query($connect,"select * from admin where email='$email' AND password= '$password'");
          $count = mysqli_num_rows($query);
          if($count > 0){
            $_SESSION['admin'] = $email;
            echo "<script>open('index.php','_self')</script>";             

          }
          else{
              echo "<script>alert('email and pasword is incorrect')</script>";
          }
      }

?>