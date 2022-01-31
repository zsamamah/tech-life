<?php

require '../database.php';
echo "connected<br>";
if(isset($_POST['delete'])){
    $sql = "DELETE FROM contacts WHERE id=".$_POST['delete'];
    $conn->query($sql);
    header("Location: index4.php");
}
?>