<?php
session_start();
include "update-category.php";
// if($_SESSION['logged_in']['is_admin']==='0')
//   header("Location: ../welcome.php");
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
  <title>Categories CRUD</title>

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

    <!-- Right navbar links -->
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
                <a href="./index2.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories CRUD</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products CRUD</p>
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
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid row">
        <!-- Horizontal Form start -->
        <div class="col-md-6">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="category-name" class="form-control" id="inputEmail3" placeholder="Category Name">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add Category</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>

            <?php

            if(isset($_POST['category-name'])){
              $sql = "INSERT INTO categories (name) VALUES('{$_POST['category-name']}')";
              $conn->query($sql);
            }

            ?>

          <!-- /.col-md-6 -->


        </div>
        <!-- Horizontal Form end -->

        <!-- edit product start -->
        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div class="card-body">
                <input type="hidden" name="category-id" value="<?php echo $id ?>">
                  <div class="form-group row">
                    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" name="c_name" class="form-control" id="exampleInputPassword1" value="<?php echo $categoryName ?>" placeholder="New Name">
          </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update-category" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

            <?php

            if(isset($_POST['c_id'])&&preg_match("/^[0-9]*$/",$_POST['c_id'])){
              if(isset($_POST['c_name'])&&strlen($_POST['c_name'])>4){
                $sql = "UPDATE categories SET name='{$_POST['c_name']}' WHERE id={$_POST['c_id']}";
                $conn->query($sql);
              }
            }


            ?>
        
            <!-- edit product end -->


      </div></div>
      <!-- /.container-fluid -->

      <!-- products table start -->
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    $result = $result->fetchAll(PDO::FETCH_ASSOC);
                    // echo "<pre>";
                    // print_r($result);
                    // echo "</pre>";
                    foreach($result as $val){ ?>
                      <tr>
                      <td><?php echo $val['id']; ?></td>
                      <td><?php echo $val['name']; ?></td>
                      <td><a href="index2.php?edit=<?php echo $val['id']?>">Edit</a></td>
                      <td><form method="post" action="update-category.php"><button class="btn btn-danger" type="submit" name="delete" value="<?php echo $val['id'] ?>">Delete</button></form></td>
                      </tr>
                   <?php }
                    ?>
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
