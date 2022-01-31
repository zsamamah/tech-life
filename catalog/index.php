<?php
session_start();
// unset($_SESSION['cart']);
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
  Tech-Life | Catalog
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
  <link href="https://fonts.googleapis.com/css?family=Catamaran:400,100,300" rel="stylesheet" type="text/css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php
  // include_once("../cart/cart.php");
  ?>
  <?php
  include '../navbar.php';
  include '../cart/cart.php';
  ?>
  <hr class="offset-lg" />


  <div class="container">
    <div class="row">
      <!-- Filter -->
      <div class="col-sm-3 filter">
        <div class="item">
          <div class="title">
            <a href="#clear" data-action="open" class="down">
              <i class="ion-android-arrow-dropdown"></i> Open</a>
            <h1 class="h4">Type</h1>
          </div>

          <div class="controls">
            <?php
            $category = $connection->prepare("SELECT * FROM categories");
            $category->execute();
            echo "<a style={} href='index.php'>All Product </a>";
            foreach ($category as $cat) {
              if ($cat['name'] !== "default") {
                echo "<div class='checkbox-group' data-status='inactive'>";
                echo "<div class='label' data-value='Laptops'><a href='index.php?id=$cat[id]'>
                $cat[name] </a> </div>";
                echo " </div>";
              }
            }
            ?>
          </div>
        </div>

        <br />

      </div>
      <!-- /// -->

      <!-- Products -->
      <div class="col-sm-9 products">

        <div class="col-sm-12">
          <div class="row">
            <form method="GET" action="<?php $_SERVER['PHP_SELF'] ?>" style="display:flex;justify-content:center;">
              <input style="width: 50%;margin-right:1rem;" type="text" name="search" value="" placeholder="Search" class="form-control" id="search" />
              <button type="submit" class="btn btn-primary">Search</button>
          </div>
          </form>
          <?php
          if (isset($_GET['id'])) {
            $result = $connection->prepare("SELECT * FROM products WHERE category_id=$_GET[id]");
          } elseif (isset($_GET['search'])) {
            $result = $connection->prepare("SELECT * FROM products WHERE name LIKE '%$_GET[search]%'");
          } else {
            $result = $connection->prepare("SELECT * FROM products");
          }
          $result->execute();
          $row = $result->fetchAll(PDO::FETCH_ASSOC);
          if (count($row) > 0) {
            foreach ($row as $product) {
              $sql = "SELECT * FROM categories WHERE id=$product[category_id]";
              $result = $connection->query($sql);
              $row = $result->fetch(PDO::FETCH_ASSOC);
              if ($product['stock'] > 0) {
          ?>
                <div class="col-sm-6 col-md-4 product">
                  <img style="width:100%;" src=<?php echo $product['image'] ?> alt=<?php echo $product['name'] ?> />
                  <div class="content" style="width:100%;">
                    <h1 class="h4"><?php echo $product['name'] ?></h1>
                    <p class="price"><?php
                                      if ($product['discount'] != 1) {
                                        echo $product['price'] - $product['price'] * $product['discount'] . " " . "JD";
                                      } else echo $product['price'] . " " . "JD" ?></p>
                    <p class="price through"><?php
                                              if ($product['discount'] != 1) {
                                                echo  $product['price'] . " " . "JD";
                                              } ?> </p>
                    <label><?php echo strtoupper($row['name']) ?></label>

                    <a href="../catalog/product.php?details=<?php echo $product['id'] ?>" class="btn btn-link">
                      Details</a>
                      <a style="color:white;text-decoration:none" href="./addToCart.php?id=<?php echo $product['id'] ?>&&typeCart=addToCart"><button class="btn btn-primary btn-rounded btn-sm">
                      <i class="ion-bag"></i> Add to cart
                    </button></a>
                  </div>
                </div> <?php }
                    }
                  } else {
                    echo "<p style='text-align:center;margin:10% 0% 10% 0;font-size:5rem;'>No Results Found</p>";
                  } ?>

        </div>

      </div>
      <!-- /// -->
    </div>
  </div>
  <br /><br />

  <?php include '../footer.php' ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/catalog.js"></script>

  <script type="text/javascript" src="../assets/js/jquery-ui-1.11.4.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.ui.touch-punch.js"></script>
</body>

</html>