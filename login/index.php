<?php
session_start();
if(isset($_SESSION['Loggeduser']))
header("Location: ../home");
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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Tech-Life | Login</title>

  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="Sunrise.Digital">
  <link rel="shortcut icon" type="image/x-icon" href="../favicon.png">

  <!-- Bootstrap -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
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
  <hr class="offset-lg hidden-xs">
  <hr class="offset-md">

  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 md-padding">
        <h1 class="align-center">Sign In</h1>
        <br>

        <!-- form_________________________ -->

        <form class="signin" action="index.php" method="post">
          <input type="email" name="email" value="" placeholder="E-mail" required class="form-control" />
          <br>
          <input type="password" name="password" value="" placeholder="Password" required class="form-control" />
          <br>
          <?php
          if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //check the data from database
            $stmt = $conn->prepare("SELECT * FROM users WHERE email='$email' AND password='$password' ");
            $stmt->execute();

            $admin = $conn->prepare("SELECT * FROM users WHERE email='$email' AND password='$password' AND is_admin=1 ");
            $admin->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin->rowCount() != null) {
              $_SESSION["Loggeduser"] = $row['name'];
              $_SESSION["LoggeduserId"] = $row['id'];
              $_SESSION["LoggeduserEmail"] = $row['email'];
              $_SESSION["LoggeduserPhone"] = $row['phone'];
              $_SESSION["LoggeduserAdmin"] = $row['is_admin'];
              echo "<script>window.location.href='../admin/index.php'</script>";
              // header("location: ../admin/index2.html");
            } else if ($stmt->rowCount() != null) {
              $_SESSION["Loggeduser"] = $row["name"];
              $_SESSION["LoggeduserEmail"] = $row["email"];
              $_SESSION["LoggeduserPhone"] = $row["phone"];
              $_SESSION["LoggeduserId"] = $row['id'];
              $_SESSION["LoggeduserAdmin"] = $row['is_admin'];
              if(isset($_SESSION['cart']) && !empty($_SESSION['cart']))
              echo "<script>window.location.href='../cart'</script>";
              else
              echo "<script>window.location.href='../home'</script>";
            } else {
              echo "<p style='color:brown'> invalid login please try again!</p> <br>";
            }
          }
          ?>

          <button type="submit" class="btn btn-primary" name="login">Sign In</button>
          <br><br>

          <hr class="offset-xs">

          <hr class="offset-sm">

          <p>
            Don't have an account? Create one now! <a href="../signup/"> Registration > </a>
          </p>

        </form>
        <!-- form_______________________________________ -->
      </div>
    </div>
  </div>
  <br><br>
  <br class="hidden-xs">
  <br class="hidden-xs">

  <?php include '../footer.php' ?>

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