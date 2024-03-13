<html>
    <body>
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    <b>Vehicle Type: </b>
                    <select name="vehical_type">
                        <option>-Select-</option>
                        <?php 
                            include('../includes/connection.php');
                            $query = "select * from vehical_type";
                            $query_run = mysqli_query($connection,$query);
                            while($row = mysqli_fetch_assoc($query_run)){
                                ?>
                                <option><?php echo $row['type']; ?></option>
                                <?php 
                            }
                        ?>
                    </select>
                    <b>Rate: </b>
                    <input type="number" name="rate" placeholder="Enter Rate" required>
                    <input type="submit" class="btn btn-sm btn-primary" name="add_rate" value="Add Rate">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <br><center><h4><u>Rate for vehicles type</u></h4><br></center>
            <table class="table">
                <thead>
                    <th>S.No</th>
                    <th>Vehical Type</th>
                    <th>Rate</th>
                    <th>Action</th>
                </thead>
                <?php 
                    session_start();
                    include('../includes/connection.php');
                    $query = "select * from rates";
                    $query_run = mysqli_query($connection,$query);
                    $sno = 1;
                    while($row = mysqli_fetch_assoc($query_run)){
                        ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $row['vehical_type']; ?></td>
                            <td><?php echo $row['rate']; ?></td>
                            <td><a class="btn btn-sm btn-success" href="edit_rate.php?rid=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-sm btn-danger" href="delete_rate.php?rid=<?php echo $row['id']; ?>">Delete</a></td>
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