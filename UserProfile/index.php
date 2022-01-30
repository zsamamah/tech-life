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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/ionicons-2.0.1/css/ionicons.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Catamaran:400,100,300' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            color: #1a202c;
            text-align: left;
            background-color: #f0f3f7;
        }

        a:hover,
        a:focus {

            text-decoration: none;
            background-color: #f6f6f6;
            padding: 0.5em;
        }

        .form-container {
            margin-top: 3em;
            margin-bottom: 10em;
        }

        .main-body {
            padding: 15px;
        }

        .nav-link {
            color: #4a5568;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

</head>

<body>
    <?php include '../navbar.php' ?>
    <?php
    if (!isset($_SESSION['Loggeduser'])) {
        echo "<script>window.location.href='../login'</script>";
    }
    ?>
    <div class="container form-container">

        <div class="row gutters-sm">
            <div class="col-md-3 d-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <nav class="nav flex-column nav-pills nav-gap-y-1">
                            <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active col-sm-12 mt-3" style="padding-top: 1.5em;line-height: 1;">
                                Profile Information
                            </a>
                            <a href="#orders" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded col-sm-12 my-3" style="padding-top: 1.5em;line-height: 1;">
                                Orders
                            </a>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="card" style="padding: 1em;">
                    <div class="card-header border-bottom mb-3 d-flex d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#account" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg></a>
                            </li>
                            <li class="nav-item">
                                <a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                        <line x1="1" y1="10" x2="23" y2="10"></line>
                                    </svg></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body tab-content">
                        <!-- profile_________________________________ -->
                        <div class="tab-pane active" id="profile">
                            <h6>YOUR PROFILE INFORMATION</h6>
                            <hr>
                            <!-- php code________________________________________________________________________________________-->
                            <!-- form______________________________________________________________________________________________-->
                            <form method="post" name="editForm" action="<?php $_SERVER["PHP_SELF"]; ?>">
                                <div class="form-group">
                                    <label for="fullName">Full Name</label>
                                    <input name="name" type="text" class="form-control" id="fullName" aria-describedby="fullNameHelp" placeholder="Enter your fullname" value='<?php echo $_SESSION["Loggeduser"] ?>'>
                                    <small id="fullNameHelp" class="form-text text-muted">Your name may appear around here where you are mentioned. You can change or remove it at any time.</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input readonly name="email" type="email" class="form-control" id="email" placeholder="Enter your website address" value='<?php echo $_SESSION["LoggeduserEmail"] ?>'>
                                </div>
                                <div class="form-group">
                                    <label for="phone">phone number</label>
                                    <input name="phone" type="text" class="form-control" id="phone" placeholder="Enter your phone number" value='<?php echo $_SESSION["LoggeduserPhone"] ?>'>
                                </div>
                                <br>
                                <div class="row p-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password">New password</label>
                                            <input type="password" class="form-control" id="password" placeholder="New password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="confirmpassword">Confirm password</label>
                                            <input type="password" name="confirmPassword" class="form-control" id="location" placeholder="confirm Password">
                                        </div>
                                    </div>

                                </div>
                                <!-- php code____________________________________________________________________________________________________________________________ -->
                                <?php
                                $loggedUser = $_SESSION["LoggeduserEmail"];
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $password = $_POST['password'];
                                    if ($_POST['password'] != $_POST['confirmPassword']) {
                                        echo "<p style='color:brown'> passwords do not match </p>";
                                    }
                                    if (strlen($password) < 5 && strlen($password) > 0) {
                                        echo "<p style='color:brown'> password needs to be 5 characters or more </p>";
                                    } else if (strlen($password) > 5) {
                                        $sql = $conn->prepare("UPDATE users SET name='$name', phone='$phone',password='$password' WHERE email='$loggedUser'");
                                        $sql->execute();
                                        $_SESSION["Loggeduser"] = $name;
                                        $_SESSION["LoggeduserPhone"] = $phone;
                                        echo "<script>window.location.href='../UserProfile'</script>";
                                    } else {
                                        $sql = $conn->prepare("UPDATE users SET name='$name', phone='$phone' WHERE email='$loggedUser'");
                                        $sql->execute();
                                        $_SESSION["Loggeduser"] = $name;
                                        $_SESSION["LoggeduserPhone"] = $phone;
                                        echo "<script>window.location.href='../UserProfile'</script>";
                                    }
                                }
                                ?>
                                <div class="form-group small text-muted">
                                    All of the fields on this page are optional and can be deleted at any time, and by filling them out, you're giving us consent to share this data wherever your user profile appears.
                                </div>

                                <button type="submit" class="btn btn-primary">Update Profile</button>
                            </form>
                        </div>
                        <!-- /profile_________________________________ -->

                        <!-- orders___________________ -->
                        <div class="tab-pane" id="orders">
                            <h6>Orders details</h6>
                            <hr>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Order#</th>
                                            <th>Date</th>
                                            <th>items</th>
                                            <th>Status</th>
                                            <th>total</th>
                                            <th>payment type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- php code___________________________________________________________ -->
                                        <?php
                                        $LoggedUserId = $_SESSION["LoggeduserId"];
                                        // $data = $conn->query("SELECT * FROM orders WHERE user_id=$LoggedUserId ");
                                        // $data->execute();
                                        $data = $conn->prepare("SELECT order_id,date,SUM(order_item.quantity) AS quantity,total,delivery
                                        FROM Orders 
                                        INNER JOIN order_item ON orders.id=order_item.order_id WHERE user_id=$LoggedUserId GROUP BY order_id"); //GROUP BY order_id
                                        $data->execute();
                                        $row = $data->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <?php
                                        foreach ($row as $item) {
                                        ?>
                                            <tr class="table-row">
                                                <td><?php echo $item["order_id"]; ?></td>
                                                <td><?php echo $item["date"]; ?></td>
                                                <td><?php echo $item["quantity"]; ?></td>
                                                <td><span class="tag tag-success">Delivered</span></td>
                                                <td><?php echo $item["total"] + $item['delivery'] . " JD"; ?></td>
                                                <td>cash on delivery</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /orders___________________ -->
                    </div>
                </div>
            </div>
        </div>

    </div>
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