<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title> Unistore &middot; Responsive E-Commerce Template</title>

  <meta name="description" content="Bootstrap template for you store - E-Commerce Bootstrap Template">
  <meta name="keywords" content="unistore, e-commerce bootstrap template, premium e-commerce bootstrap template, premium bootstrap template, bootstrap template, e-commerce, bootstrap template, sunrise digital">
  <meta name="author" content="Sunrise Digital">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/carousel.css" rel="stylesheet">
  <link href="../assets/css/carousel-recommendation.css" rel="stylesheet">
  <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php include '../navbar.php' ?>

  <header>
    <div class="carousel" data-count="3" data-current="2">
      <!-- <button class="btn btn-control"></button> -->

      <div class="items">
        <div class="item" data-marker="1">
          <img src="../assets/img/carousel/bckg.jpg" alt="Background" class="background" />

          <div class="content">
            <div class="outside-content">
              <div class="inside-content">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-12 align-center">
                      <h1>New amazing Games</h1>
                      <p>add to your wishlist now</p>
                      <a href="../catalog/">More Games ></a>
                      <br><br>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 align-center">
                      <img src="../assets/img/carousel/a (2).png" alt="Laptops" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item active" data-marker="2">
          <img src="../assets/img/carousel/bckg.jpg" alt="Background" class="background" />

          <div class="content">
            <div class="outside-content">
              <div class="inside-content">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 align-center">
                      <img src="../assets/img/carousel/a.png" alt="Surface Pro" />
                    </div>
                    <div style="margin-bottom:2em;" class="col-sm-12 align-center">
                      <h1>New games for 2022</h1>
                      <p>Find newest games and best deals</p>
                      <a href="../catalog/">View catalog ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item" data-marker="3">
          <img src="../assets/img/carousel/bckg.jpg" alt="Background" class="background" />

          <div class="content">
            <div class="outside-content">
              <div class="inside-content">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 align-center">
                      <img src="../assets/img/carousel/c-removebg-preview.png" alt="game2" class="hidden-xs hidden-sm" />
                      <img src="../assets/img/carousel/c-removebg-preview.png" alt="game2" class="hidden-md hidden-lg" />
                    </div>
                    <div class="col-sm-4 align-left">
                      <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                      <br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
                      <h1>New Games</h1>
                      <br>

                      <p>
                        Gamers have known for a long time something that everyone else is starting to figure out: there’s community connection on the other side of a screen.
                      </p>
                      <a href="https://www.bbc.com/worklife/article/20201215-how-online-gaming-has-become-a-social-lifeline">View article ></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <ul class="markers">
        <li data-marker="1"><img src="../assets/img/carousel/a (2).png" alt="Background" /></li>
        <li data-marker="2" class="active"><img src="../assets/img/carousel/a.png" alt="Background" /></li>
        <li data-marker="3"><img src="../assets/img/carousel/c-removebg-preview.png" alt="Background" /></li>
      </ul>
    </div>
  </header>
  <br><br>

  <hr class="offset-lg">
  <hr class="offset-lg">
  <div class="container">
    <h2>NEW PRODUCTS</h2>
    <hr class="offset-md">
    <div class='
        row products'>
      <?php
      $db_user = "root";
      $db_pass = "";
      $db_name = "tech-life";
      $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset-utf8', $db_user, $db_pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT *
      FROM products
      ORDER BY id DESC
      LIMIT 3";

      $stmt = $db->prepare($query);
      $stmt->execute();
      $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
      foreach ($row
        as $element) { ?>
        <div class=' col-sm-6 col-md-4 product'>

          <img src=<?php echo $element['image'] ?> alt='product Image' /></a>
          <div class='content'>
            <h1 class='h4'><?php echo $element['name'] ?></h1>
            <p class="price"><?php
                              if ($element['discount'] != 1) {
                                echo $element['price'] - $element['price'] * $element['discount'] . " " . "JD";
                              } else echo $element['price'] . " " . "JD" ?></p>
            <p class="price through"><?php
                                      if ($element['discount'] != 1) {
                                        echo  $element['price'] . " " . "JD";
                                      } ?> </p>
            <br>
            <a href="../catalog/product.php?details=<?php echo $element['id'] ?>" class="btn btn-link">Details</a>
            <br>
            <button class='
            btn btn-primary btn-rounded btn-sm'> <i class='
            ion-bag'></i><a style='color:white;text-decoration:none' href='../catalog/addToCart.php?id=<?php echo $element['id'] ?>&&typeHome=addToCart'> Add to cart</a></button>
          </div>
        </div>

      <?php   } ?>
    </div>
  </div>

  <div class="container">
    <h2>BEST DEALS FOR YOU</h2>
    <hr class="offset-md">
    <div class='row products'>
      <?php
      $query = "SELECT * FROM products where discount!=1 order by RAND() LIMIT 3  ";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
      foreach ($row
        as $element) { ?>


        <div class='col-sm-6 col-md-4 product'>

          <img src=<?php echo $element['image'] ?> alt='product Image' />
          <div class='content'>
            <h1 class='h4'><?php echo $element['name'] ?></h1>
            <p class="price"><?php
                              if ($element['discount'] != 1) {
                                echo $element['price'] - $element['price'] * $element['discount'] . " " . "JD";
                              } else echo $element['price'] . " " . "JD" ?></p>
            <p class="price through"><?php
                                      if ($element['discount'] != 1) {
                                        echo  $element['price'] . " " . "JD";
                                      } ?> </p>
            <br>
            <a href="../catalog/product.php?details=<?php echo $element['id'] ?>" class="btn btn-link">Details</a>
            <br>
            <button class=' btn btn-primary btn-rounded btn-sm'> <i class='
            ion-bag'></i><a style='color:white;text-decoration:none' href='../catalog/addToCart.php?id=<?php echo $element['id'] ?>&&typeHome=addToCart'> Add to cart</a></button>
          </div>
        </div>


      <?php
      }
      ?>
    </div>
  </div>

  <hr class="offset-lg">
  <hr class="offset-lg">
  <?php include '../footer.php' ?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/carousel.js"></script>
</body>

</html>