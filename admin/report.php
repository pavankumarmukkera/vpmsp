<!DOCTYPE html>
<html>
<body>
	<div class="row">
		<div class="col-md-3">
			<center><h4><u>Select a range</u></h4></center>
			<form action="view_report.php" method="POST">
				<div class="form-group">
					<label><b>Start Date:</b></label>
					<input class="form-control" type="date" name="start_date" placeholder="Start date"><br>
				</div>
				<div class="form-group">
					<label><b>End Date:</b></label>
					<input class="form-control" type="date" name="end_date" placeholder="End date"><br>
				</div>
				<input type="submit" class="btn btn-danger" name="view_report" value="View Report">
			</form>
		</div>
	</div>
</body>
</html>