<?php
session_start();
if(!$_SESSION['Loggeduser'])
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
  <title>Order Details</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

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
                <a href="./index3.php" class="nav-link">
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
                <a href="./index5.php" class="nav-link active">
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

  <?php
      $sql = "SELECT name,email,phone FROM users INNER JOIN orders ON orders.user_id = users.id WHERE orders.id={$_GET['id']}";
      $userData = $conn->query($sql);
      $userData = $userData->fetch(PDO::FETCH_ASSOC);
      $sql = "SELECT id,status,total,delivery,address,remark,date FROM orders WHERE id={$_GET['id']}";
      $orderData = $conn->query($sql);
      $orderData = $orderData->fetch(PDO::FETCH_ASSOC);
      $sql = "SELECT products.name,products.price,products.discount,quantity FROM order_item INNER JOIN products ON products.id=order_item.product_id WHERE order_item.order_id={$_GET['id']}";
      $productsData = $conn->query($sql);
      $productsData = $productsData->fetchAll(PDO::FETCH_ASSOC);
    //   echo "<pre>";
    //   print_r($userData);
    //   echo "</pre>";
    //   echo "<pre>";
    //   print_r($orderData);
    //   echo "</pre>";
    //   echo "<pre>";
    //   print_r($productsData);
    //   echo "</pre>";
      ?>

  <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Tech - Life
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Tech - Life Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: +(962) 777-684-935<br>
                    Email: info@tech-life.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $userData['name'] ?></strong><br>
                    <?php echo $orderData['address'] ?><br>
                    Phone: <?php echo $userData['phone'] ?><br>
                    Email: <?php echo $userData['email'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <b>Order ID:</b> <?php echo $orderData['id'] ?><br>
                  <b>Payment Due:</b> <?php echo $orderData['date'] ?><br>
                  <b>Delivery Status:</b>
                   <?php echo $orderData['status'] ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Total Price</th>
                      <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach($productsData as $val){
                            echo"<tr>";
                            echo "<td>".$val['quantity']."</td>";
                            echo "<td>".$val['name']."</td>";
                            if($val['discount']!=='1')
                            echo "<td>".$val['price']-$val['price']*$val['discount']."JD X ".$val['quantity']."</td>";
                            else
                            echo "<td>".$val['price']."JD X ".$val['quantity']."</td>";
                            if($val['discount']!=='1')
                            echo "<td>".($val['price']-$val['price']*$val['discount'])*$val['quantity']." JD</td>";
                            else
                            echo "<td>".$val['price']*$val['quantity']." JD</td>";
                            echo"</tr>";
                        }


                        ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Remark:</p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    <?php
                    echo $orderData['remark'];
                    ?>
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Payment Details:</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><?php echo $orderData['total']-2.5 ?> JD</td>
                      </tr>
                      <tr>
                        <th>Delivery:</th>
                        <td>2.5 JD</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td><?php echo $orderData['total'] ?> JD</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="javascript:window.print()" rel="noopener" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <?php
                  if($orderData['status']==='Pending'){
                      echo"<a href='deliver-order.php?id={$orderData['id']}'>
                      <button type='button' class='btn btn-success float-right'><i class='far fa-credit-card'></i> Delivered Order
                      </button>
                        </a>";
                  }
                  ?>
                </div>
              </div>
            </div>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
