<div class="cart" data-toggle="inactive">
      <div class="label"><a style="text-decoration:none" href="../cart/index.php"><i class="ion-bag"></i> <?php
      if(isset($_SESSION['items']))
       echo $_SESSION['items']; 
       else
       echo "";
       ?></a></div>
      </div>