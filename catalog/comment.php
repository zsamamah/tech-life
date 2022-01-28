<?php 
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech-life";
	try{
        $connection=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e){
        echo $sql . "<br>" . $e->getMessage();
    }

    if(isset($_POST['send-comment'])){
        $productId = $_POST['product-id'];
        if(isset($_SESSION["Loggeduser"])){
            $userId = $_POST['user-id'];
            $commentDesc = $_POST ['comment'];
            $newComment ="INSERT INTO comments (user_id,comment,product_id)";
            $newComment .="VALUES ('$userId','$commentDesc','$productId')";
            $connection->exec($newComment);
        } 
        header("Location:product.php?details=$productId");  
    }
?>