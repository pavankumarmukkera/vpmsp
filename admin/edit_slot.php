<?php 
    include_once('../header.php');
    include('../includes/connection.php');
    if(isset($_POST['update_parking_slot'])){
        $query = "update parking_slots set name = '$_POST[slot_name]',capacity = '$_POST[slot_capacity]' where id = $_GET[sid]";
        $query_result = mysqli_query($connection,$query);
        if($query_result){
            echo "<script type='text/javascript'>
                  alert('Parking slot updated successfully...');
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

    $query = "select * from parking_slots where id = $_GET[sid]";
    $query_run = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($query_run)){

?>
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
    </head>
    <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 m-auto" style="background-color:whitesmoke;padding: 3%;">
            <center><h4>Edit Parking Slot</h4></center>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="name">Slot Name:</label>
                    <input type="text" class="form-control" name="slot_name" value="<?php echo $row['name']; ?>" required>
                </div><br>
                <div class="form-group">
                    <label for="name">Slot Capacity:</label>
                    <input type="text" class="form-control" name="slot_capacity" value="<?php echo $row['capacity']; ?>" required>
                </div><br>
                <input type="submit" class="btn btn-danger" value="Update" name="update_parking_slot">
                <a href="admin_dashboard.php" class="btn btn-primary">Go to dashboard</a>
            </form>
            </div>
        </div>
    </div>
<?php
    }
?>
    </body>
</html>