<?php
    session_start();
    // Admin login
    if(isset($_POST['admin_login'])){
        include('../includes/connection.php');
        $query = "select email,password,name from admins where email = '$_POST[email]' AND password = '$_POST[password]'";
        $query_run = mysqli_query($connection,$query);
        if(mysqli_num_rows($query_run)){
            $_SESSION['email'] = $_POST['email'];
            while($row = mysqli_fetch_assoc($query_run)){
                $_SESSION['name'] = $row['name'];
            }
            echo "<script type='text/javascript'>
              window.location.href = 'admin_dashboard.php';
            </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Please enter correct email and password.');
              window.location.href = 'index.php';
          </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>VPMS Project</title>
    <!-- jQuery file -->
    <script src="includes/jquery.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
        #header{
            background-color: #400E32;
            color: #F2CD5C;
            text-align: center;
            padding: 1% 1%;
            margin-bottom: 4%;
        }
        #admin_login_box{
            background-color: whitesmoke;
            padding: 3%;
        }
    </style>
</head>
<body style="background-image: url('images/.jpg');">
<!-- Header -->
<div class="row">
    <div class="col-md-12" id="header">
        <h3 class="text-warning center">Vechile Parking Management System</h3>
    </div>
</div>
<!-- Header code ends -->
<!-- Registration form -->
<div class="row">
    <div class="col-md-4 m-auto" id="admin_login_box">
        <center><h4><u>Admin Login Form</u></h4></center><br>
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Your Password" required>
            </div><br>
            <div class="d-grid gap-2">
                <button class="btn btn-warning" type="submit" name="admin_login">Login as admin</button>    
            </div> 
            <br>
        </form>
    </div>
</div>
<!-- Registation form end -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Login Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Your Password" required>
            </div><br>
            <button class="btn btn-danger" type="submit" name="login">Login</button><br>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Registration Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="Enter your Name" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Your Email" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Choose Password" required>
            </div><br>
            <div class="form-group">
                <input class="form-control" type="text" name="mobile" placeholder="Enter Mobile No." required>
            </div><br>
            <button class="btn btn-danger" type="submit" name="register">Register</button><br>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>