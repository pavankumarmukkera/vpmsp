<?php
	session_start();  
	include('../includes/connection.php');
    $slot = 'Slot 1';
    $query = "update parking_history set out_date = CURRENT_TIMESTAMP where vehical_no = '$_GET[vno]'";
    $query_result = mysqli_query($connection,$query);
    $query1 = "update vehicals set status = 0 where vehical_no='$_GET[vno]'";
    $query_result1 = mysqli_query($connection,$query1);
    if($query_result1){
        echo "<script type='text/javascript'>
            alert('Vehical UnParked successfully...');
            window.location.href = 'admin_dashboard.php';  
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error...Plz try again');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }
?>