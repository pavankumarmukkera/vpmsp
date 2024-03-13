<?php 
	include_once('../header.php');
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
    <style type="text/css">
    	#view_History{
    		background-color: whitesmoke;
    		padding:3%;
    		text-align: center;
    		box-shadow: 2px 2px 2px gray;
    		border-top: 2px solid gray;
    		border-left: 2px solid gray;
    	}
    </style>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<center><u><h4>Vehical Parking Report</h4></u></center><br>
			<div class="col-md-4 m-auto" id="view_History"> 
				<?php 
				    include('../includes/connection.php');
				    $query = "select * from parking_history where in_date >= '$_POST[start_date]' and out_date <= '$_POST[end_date]'";
				    $query_run = mysqli_query($connection,$query);
				    $sno = 1;
				    while($row = mysqli_fetch_assoc($query_run)){
				?>
				<h5><u>S.No: <?php echo $sno; $sno = $sno + 1;?></u></h5>
				<h5>Vehical No - <?php echo $row['vehical_no']; ?> <br></h5>
					<h6>In-Date : <?php echo $row['in_date']; ?></h6>
					<h6>Out-Date : <?php echo $row['out_date']; ?></h6>
					<hr>
				<?php
					}
				?><br>
				<a href="admin_dashboard.php" class="btn btn-danger">Go to Dashboard</a>
			</div>
		</div>
	</div>
</body>
</html>