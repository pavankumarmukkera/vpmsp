<?php  
	include('../includes/connection.php');
	$input = $_POST['input'];
	$query = "select * from vehicals where vehical_no like '%{$input}%'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run) > 0){
    	?><br><hr>
    	<table class="table">
    		<thead>
    			<tr>
    				<th>Vehical No</th>
    				<th>Owner Name</th>
    				<th>Owner Email</th>
    				<th>Vehical Type</th>
    				<th>Action</th>
    			</tr>
    		</thead>

    	<?php 
    	while($row = mysqli_fetch_assoc($query_run)){
    		$vehical_no = $row['vehical_no'];
    		$vehical_owner = $row['vehical_owner'];
    		$owner_email = $row['owner_email'];
    		$vehical_type = $row['vehical_type'];
    		?>
    			<tr>
    				<td><?php echo $vehical_no; ?></td>
    				<td><?php echo $vehical_owner; ?></td>
    				<td><?php echo $owner_email; ?></td>
    				<td><?php echo $vehical_type; ?></td>
                    <td><a href="view_history.php?vno=<?php echo $vehical_no;?>" class="btn btn-danger btn-sm" target="_blank">View History</a></td>
    			</tr>
    		<?php 
    	}
        ?>
            </table>
        <?php 
    }
    else{
    	echo "<h5 class='text-danger text-center mt-3'>No Data Found...</h5>";
    }
?>