<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap files -->
    <link rel="stylesheet" href="../bootstrap-5/css/bootstrap.min.css">
    <script src="../bootstrap-5/js/bootstrap.min.js"></script>
	<title>Print Slip</title>
</head>
<body style="background-color: #B99B6B;">
	<br><br>
	<center><h4><u><b>Vechile Parking Management System</b></u></h4><br></center>
	<div class="row">
		<div class="col-md-3 m-auto" style="background-color:whitesmoke;border-radius: 15px;text-align: left;padding: 25px;">	
			<?php 
				$amount = 0.0;
				$fee = 15;
				include('../includes/connection.php');
				$query = "select * from parking_history where id = 5";
			    $query_run = mysqli_query($connection,$query);
			    while($row = mysqli_fetch_assoc($query_run)){
			    	echo "<b>Vehicle No: " . $row['vehical_no'] . "</b><br>";
			    	echo "<b>In-Date: </b> " . $row['in_date'] . "<br>";
			    	echo "<b>Out-Date: </b>" . $row['out_date'] . "<br>";
			    	$timestamp1 = strtotime($row['in_date']);
			    	$timestamp2 = strtotime($row['out_date']);
			    	$total_hours = round(abs($timestamp2 - $timestamp1)/(60*60),2);
			    	echo "<b>Total Hours:</b> " . $total_hours . " hrs <br>";
			    	$amount = $total_hours * $fee;
			    	echo "<b>Total amount:</b> Rs. " . $amount . " /-";
			    }
			?>
		</div>
	</div>
</body>
</html>