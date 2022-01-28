<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tech-life";
	try{
        $connection=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOExecption $e){
        echo $sql . "<br>" . $e->getMessage();
    }
    //Connection // 
    $found=false;
    if ($_GET['id']){
        if(isset($_SESSION['cart'])){
             for($index=0;$index<count($_SESSION['cart']);$index++){
                
            if ($_SESSION['cart'][$index]['id']==$_GET['id'] &&( $_GET['type']=="add" || $_GET['typeCart']=="addToCart"||$_GET['typeHome'])){ 
                $_SESSION['cart'][$index]['quantity']+=1;
                $found=true;
                break;
             }
             else if($_SESSION['cart'][$index]['id']==$_GET['id'] && $_SESSION['cart'][$index]['quantity']>=2 && $_GET['type']=="min"){
                $_SESSION['cart'][$index]['quantity']-=1;
                $found=true;
                break;
            }
            else if($_SESSION['cart'][$index]['id']==$_GET['id'] && $_SESSION['cart'][$index]['quantity']=1 && $_GET['type']=="min" || $_GET['type']=="remove"){
                array_splice($_SESSION['cart'], $index,1);
                $found=true;
                break;
            }
        }
        }
        if(!$found){
            $sql="SELECT * FROM products WHERE id=$_GET[id]";
        $result=$connection->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC) ;
             $_SESSION['cart'][]=["id"=>$_GET['id'],"name"=>$row['name'],"image"=>$row['image'],"price"=>$row['price'],"quantity"=>1];

        }

       echo "<pre>";
       var_dump($_SESSION['cart']);
     if($_GET['type']){
        header("Location:../cart/index.php");
     }elseif($_GET['typeHome']){
         header("Location:../home/index.php");
     }
     else {
          header("Location:./index.php");
     }

    }
      
    
?>