<?php
require '../database.php';
if(isset($_GET['id'])){
$sql = "DELETE FROM order_item WHERE order_id='{$_GET['id']}'";
$conn->query($sql);
$sql = "DELETE FROM orders WHERE id='{$_GET['id']}'";
$conn->query($sql);
}
header("Location: ./index5.php");
?>