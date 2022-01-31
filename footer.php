 <footer>
     <div class="about">
         <div class="container">
             <div class="row">
                 <hr class="offset-md">

                 <div class="col-xs-6 col-sm-3">
                     <div class="item">
                         <i class="ion-ios-telephone-outline"></i>
                         <h1>24/7 free <br> <span>support</span></h1>
                     </div>
                 </div>
                 <div class="col-xs-6 col-sm-3">
                     <div class="item">
                         <i class="ion-ios-star-outline"></i>
                         <h1>Low price <br> <span>guarantee</span></h1>
                     </div>
                 </div>
                 <div class="col-xs-6 col-sm-3">
                     <div class="item">
                         <i class="ion-ios-gear-outline"></i>
                         <h1> Manufacturer’s <br> <span>warranty</span></h1>
                     </div>
                 </div>
                 <div class="col-xs-6 col-sm-3">
                     <div class="item">
                         <i class="ion-ios-loop"></i>
                         <h1> Full refund <br> <span>guarantee</span> </h1>
                     </div>
                 </div>

                 <hr class="offset-md">
             </div>
         </div>
     </div>

     <div class="subscribe">
         <div class="container align-center">
             <hr class="offset-md">

             <h1 class="h3 upp">Join our newsletter</h1>
             <p>Get more information and receive special discounts for our products.</p>
             <hr class="offset-sm">

             <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                 <div class="input-group">
                     <input type="email" name="new_email" value="" placeholder="E-mail" required class="form-control">
                     <span class="input-group-btn">
                         <button type="submit" class="btn btn-primary"> Subscribe <i class="ion-android-send"></i> </button>
                     </span>
                 </div><!-- /input-group -->
             </form>
             <?php
             require '../database.php';
             if(isset($_POST['new_email'])){
                 $sql = "SELECT * FROM newsletter where email='{$_POST['new_email']}'";
                 $stmt = $conn->query($sql);
                 $row = $stmt->fetch(PDO::FETCH_ASSOC);
                 if ($stmt->rowCount() == null) {
                    $sql = "INSERT INTO newsletter(email) VALUES('{$_POST['new_email']}')";
                    $conn->query($sql);
                    echo "Email Added Successfully !";
                 }
                 else{
                     echo "Found!!";
                 }
             }

             ?>
             <hr class="offset-lg">
             <hr class="offset-md">

             <div class="social">
                 <a href="#"><i class="ion-social-facebook"></i></a>
                 <a href="#"><i class="ion-social-twitter"></i></a>
                 <a href="#"><i class="ion-social-googleplus-outline"></i></a>
                 <a href="#"><i class="ion-social-instagram-outline"></i></a>
                 <a href="#"><i class="ion-social-linkedin-outline"></i></a>
                 <a href="#"><i class="ion-social-youtube-outline"></i></a>
             </div>


             <hr class="offset-md">
             <hr class="offset-md">
         </div>
     </div>


     <div class="container m-auto">
         <hr class="offset-md">

         <div class="row menu">
             <div class="col-sm-3 col-md-3">
                 <h1 class="h4">Links <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                 <div class="list-group">
                     <a href="../home/" class="list-group-item">Home</a>
                     <a href="../catalog/" class="list-group-item">Catalog</a>
                     <a href="../cart/" class="list-group-item">Cart</a>
                 </div>
             </div>
             <div class="col-sm-3 col-md-3">
                 <h1 class="h4">Products <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                 <div class="list-group">
                     <a href="../catalog/" class="list-group-item">sports</a>
                     <a href="../catalog/" class="list-group-item">racing</a>
                     <a href="../catalog/" class="list-group-item">adventure</a>
                 </div>
             </div>
             <div class="col-sm-3 col-md-3">
                 <h1 class="h4">Support <i class="ion-plus-round hidden-sm hidden-md hidden-lg"></i> </h1>

                 <div class="list-group">
                     <a href="../contacts/" class="list-group-item">Contact</a>
                     <a href="../contacts" class="list-group-item">FAQ</a>
                 </div>
             </div>
             <div class="col-sm-3 col-md-3">
                 <h1 class="h4">tech-life</h1>

                 <address>
                     Amman,Jordan<br>
                     <abbr title="Phone">P:</abbr> (+962) 784545526
                 </address>

                 <address>
                     <strong>Support</strong><br>
                     <a href="mailto:#">info@techlife.com</a>
                 </address>

             </div>
         </div>
     </div>

     <hr>

     <div class="container">
         <div class="row">
             <div class="col-sm-8 col-md-9 payments">
                 <p>New feature in progress: pay your order in the most convenient way</p>

                 <div class="payment-icons">
                     <img src="../assets/img/payments/paypal.svg" alt="paypal">
                     <img src="../assets/img/payments/visa.svg" alt="visa">
                     <img src="../assets/img/payments/master-card.svg" alt="mc">
                     <img src="../assets/img/payments/discover.svg" alt="discover">
                     <img src="../assets/img/payments/american-express.svg" alt="ae">
                 </div>
                 <br>

             </div>
             <div class="col-sm-4 col-md-3 align-right align-center-xs">
                 <hr class="offset-sm hidden-sm">
                 <hr class="offset-sm">
                 <p>tech-life © 2022 </p>
                 <hr class="offset-lg visible-xs">
             </div>
         </div>
     </div>
 </footer>

 <!-- Modal -->
 <div class="modal fade" id="Modal-ForgotPassword" tabindex="-1" role="dialog">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-sm-6">
                             <h4 class="modal-title">Forgot Your Password?</h4>
                             <br>

                             <form class="join" action="index.php" method="post">
                                 <input type="email" name="email" value="" placeholder="E-mail" required="" class="form-control" />
                                 <br>

                                 <button type="submit" class="btn btn-primary btn-sm">Continue</button>
                                 <a href="#Sign-In" data-action="Sign-In">Back ></a>
                             </form>
                         </div>
                         <div class="col-sm-6">
                             <br><br>
                             <p>
                                 Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.
                             </p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
             </div>
         </div>
     </div>
 </div>

 <div class="modal fade" id="Modal-Gallery" tabindex="-1" role="dialog">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-android-close"></i></span></button>
                 <h4 class="modal-title">Title</h4>
             </div>
             <div class="modal-body">
             </div>
             <div class="modal-footer">
             </div>
         </div>
     </div>
 </div>