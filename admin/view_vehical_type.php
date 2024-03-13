<html>
    <body>
    	<div class="row">
    		<div class="col-md-6">
    			<form action="" method="POST">
    				<b>Vehical Type: </b>
    				<input type="text" name="vehical_type" placeholder="Enter Vehical Type" required>
    				<input type="submit" class="btn btn-sm btn-primary" name="add_vehical_type" value="Add Vehical Type">
    			</form>
    		</div>
    	</div>
        <div class="row">
            <div class="col-md-6">
            <br><center><h4><u>Types of Vehicals</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Vehical Type</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from vehical_type";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><a class="btn btn-sm btn-success" href="edit_vehical_type.php?tid=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_vehical_type.php?tid=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                        <?php
                        $sno++;
                    }
                ?>
            </table> 
            </div>
        </div>  
    </body>
</html>