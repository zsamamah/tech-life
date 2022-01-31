<?php
require '../database.php';
$sql = "UPDATE orders SET status='Delivered' WHERE id={$_GET['id']}";
$conn->query($sql);
header("Location: ./view-order.php?id={$_GET['id']}");

?>