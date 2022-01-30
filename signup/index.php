<?php
// database Connection 
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=tech-life", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>
    Sign Up &middot; Unistore &middot; Responsive E-Commerce Template
  </title>

  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="Sunrise.Digital" />
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png" />

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet" />
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <link href="../assets/css/carousel.css" rel="stylesheet" />
  <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Catamaran:400,100,300" rel="stylesheet" type="text/css" />

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <?php include '../navbar.php' ?>
  <hr class="offset-lg hidden-xs" />
  <hr class="offset-md" />

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
        <h1 class="align-center">New Customer</h1>
        <br />
        <!-- form_____________________________ -->

        <form class="join" action="<?php $_SERVER["PHP_SELF"] ?>" method="POST" id="RegisterForm">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <input type="text" name="name" value="" placeholder="Full Name" required class="form-control" id="name" /><br />
              </div>
              <div class="col-sm-12">
                <input type="text" name="phone" value="" placeholder="Phone" class="form-control" id="phone" /><br />
              </div>
              <div class="col-sm-12">
                <input type="email" name="email" value="" placeholder="E-mail" class="form-control" id="email" /><br />
              </div>
              <div class="col-sm-12">
                <input type="password" name="password" value="" placeholder="Password" required class="form-control" id="password" /><br />
              </div>
              <div class="col-sm-12">
                <input type="password" name="password-confirm" value="" placeholder="Confirm Password" required class="form-control" id="confirmPassword" /><br />
              </div>
            </div>
          </div>
          <?php
          // add new user
          if (isset($_POST['signup'])) {
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['password-confirm'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email'");
            $stmt->execute();
            if ($stmt->rowCount() == null) {
              if ($password  == $confirmPassword  && strlen($password) > 5  && strlen($name) > 8) {
                //storing new user in database
                $sql = "INSERT INTO users(name,phone,email,password)
                 VALUES ('$name','$phone','$email','$password')";
                $conn->exec($sql);
                echo "<script>window.location.href='../login'</script>";
              }
            } else {
              echo "<p  style='color:brown'>account already exists please login</p>";
            }
          }
          ?>
          <p id="ErrMsg" style="color:brown"></p>
          <button type="submit" class="btn btn-primary" name="signup">Sign up</button>

          <br /><br />
          <p>
            By creating an account you will be able to shop faster, be up to
            date on an order's status, and keep track of the orders you have
            previously made.
          </p>
        </form>
        <!-- /form____________________________ -->

        <br class="hidden-sm hidden-md hidden-lg" />
      </div>
    </div>
  </div>
  <br /><br />
  <hr class="hidden-xs" />
  <br class="hidden-xs" />
  <br class="hidden-xs" />

  <?php include '../footer.php' ?>

  <!-- Validation____________________________________________________ -->
  <script>
    document.getElementById('RegisterForm').addEventListener('submit', (event) => {
      // event.preventDefault();
      let name = document.getElementById("name")
      let passsword = document.getElementById("password");
      let confirmPassword = document.getElementById("confirmPassword");
      let Error = document.getElementById("ErrMsg");

      if (name.value.length < 8) {
        event.preventDefault();
        Error.innerHTML = "Full name must be 8 characters or more";
      }
      if (passsword.value.length < 5) {
        event.preventDefault();
        Error.innerHTML += "<br> Passwords must be 5 characters or more";
      }
      if (passsword.value != confirmPassword.value) {
        event.preventDefault();
        Error.innerHTML += "<br> passwords do not match!";
      }

    });
  </script>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="../assets/js/jquery-latest.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/core.js"></script>
  <script src="../assets/js/catalog.js"></script>

  <script type="text/javascript" src="../assets/js/jquery-ui-1.11.4.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.ui.touch-punch.js"></script>
</body>

</html>