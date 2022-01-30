<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title> Contact Us &middot; Unistore &middot; Responsive E-Commerce Template</title>

  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Sunrise.Digital">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/carousel.css" rel="stylesheet">
  <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php include '../navbar.php' ?>
    <hr class="offset-md">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div id="Address">
              <address>
                <label class="h3">Unistore, Inc.</label><br>
                1305 Market Street, Suite 800<br>
                San Francisco, CA 94102<br>
                <abbr title="Phone">P:</abbr> (123) 456-7890
              </address>

              <address>
                <strong>Support</strong><br>
                <a href="mailto:#">sup@example.com</a>
                <br><br>

                <strong>Partners</strong><br>
                <a href="mailto:#">col@example.com</a>
              </address>
            </div>
          </div>
          <div class="col-sm-8">
            <div id="GoMap"></div>
          </div>
        </div>
        <br>
    </div>

    <div class="gray">
      <div class="container align-center">
        <h1> Need our help? </h1>
        <p> Please select a question above first so we can connect you <br class="visible-md visible-lg"> to the right agent. </p>

        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <form class="contact" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
              <textarea class="form-control" name="message" placeholder="Message" required rows="5"></textarea>
              <br>

              <input type="email" name="email" value="" placeholder="E-mail" required class="form-control" />
              <br>

              <button type="submit" class="btn btn-primary justify"> Send question <i class="ion-android-send"></i> </button>
            </form>
            <?php
            require '../database.php';
            if(isset($_POST['message']) && isset($_POST['email'])){
              $sql = "INSERT INTO contacts(message,email) VALUES('{$_POST['message']}','{$_POST['email']}')";
              $conn->query($sql);
              echo "Your Message Submitted !<br>We Will Contact You Soon!";
            }

            ?>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>

  <hr class="offset-lg">

  <?php include '../footer.php' ?>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/carousel.js"></script>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAP-21Ac6nMc6WTzBS4aai8Ao7w1gcfM2A&callback=initMap"></script>


  <script>
    function initMap() {
      var mapDiv = document.getElementById('GoMap');
      var markerLatLng = {
        lat: 31.963158,
        lng: 35.930359
      };

      var map = new google.maps.Map(mapDiv, {
        center: {
          lat: 31.963158,
          lng: 35.930359
        },
        zoom: 8
      });

      var marker = new google.maps.Marker({
        position: markerLatLng,
        map: map,
        title: 'Unistore'
      });


      // google.maps.event.addListener(map, "rightclick", function(event) {
      //     var lat = event.latLng.lat();
      //     var lng = event.latLng.lng();
      //     // populate yor box/field with lat, lng
      //     console.log("Lat=" + lat + "; Lng=" + lng);
      // });

    }
  </script>

</body>

</html>