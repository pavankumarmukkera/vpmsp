<?php
	session_start();  
	include('../includes/connection.php');
    $slot = 'Slot 1';
    $query = "insert into parking_history(vehical_no) values('$_GET[vno]')";
    $query_result = mysqli_query($connection,$query);
    $query1 = "update vehicals set status = 1 where vehical_no='$_GET[vno]'";
    $query_result1 = mysqli_query($connection,$query1);
    if($query_result1){
        echo "<script type='text/javascript'>
            alert('Vehical Parked successfully...');
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