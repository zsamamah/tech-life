<?php
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

<?php 

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $id=0;
  $productName= "";
  $productDescription= "";
  $productImage= "";
  $productStock= "";
  $productPrice= "";
  $productDiscount= "";
  $productAgeRating="";

  if(isset($_GET["edit"])){
      $id = $_GET["edit"];
               
        $query ="SELECT * FROM products WHERE id=$id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $product = $stmt->fetch();
        $productName = $product["name"];
        $productDescription = $product["description"];
        $productImage = $product["image"];
        $productStock = $product["stock"];
        $productPrice = $product["price"];
        $productDiscount = $product["discount"];
        $productAgeRating = $product["age_rating"];
        
  }
  if(isset($_POST['update-product'])){
      $id=$_POST['product-id'];
      $productName = $_POST['p_name'];
        $productImage = $_POST["p_image"];
        $productStock = $_POST["p_stock"];
        $productPrice = $_POST["p_price"];
        $productDiscount = $_POST["p_discount"];
        $productAgeRating = $_POST["p_age-rating"];
        $productCategory = $_POST["p_category"];
      $updateProduct = "UPDATE products SET name='".$productName."', image='".$productImage."', stock='".$productStock."', price='".$productPrice."', discount='".$productDiscount."', age_rating='".$productAgeRating."', category_id='".$productCategory."' WHERE id=$id";
        $updatedProductConnect = $conn->prepare($updateProduct);
        $updatedProductConnect->execute();
        header('location:index3.php');
  }

        if(isset($_POST['delete'])){
            $id = $_POST['delete'];
                $sql = "DELETE FROM products WHERE id='$id'";
                $conn->query($sql); 
            header('location:index3.php');
        }
                                            
?>