<?php
require '../database.php';
                if(isset($_GET['d_id'])){
                  if($_GET['d_id']!='1'){
                    $sql = "DELETE FROM users WHERE id='{$_GET['d_id']}'";
                    $conn->exec($sql);
                  }
                }
            header("Location: ./index.php");
?>