<?php 
  include_once('../header.php');
  if(isset($_SESSION['email'])){
?>
<?php  
	include('../includes/connection.php');
    if(isset($_POST['update'])){
      $query = "update admins set name = '$_POST[name]',email = '$_POST[email]',mobile = $_POST[mobile] where email = '$_SESSION[email]'";
      $query_run = mysqli_query($connection,$query);
      if($query_run){
        echo "<script type='text/javascript'>
          alert('Profile updated successfully....');
          window.location.href = 'admin_dashboard.php';  
        </script>";
      }
      else{
        echo "<script type='text/javascript'>
          alert('Error...Plz try again.');
          window.location.href = 'admin_dashboard.php';
        </script>";
      }
    }

    if(isset($_POST['change_password'])){
      $query1 = "select password from admins where email = '$_SESSION[email]'";
      $query_run1 = mysqli_query($connection,$query1);
      $current_password = "";
      while($row = mysqli_fetch_assoc($query_run1)){
        $current_password = $row['password'];  
      }
      if(($current_password == $_POST['currPassword']) && ($_POST['newPassword1'] == $_POST['newPassword2'])){
        $query = "update admins set password = '$_POST[newPassword1]' where email = '$_SESSION[email]'";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
            alert('Password changed successfully....');
            window.location.href = 'admin_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
            alert('Error, Plz try again');
            window.location.href = 'admin_dashboard.php';
          </script>";
        }
      }
      else{
          echo "<script type='text/javascript'>
            alert('Password dont match...or wrong current password!!');
            window.location.href = 'admin_dashboard.php';
          </script>";
        }
    }

    // Add Vehical Type
    if(isset($_POST['add_vehical_type'])){
        include('../includes/connection.php');
        $query = "insert into vehical_type values(null,'$_POST[vehical_type]')";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Vehical Type Added successfully....');
            window.location.href = 'admin_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'admin_dashboard.php';
          </script>";
        }
    }

    // Add Rate
    if(isset($_POST['add_rate'])){
        include('../includes/connection.php');
        $query = "insert into rates values(null,'$_POST[vehical_type]',$_POST[rate])";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Rate Added successfully....');
            window.location.href = 'admin_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'admin_dashboard.php';
          </script>";
        }
    }

    // Add Parking Slot
    if(isset($_POST['add_slot'])){
        include('../includes/connection.php');
        $query = "insert into parking_slots values(null,'$_POST[slot_name]',$_POST[capacity])";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Parking Slot Added successfully....');
            window.location.href = 'admin_dashboard.php';  
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error...Plz try again.');
              window.location.href = 'admin_dashboard.php';
          </script>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<!-- jQuery file -->
    <script src="../includes/jquery.js"></script>
    <!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
    <!-- External CSS file -->
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
    	#container{
    		background-color: #B99B6B;
    		height: 75vh;
    		padding-top: 2%;
    		margin-top: 1%;
    		padding-left: 25%;
    	}
    </style>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#update_profile").click(function(){
    			$("#container").load('updateProfile.php');
    		});
    	});

    	$(document).ready(function(){
    		$("#change_password").click(function(){
    			$("#container").load('changePassword.php');
    		});
    	});

      $(document).ready(function(){
        $("#manage_type").click(function(){
          $("#container").load('view_vehical_type.php');
        });
      });

      $(document).ready(function(){
        $("#manage_user").click(function(){
          $("#container").load('view_users.php');
        });
      });

      $(document).ready(function(){
        $("#view_slots").click(function(){
          $("#container").load('view_parking_slots.php');
        });
      });

      $(document).ready(function(){
        $("#search_vehical").click(function(){
          $("#container").load('search_vehical.php');
        });
      });

      $(document).ready(function(){
        $("#manage_rate").click(function(){
          $("#container").load('view_rates.php');
        });
      });

      $(document).ready(function(){
        $("#check_history").click(function(){
          $("#container").load('check_history.php');
        });
      });

      $(document).ready(function(){
        $("#check_report").click(function(){
          $("#container").load('report.php');
        });
      });

    </script>
</head>
<body style="background-color:whitesmoke;">
<div class="row">
	<div class="col-md-12 m-auto" style="padding-left: 3%;">
    <a href="admin_dashboard.php" class="btn btn-secondary">Dashboard</a>
		<button class="btn btn-success subButton" id="update_profile">Update Profile</button>
		<button class="btn btn-dark" id="change_password">Change Password</button>
		<button class="btn btn-primary" id="search_vehical">Park & UnPark</button>
    <a class="btn btn-danger" href="print_slip.php" target="_blank">Print Slip</a>
		<button class="btn btn-success" id="manage_type">Manage vehical type</button>
		<button class="btn btn-info" id="view_slots">Manage Parking Slot</button>
		<button class="btn btn-danger" id="manage_user">Manage user</button>
    <button class="btn btn-dark" id="manage_rate">Manage Rates</button>
    <button class="btn btn-warning" id="check_history">Check History</button>
    <button class="btn btn-secondary" id="check_report">Report</button>
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="container">
    <h4><u>Admin Dashboard for Vechile Parking Management System</u></h4><br>
    <div class="row">
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;margin-right: 45px;margin-bottom: 35px;">
        <h5>Total registered users: </h5>
        <?php 
          $query = "select * from users";
          $query_run = mysqli_query($connection,$query);
          $total_users = mysqli_num_rows($query_run);
          echo $total_users; 
        ?>
      </div>
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;margin-bottom: 35px;">
        <h5>Total registered Vehicals: </h5>
        <?php 
          $query = "select * from vehicals";
          $query_run = mysqli_query($connection,$query);
          $total_vehicals = mysqli_num_rows($query_run);
          echo $total_vehicals; 
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;margin-right: 45px;margin-bottom: 35px;">
        <h5>Total Vehicals Parked: </h5>
        <?php 
          $query = "select * from parking_history";
          $query_run = mysqli_query($connection,$query);
          $total_vehicals_parked = mysqli_num_rows($query_run);
          echo $total_vehicals_parked;
        ?>
      </div>
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;margin-bottom: 35px;">
        <h5>Parking Capacity: </h5>
        <?php
          $capacity = 0; 
          $query = "select capacity from parking_slots";
          $query_run = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($query_run)){
            $capacity = $capacity + $row['capacity'];
          }
          echo $capacity;
        ?>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;margin-right: 45px;">
        <h5>Available Capacity: </h5>
        <?php 
          $query = "select * from vehicals where status = 1";
          $query_run = mysqli_query($connection,$query);
          $vehical_parked = mysqli_num_rows($query_run);
          echo $capacity - $vehical_parked;
        ?>
      </div>
      <div class="col-md-3" style="background-color:whitesmoke;border-radius: 15px;text-align: center;padding: 10px;">
        <h5>Total Vehical Types: </h5>
        <?php
          $query = "select * from vehical_type";
          $query_run = mysqli_query($connection,$query);
          $total_vehical_type = mysqli_num_rows($query_run);
          echo $total_vehical_type;
        ?>
      </div>
    </div>
	</div>
</div>
<marquee><h5 style="margin-top:10px;">Please contact on 7013042231 helpline number in case of any problem related to parking management system.</h5></marquee>
</body>
</html>
<?php  
}
else{
  header('location:index.php');
}
?>