<?php 
    include_once('../header.php');
    include('../includes/connection.php');
    if(isset($_POST['update_vehical_type'])){
        $query = "update vehical_type set type = '$_POST[vehical_type]' where id = $_GET[tid]";
        $query_result = mysqli_query($connection,$query);
        if($query_result){
            echo "<script type='text/javascript'>
                  alert('Vehical type updated successfully...');
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

    $query = "select * from vehical_type where id = $_GET[tid]";
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
            <center><h4>Edit Vehical Type</h4></center>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Vehical Type:</label>
                    <input type="text" class="form-control" name="vehical_type" value="<?php echo $row['type']; ?>" required>
                </div><br>
                <input type="submit" class="btn btn-danger" value="Update" name="update_vehical_type">
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