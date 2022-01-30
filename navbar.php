<?php
session_start();
?>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../home"> <i class="ion-cube"></i> tech-life</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../home">Home</a></li>
                <li><a href="../catalog/">Catalog</a></li>
                <li><a href="../cart/">Cart</a></li>
                <li><a href="../contacts/">Contacts</a></li>
            </ul>
            <?php
            if (isset($_SESSION['Loggeduser'])) {
                echo "  <ul class='nav navbar-nav navbar-right'>
             <li><a href='../UserProfile'> <i class='ion-android-person'></i> Hello, " . $_SESSION['Loggeduser'] . "  </a></li>
             <li>  <form method='POST'><input type='submit' value='Logout' name='logout' style='color:#777 ;background-color: transparent;border: none;padding-top: 13px;' /> </form></li>
           </ul>";
            } else {
                echo " <ul class='nav navbar-nav navbar-right'>
             <li class='active'><a href='../login/'> <i class='ion-android-person' ></i> Login </a></li>
             <li><a href='../signup/'> Sign Up</a></li>
         </ul>";
            }
            if (isset($_POST['logout'])) {
                unset($_SESSION['Loggeduser']);
                unset($_SESSION['LoggeduserId']);
                unset($_SESSION['LoggeduserPhone']);
                unset($_SESSION['LoggeduserEmail']);
                unset($_SESSION['LoggeduserAdmin']);
                unset($_SESSION['total']);
                unset($_SESSION['cart']);
                unset($_SESSION['items']);
                unset($_SESSION['final_total']);
                unset($_SESSION['delivery']);
                echo "<script>window.location.href='../home/index.php'</script>";
            }

            ?>


        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
</nav>