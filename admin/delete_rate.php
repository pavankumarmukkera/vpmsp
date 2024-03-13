<?php
	session_start();  
	include('../includes/connection.php');
    $query = "delete from rates where id = $_GET[rid]";
    $query_result = mysqli_query($connection,$query);
    if($query_result){
        echo "<script type='text/javascript'>
            alert('Rate deleted successfully...');
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