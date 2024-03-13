<?php
	session_start();  
	include('../includes/connection.php');
    $query = "delete from parking_slots where id = $_GET[sid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Slot deleted successfully...');
            window.location.href = 'admin_dashboard.php';  
        </script>";
    }
    else{
        echo "<script type='text/javascript'>
            alert('Error...Plz try again.');
            window.location.href = 'admin_dashboard.php';
        </script>";
    }
?>