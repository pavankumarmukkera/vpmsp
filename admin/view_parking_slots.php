<html>
    <body>
    	<div class="row">
    		<div class="col-md-8">
    			<form action="" method="POST">
    				<b>Slot Name: </b>
    				<input type="text" name="slot_name" placeholder="Enter Slot Name" required>
                    <b>Capacity: </b>
                    <input type="number" name="capacity" placeholder="Enter capacity" required>
    				<input type="submit" class="btn btn-sm btn-primary" name="add_slot" value="Add Slot">
    			</form>
    		</div>
    	</div>
        <div class="row">
            <div class="col-md-6">
            <br><center><h4><u>List Of Parking Slots</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Slot Name</th>
                    <th>Capacity</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from parking_slots";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td><a class="btn btn-sm btn-success" href="edit_slot.php?sid=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_slot.php?sid=<?php echo $row['id']; ?>">Delete</a></td>
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