<?php include "../include/dbconnect.php"; 
    session_start();
    session_destroy();

    header("location: adminlogin.php");

?>