<?php
session_start();
if(!$_SESSION['Loggeduser'] || $_SESSION["LoggeduserAdmin"]==='0')
  header("Location: ../home");
try {
  $sereverName = "localhost";
  $dbName = "tech-life";
  $dbusername = "root";
  $dbpassword = "";
  $conn = new PDO("mysql:host=$sereverName;dbname=$dbName", $dbusername, $dbpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "connection successfully!<br>";
} catch (PDOException $e) {
  echo "<br>" . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products CRUD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index4.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index5.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders CRUD</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Horizontal Form start -->
        <!-- <div class="col-md-6"> -->
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Product Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <textarea name="description" class="form-control" rows="3" id="inputPassword3" placeholder="description"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="category">
                    <!-- </select> -->
                    <?php
                    $sql = "SELECT id,name FROM categories";
                    $result = $conn->query($sql);
                    $result = $result->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result as $v){
                      echo "<option value='{$v['id']}'>";
                      echo $v['name'];
                      echo "</option>";
                    }
                    ?>
                    </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="text" name="image" class="form-control" id="inputPassword3" placeholder="image">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                      <input type="number" name="stock" min="0" class="form-control" id="inputPassword3" placeholder="stock">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="number" name="price" min="0" class="form-control" id="inputPassword3" placeholder="price">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Discount</label>
                    <div class="col-sm-10">
                      <input type="text" name="discount" class="form-control" id="inputPassword3" placeholder="discount">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Age Rating</label>
                    <div class="col-sm-10">
                      <input type="text" name="age-rating" class="form-control" id="inputPassword3" placeholder="age-rating">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Online Reviews</label>
                    <div class="col-sm-10">
                      <input type="text" name="online-reviews" class="form-control" id="inputPassword3" placeholder="online-reviews">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add Product</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>

            <?php

            if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['stock']) && isset($_POST['price']) && isset($_POST['discount']) && isset($_POST['age-rating']) && isset($_POST['online-reviews'])){
              $sql = "INSERT INTO products(name,description,image,category_id,price,stock,discount,online_reviews,age_rating) VALUES('{$_POST['name']}','{$_POST['description']}','{$_POST['image']}','{$_POST['category']}','{$_POST['price']}','{$_POST['stock']}','{$_POST['discount']}','{$_POST['online-reviews']}','{$_POST['age-rating']}')";
              $conn->query($sql);
            }

            ?>

        <!-- </div> -->
        <!-- Horizontal Form end -->

        <div class="col-md-6">
         


      </div></div>
      <!-- /.container-fluid -->

      <!-- products table start -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Stock</th>
                      <th>Description</th>
                      <th>Age Rating</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT products.id,products.name,categories.name as cat,price,discount,stock,description,age_rating FROM products INNER JOIN categories ON products.category_id=categories.id";
                    $result = $conn->query($sql);
                    $result = $result->fetchAll(PDO::FETCH_ASSOC);
                    // echo "<pre>";
                    // print_r($result);
                    // echo "</pre>";
                    foreach($result as $val){ ?>
                      <tr>
                      <td><?php echo $val['id']; ?></td>
                      <td><?php echo $val['name'];?></td>
                      <td><?php echo $val['cat'];?></td>
                      <td><?php echo $val['price']; ?></td>
                      <td><?php echo $val['discount']; ?></td>
                      <td><?php echo $val['stock']; ?></td>
                      <td><?php echo $val['description']; ?></td>
                      <td><?php echo $val['age_rating']; ?></td>
                      <td><a href="edit-product.php?edit=<?php echo $val['id'];?>&&category=<?php echo $val['cat'] ?>">Edit</a></td>
                      <td><form method="post" action="update-product.php"><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $val['id'] ?>">Delete</button></form></td>
                      </tr>

                      <?php }; ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        <!-- products table end -->


    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
</body>
</html>
