<?php
session_start();
require_once("config.php");
if (!isset($_SESSION['id'])) {
   // header("location:../admin_login.php");
}

//require("config.php");
//if($_GET['GST_Number'] == ''){
  //  header("Location: view_users.php");
//}else{

    $sno = $_GET['id'];
    $delete = "DELETE FROM appointment WHERE id='$sno'";
    $del=mysqli_query($con,$delete);
    if ($del) {
        echo '<script type="text/javascript">';
         //echo 'alert("Deleted Successfully");';
        echo 'window.location.href="appointments.php";';
        echo '</script>';
    } else {
        echo '<script type="text/javascript">';
       // echo 'alert("Failed to Delete");';
        echo 'window.location.href="appointments.php";';
        echo '</script>';
    }
?>