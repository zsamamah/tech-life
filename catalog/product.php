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

if (isset($_GET['details'])) {
  $id = $_GET['details'];
  $result = $connection->prepare("SELECT * FROM products WHERE id=$id");
  $result->execute();
  $product = $result->fetch(PDO::FETCH_ASSOC);
  // print_r($product);
  $name = $product['name'];
  $price = $product['price'];
  $description = $product['description'];
  $image = $product['image'];
  $categoryID = $product['category_id'];
  $discount = $product['discount'];
  $stock = $product['stock'];
  $ageRating = $product['age_rating'];
  $onlineReviews = $product['online_reviews'];

  $resultCategory = $connection->prepare("SELECT * FROM categories WHERE id=$categoryID");
  $resultCategory->execute();
  $category = $resultCategory->fetch(PDO::FETCH_ASSOC);
  $categoryName = $category['name'];
  // print_r($_SESSION['Loggeduser']);
}
else{
  echo "<script>window.location.href='../catalog'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Tech-Life | Product</title>

  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Sunrise.Digital">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/carousel.css" rel="stylesheet">
  <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php
  include '../navbar.php';
  include_once("../cart/cart.php");
  ?>
  <hr class="offset-lg">

  <div class="product">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 col-md-7">
          <div class="carousel product" data-count="5" data-current="1">
            <!-- <button class="btn btn-control"></button> -->

            <div class="items">
              <div class="item active" style="text-align:center;" data-marker="1">
                <img style="height: 500px;  width: 60%;" src="<?php echo $image; ?>" alt="ChromeBook 11" />
              </div>
              <div class="item" data-marker="2">
                <!-- <img src="../assets/img/product/2.jpg" alt="ChromeBook 11"/> -->
              </div>
              <div class="item" data-marker="3">
                <!-- <img src="../assets/img/product/3.jpg" alt="ChromeBook 11"/> -->
              </div>
              <div class="item" data-marker="4">
                <!-- <img src="../assets/img/product/4.jpg" alt="ChromeBook 11"/> -->
              </div>
              <div class="item" data-marker="5">
                <!-- <img src="../assets/img/product/5.jpg" alt="ChromeBook 11"/> -->
              </div>
              <div class="item" data-marker="6">
                <div class="tiles">
                  <a href="#video" data-gallery="#video" data-source="youtube" data-id="hED0N4CFoqs" data-title="An upscale new Chromebook from HP" data-description="The new HP Chromebook 13 runs a Core M CPU inside a slim aluminum body.">
                    <!-- <img src="../assets/img/product/video.jpg" alt="ChromeBook 11"> -->

                    <div class="overlay"></div>
                    <div class="content">
                      <div class="content-outside">
                        <div class="content-inside">
                          <i class="ion-ios-play"></i>
                          <h1>Watch video review</h1>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <ul class="markers">
              <!-- <li data-marker="1" class="active"><img src="../assets/img/product/1.jpg" alt="Background"/></li> -->
              <!-- <li data-marker="2"><img src="../assets/img/product/2.jpg" alt="Background"/></li> -->
              <!-- <li data-marker="3"><img src="../assets/img/product/3.jpg" alt="Background"/></li> -->
              <!-- <li data-marker="4"><img src="../assets/img/product/4.jpg" alt="Background"/></li> -->
              <!-- <li data-marker="5"><img src="../assets/img/product/5.jpg" alt="Background"/></li> -->
              <!-- <li data-marker="6"><img src="../assets/img/product/video.jpg" alt="Background"/></li> -->
            </ul>
          </div>
        </div>
        <div class="col-sm-5 col-md-5">
          <!-- <img src="../assets/img/brands/hp.png" alt="HP" class="brand hidden-xs" /> -->

          <h1><?php echo $name; ?></h1>

          <p> &middot; Category: <?php echo $categoryName; ?></p>
          <p> &middot; Stock: <?php if(!$stock == 0) {
             echo $stock;
           } else {
             echo "<p>Out of Stock</p>";
           } ?></p>

          <p class="price"><?php
                            if ($discount != 1) {
                              echo $price - $price * $discount . " " . "JD";
                            } else echo $price . " " . "JD" ?></p>
          <p class="price through"><?php
                                    if ($discount != 1) {
                                      echo  $price . " " . "JD";
                                    } ?> </p>
          <!-- <p class="price through">$249.99</p> -->
          <br><br>

          <a style="color:white;text-decoration:none" href="./addToCart.php?id=<?php echo $id ?>&&typeCart=addToCart">
            <button class="btn btn-primary btn-rounded"> <i class="ion-bag"></i> Add to cart</button></a>
        </div>
      </div>
      <br><br><br>


      <div class="row">
        <div class="col-sm-7">
          <h1><?php echo $name; ?></h1>
          <br>

          <p>
            <?php echo $description; ?>
          </p>
          <br>

          <h2>Product specifications</h2>
          <br>

          <div class="row specification">
            <div class="col-sm-6"> <label>Category</label> </div>
            <div class="col-sm-6">
              <p><?php echo $categoryName ?></p>
            </div>
          </div>

          <div class="row specification">
            <div class="col-sm-6"> <label>Age Rating</label> </div>
            <div class="col-sm-6">
              <p><?php echo $ageRating ?></p>
            </div>
          </div>

          <div class="row specification">
            <div class="col-sm-6"> <label>Online Reviews</label> </div>
            <div class="col-sm-6">
              <p><?php echo $onlineReviews ?></p>
            </div>
          </div>


        </div>
        <div class="col-sm-5">
          <div class="comments">
            <h2 class="h3">Leave a Review</h2>
            <br>


            <div class="wrapper">
              <div class="content">
                <?php
                $Comments = $connection->prepare("SELECT * FROM comments WHERE product_id=$id");
                $Comments->execute();
                if ($Comments->rowCount()) {
                  foreach ($Comments as $comment) {
                    $userID = $comment['user_id'];
                    $User = $connection->prepare("SELECT * FROM users WHERE id=$userID");
                    $User->execute();
                    $selectedUser = $User->fetch(PDO::FETCH_ASSOC);
                    echo "<h3>" . $selectedUser["name"] . "</h3>";                
                    // echo "<label>2 years ago</label>";
                    echo "<p>" . $comment['comment'] . "</p>";
                  }
                } else {
                  echo "<p>No reviews yet</p>";
                }
                ?>


              </div>
            </div>
            <br>

            <button class="btn btn-default btn-sm" data-toggle="modal" data-target="#Modal-Comment"> <i class="ion-chatbox-working"></i> Add comment </button>
          </div>
          <br><br>

          <!-- <div class="talk">
              <h2 class="h3">Do you have any questions?</h2>
              <p>Online chat with our manager</p>

              <button class="btn btn-default btn-sm"> <i class="ion-android-contact"></i> Lat's talk </button>
            </div> -->
        </div>
      </div>
    </div>
  </div>
  <br><br>

  <section class="products">
    <div class="container">
      <h1 class="h3">Recommendation for you</h1>

      <div class="row">
        <?php $query = "SELECT * FROM products WHERE category_id=$categoryID AND id!=$id order by RAND() LIMIT 4";
        $stmt = $connection->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchALL(PDO::FETCH_ASSOC);
        foreach ($row as $val) {
        ?>

          <div class="col-sm-6 col-md-3 product">
            <!-- <a href="#favorites" class="favorites" data-favorite="inactive"><i class="ion-ios-heart-outline"></i></a> -->
            <a href="./"><img src="<?php echo $val["image"] ?>" alt="HP Chromebook 11" /></a>

            <div class="content">
              <h1 class="h4"><?php echo $val["name"] ?></h1>
              <p class="price"><?php
                                if ($val['discount'] != 1) {
                                  echo $val['price'] - $val['price'] * $val['discount'] . " " . "JD";
                                } else echo $val['price'] . " " . "JD" ?></p>
              <p class="price through"><?php
                                        if ($val['discount'] != 1) {
                                          echo  $val['price'] . " " . "JD";
                                        } ?> </p>

              <label><?php echo $categoryName ?></label>

              <a href="../catalog/product.php?details=<?php echo $val['id'] ?>" class="btn btn-link"> Details</a>
              <a style="color:white;text-decoration:none" href="./addToCart.php?id=<?php echo  $val['id'] ?>&&typeCart=addToCart">
            <button class="btn btn-primary btn-rounded"> <i class="ion-bag"></i> Add to cart</button></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <br><br>

  <?php include '../footer.php' ?>

  <div class="modal fade" id="Modal-Comment" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header align-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
            <h1 class="h4 modal-title">Add your comment</h1>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
            <form class="join" action="comment.php" method="post">
              <div class="row">
                  <div class="col-sm-12">
                    <textarea name="comment" placeholder="Type here" required="" class="form-control" rows="5"></textarea>
                    <br>
                </div>
                <?php if(isset($_SESSION["Loggeduser"])) { ?>
                <input type="hidden" name="user-id" value="<?php echo $_SESSION['LoggeduserId']; ?>"/>
                <?php } ?>
                <input type="hidden" name="product-id" value="<?php echo $id; ?>"/>
                <div class="col-sm-12">
                    <div class="align-center">
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm" name="send-comment"> <i class="ion-android-send"></i> Send</button>
                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"> <i class="ion-android-share"></i> No, thanks </button>
                        <br><br>
                    </div>
                </div>
              </div>
             </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/catalog.js"></script>
  <script src="../assets/js/carousel.js"></script>

</body>

</html>