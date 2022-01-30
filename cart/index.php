<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech-life";
try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>
  Tech-Life | Cart
  </title>

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Sunrise Digital" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png" />

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <link href="../assets/css/carousel.css" rel="stylesheet" />
  <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Catamaran:400,100,300" rel="stylesheet" type="text/css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php include '../navbar.php' ?>
  <hr class="offset-md" />

  <div class="box">
    <div class="container">
      <h1>Shopping Cart</h1>
      <hr class="offset-sm" />
    </div>
  </div>
  <hr class="offset-md" />

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="checkout-cart">
              <div class="content">
                <?php
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                  foreach ($_SESSION['cart'] as $product) { ?>
                    <div class="media">
                      <div class="media-left">
                        <img class="media-object" src=<?php echo $product['image']; ?> alt="HP Chromebook 11" />
                      </div>

                      <div class="media-body">
                        <h2 class="h4 media-heading"><?php echo $product['name']; ?></h2>
                        <p class="price"><?php
                                          if ($product['discount'] != 1) {
                                            echo $product['price'] - $product['price'] * $product['discount'] . " " . "JD X" . $product['quantity'];
                                          } else echo $product['price'] . " " . "JD X" . $product['quantity']; ?></p>
                      </div>
                      <div class="controls">
                        <div class="input-group">
                          <span class="input-group-btn"><a href="../catalog/addToCart.php?id=<?php echo $product['id']; ?>&& type=min">
                              <button class="btn btn-default btn-sm" type="button" data-action="minus">
                                <i class="ion-minus-round"></i>
                              </button></a>
                          </span>
                          <input type="text" class="form-control input-sm" placeholder="Qty" value=<?php echo $product['quantity']; ?> readonly="" />
                          <span class="input-group-btn"> <a href="../catalog/addToCart.php?id=<?php echo $product['id']; ?>&& type=add">
                              <button class="btn btn-default btn-sm" type="button" data-action="plus">
                                <i class="ion-plus-round"></i>
                              </button></a>
                          </span>
                        </div>
                        <a href="../catalog/addToCart.php?id=<?php echo $product['id']; ?>&& type=remove"> <i class="ion-trash-b"></i> Remove </a>
                      </div>
                    </div><?php }
                      } else echo "<p><b>Your Cart is Empty</b></p>";
                          ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-md-4">
        <hr class="offset-md visible-sm" />
        <div class="panel panel-default">
          <form method=post>
            <div class="panel-body">
              <h2 class="no-margin">Summary</h2>
              <hr class="offset-md" />

              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-6">
                    <p> <?php if (isset($_SESSION['items'])) {
                          echo $_SESSION['items'];
                        } else echo 0; ?> items</p>
                  </div>
                  <div class="col-xs-6">
                    <p><b><?php
                          if (isset($_SESSION['total'])) {
                            echo $_SESSION['total'] . " " . "JD";
                          } else echo "0 JD";
                          ?></b></p>
                  </div>
                </div>
              </div>
              <hr />

              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-6">
                    <h3 class="no-margin">Total sum</h3>
                  </div>
                  <div class="col-xs-6">
                    <h3 class="no-margin"><?php
                                          if (isset($_SESSION['total'])) {
                                            echo $_SESSION['total'] . " " . "JD";
                                          } else echo "0 JD";
                                          ?></h3>
                  </div>
                </div>
              </div>
              <hr class="offset-md" />
              <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $found = false;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                  foreach ($_SESSION['cart'] as $product) {
                    $sql = "SELECT * FROM products WHERE id= $product[id]";
                    $result = $connection->query($sql);
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    if ($product['quantity'] > $row['stock']) {
                      $found = true;
                      echo "<span>There is only </span>" . $row['stock'] . "<span> items of </span>" . $row['name'] . "<span> in stock</span> <br>";
                    }
                  }
                  if (!$found) {
                    if (isset($_SESSION["LoggeduserId"])) {
                      echo "<script>window.location.href='../checkout/index.php'</script>";
                    } else {
                      echo "<script>window.location.href='../login/index.php'</script>";
                    }
                  }
                } else echo "<p>Your Cart Is Empty !</p>";
              }
              ?>
              <button class="btn btn-primary btn-lg justify" style="height: 45px;" type="submit"><i class="ion-android-checkbox-outline"></i>&nbsp;&nbsp;
                Checkout order</a>
                <hr class="offset-md" />
              </button>
              <p>Payment method: Cash On Delivery</p>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <hr class="offset-lg" />
  <hr class="offset-lg" />

  <?php include '../footer.php' ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/checkout.js"></script>
  <script src="../assets/js/catalog.js"></script>

  <script type="text/javascript" src="../assets/js/jquery-ui-1.11.4.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.ui.touch-punch.js"></script>
</body>

</html>