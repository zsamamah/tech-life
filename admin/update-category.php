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

  $update = false;
  $id=0;
  $categoryName= "";
  $exist = false;

  if(isset($_GET["edit"])){
      $id = $_GET["edit"];
               
        $query ="SELECT * FROM categories WHERE id=$id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $category = $stmt->fetch();
        $categoryName = $category["name"];
        $update = true;
        
  }
  if(isset($_POST['update-category'])){
      global $connection;
      $id=$_POST['category-id'];
      $categoryName = $_POST['c_name'];
      $updateCategory = "UPDATE categories SET name='".$categoryName."' WHERE id=$id";
    $updatedCategoryConnect = $conn->prepare($updateCategory);
    $updatedCategoryConnect->execute();
    header('location:index2.php');
  }

        if(isset($_POST['delete'])){
            $id = $_POST['delete'];
            if($id == 1){
                echo '<script>alert("default cant be deleted")</script>';
            } else {
                $updateProduct = "UPDATE products SET category_id=1 WHERE category_id=$id";
                $updatedProductConnect = $conn->prepare($updateProduct);
                $updatedProductConnect->execute();
                $sql = "DELETE FROM categories WHERE id='$id'";
                $conn->query($sql); 
            }
            header('location:index2.php');
        }
                                            
?>