<?php 
error_reporting(0);
session_start();
$sno = $_GET['id'];
require_once("config.php");
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}
$admin = $_SESSION['name'];
$qw = mysqli_query($con, "select * from register where Username='$admin'");
$res=mysqli_fetch_assoc($qw);
$name1 = $res['Username'];
$img=$res['image'];

 if (isset($_POST['btn'])) {
 $name = mysqli_real_escape_string($con,$_POST['name']);
 
 $email = mysqli_real_escape_string($con, $_POST['email']);
$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
 $date = mysqli_real_escape_string($con, $_POST['date']);
 $time = mysqli_real_escape_string($con, $_POST['Time']);
 $message = mysqli_real_escape_string($con, $_POST['message']);
 $meeting = mysqli_real_escape_string($con, $_POST['meeting']);
  $medicine = mysqli_real_escape_string($con, $_POST['medicine']);
 $tests = mysqli_real_escape_string($con, $_POST['tests']);
 $sql ="UPDATE appointment SET PatientName='$name',Patient_Email='$email',PatientPhone='$phonenumber',Date='$date', Time='$time', Comments='$message',meeting_link='$meeting' ,Medicine='$medicine',Tests='$tests' WHERE id='$sno'";
 // $sql ="UPDATE prescription SET Medicine='$medicine',Tests='$tests' WHERE app_id='$sno'";
 $s=mysqli_query($con,$sql);
//header('location: appointments.php');
if ($s) {
            echo '<script type="text/javascript">';
            echo 'alert("Updated Successfully...");';
            echo 'window.location.href="appointments.php";';
            echo '</script>';
        }

}



$sql = mysqli_query($con, "SELECT * from  appointment WHERE id='$sno'");
$row2 = mysqli_fetch_assoc($sql);

// $sql1 = mysqli_query($con, "SELECT * from  prescription WHERE app_id='$sno'");
// $row3 = mysqli_fetch_assoc($sql1);


?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamguystech.com/template/edit-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:50:27 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
        <style>
        #sidebar{background-color: #1a4780;}
        #sidebar li a{background-color: #1a4780;color:white!important;}
        .submenu  ul li span{color:white!important;}
    </style>
</head>
<body>
<div class="main-wrapper">
<div class="header">
<div class="header-left">
<a href="appointments.php" class="logo">
<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>Sagar Hospitals</span>
</a>
</div>
<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
<ul class="nav user-menu float-right">
<li class="nav-item dropdown d-none d-sm-block">
<!-- <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right"></span> -->
<?php
                                        require 'config.php';
                                        //$admin = $_SESSION['name'];
                                        $date = date("y-m-d H:i:s");
                                        $query = "SELECT id FROM appointment where  Date>='$date' && status='Pending'";
                                        $query_run = mysqli_query($con, $query);
                                        $row = mysqli_num_rows($query_run);
                                      

                                        ?>
										<?php
										if($row==''){?>
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-success float-right">E</span></a>
										<?php 
										}else{
											?>
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">N</span></a>
<?php										}
										?>
                                        <!-- <span>N</span> -->
                                
</a>
<div class="dropdown-menu notifications" style="width: 400px; height: 600px; overflow-y: scroll;margin-top: 46px;">
<div class="topnav-dropdown-header">
<span>Notifications</span>
<?php
                                    error_reporting(E_ERROR | E_PARSE);
                                    require_once("config.php");
                                   // $admin = $_SESSION['name'];
                                    $date = date("y-m-d H:i:s");
                                $result = mysqli_query($con, "SELECT * FROM appointment where Date>='$date' && status='Pending'");
                                    if (mysqli_num_rows($result) > 0) {
                                while ($row1 = mysqli_fetch_array($result)) {
                                    $meeting=$row1['meeting_link'];
                                    $ptn=$row1["PatientName"];
                                    $dt=$row1["Date"];
                                    $tim=$row1["Time"];

                                    
                                    
                            ?>


</div>

<div>
<?php if($dt1<=$date){?>

<ul class="notification-list">

<li class="notification-message">
<a href="" style="padding: 0px!important;">
<div class="media">
<span class="avatar">
<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title"><?php echo $ptn; ?></span> <span class="noti-title">appointment on <?php echo $dt; ?> <?php echo $tim; ?></span></p>
</div>
</div><br>
<?php if($meeting!=''){?>
<div class="media">
<span class="avatar">
<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
</span>
<div class="media-body">    
<p class="noti-details"><span class="noti-title"><?php echo $ptn; ?>'s</span> <span class="noti-title">appointment metting link is<a  href="<?php echo $meeting; ?>"><?php echo $meeting; ?> </span></a></p>

</div>
</div>
<?php }
?>
</a>
<?php
                                    }
                            }
                            ?>
</li>
</ul>
<?php }
?>
</div>

</div>
</li>
<!--<li class="nav-item dropdown d-none d-sm-block">
<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
</li>-->
<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
<span class="user-img">
<img class="rounded-circle" src="<?php echo $img; ?>" width="24" alt="Admin">
<span class="status online"></span>
</span>
<span><?php echo $name1?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>-->
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">My Profile</a>
<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</div>
</div>
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>

    <!-- <li class="submenu">
            <a href="#"><i class="fa fa-user"></i><span> Staff</span><span class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li>
                    <a href="add_staff.php"><i class="fa fa-envelope"></i> <span>Add</span></a>
                    </li>
    
                    <li>
                        <a href="staff.php"><i class="fa fa-eye"></i> <span>view</span></a>
                        </li>
    
    
            </ul>
            </li> -->
<li>
        <a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointment List</span></a>
         </li>
    <!--<li>
        <a href="doctors.php"><i class="fa fa-money"></i> <span>Create consultation room</span></a>
         </li>-->
<!-- <li>
        <a href="prescriptionview.php"><i class="fa fa-medkit"></i> <span>Prescription Page</span></a>
         </li> -->
         <!-- <li>
        <a href="payments.php"><i class="fa fa-money"></i> <span>Payment History</span></a>
         </li> -->
    
    
         <li class="submenu">
            <a href="#"><i class="fa fa-headphones"></i> <span> Support</span> <span class="menu-arrow"></span></a>
            <ul style="display: none;">
                <li>
                    <a href="add-appointment.php"><i class="fa fa-envelope"></i> <span>Add</span></a>
                    </li>
    
                    <li>
                        <a href="supportview.php"><i class="fa fa-eye"></i> <span>view</span></a>
                        </li>
    
    
            </ul>
            </li>
            <li>
        <a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
         </li>
</ul>
</div>
</div>
</div>
<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h4 class="page-title">Edit Appointment</h4>
</div>
</div>
<div class="row">
<div class="col-lg-8 offset-lg-2">
<form  method="POST">
<div class="row">
<!--<div class="col-md-6">
<div class="form-group">
<label>Appointment ID</label>
<input class="form-control" type="text" value="APT-0001" readonly="">
</div>
</div>-->
<!--<div class="col-md-6">
<div class="form-group">
<label>Patient Name</label>
<select class="select">
<option>Select</option>
<option>Jennifer Robinson</option>
<option class="selected">Terry Baker</option>
</select>
</div>
</div>-->
<div class="col-md-6">
<div class="form-group">
<label>Patient Name</label>
<input class="form-control" type="text" name="name" value="<?php echo $row2 ['PatientName'];?>" readonly>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Meeting Link</label>
<input class="form-control" type="text" name="meeting" value="<?php echo $row2 ['meeting_link'];?>">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Date</label>
<div class="cal-icon">
<input type="text" class="form-control" name="date" value="<?php echo $row2 ['Date'];?>" readonly>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
 <label>Time</label>
<div class="">
<input type="time" class="form-control" id="" name="Time" value="<?php echo $row2 ['Time'];?>" readonly>
</div>
</div>
</div>

</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Patient Email</label>
<input class="form-control" type="email" name="email" value="<?php echo $row2 ['Patient_Email'];?>" readonly>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Patient Phone Number</label>
<input class="form-control" type="text" name="phonenumber" value="<?php echo $row2 ['PatientPhone'];?>" readonly>
</div>
</div>
</div>

<div class="row">
<?php if($row2 ['status']=='Pending'){?>
<div class="col-md-6">
<div class="form-group">
<label>Medicine</label>
<input class="form-control" type="text" name="medicine" value="<?php echo $row2 ['Medicine'];?>" readonly>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Tests</label>
<input class="form-control" type="text" name="tests" value="<?php echo $row2 ['Tests'];?>" readonly>
</div>
</div>
<?php
}?>
<?php if($row2 ['status']=='Completed'){?>
<div class="col-md-6">
<div class="form-group">
<label>Medicine</label>
<input class="form-control" type="text" name="medicine" value="<?php echo $row2 ['Medicine'];?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Tests</label>
<input class="form-control" type="text" name="tests" value="<?php echo $row2 ['Tests'];?>" >
</div>
</div>
<?php
}?>
</div>

<div class="form-group">
<label>Description</label>
<textarea cols="30" rows="4" class="form-control" name="message" readonly ><?php echo $row2 ['Comments'];?></textarea>
</div>



<div class="m-t-20 text-center">
<button type="submit" class="btn btn-primary submit-btn" name="btn" >Save</button>
</div>
</form>
</div>
</div>
</div>
<div class="notification-box">
<div class="msg-sidebar notifications msg-noti">
<div class="topnav-dropdown-header">
<span>Messages</span>
</div>
<div class="drop-scroll msg-list-scroll" id="msg_list">
<ul class="list-box">
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">R</span>
</div>
<div class="list-body">
<span class="message-author">Richard Miles </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item new-message">
<div class="list-left">
<span class="avatar">J</span>
</div>
 <div class="list-body">
<span class="message-author">John Doe</span>
<span class="message-time">1 Aug</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">T</span>
</div>
<div class="list-body">
<span class="message-author"> Tarah Shropshire </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">M</span>
</div>
<div class="list-body">
<span class="message-author">Mike Litorus</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">C</span>
</div>
<div class="list-body">
<span class="message-author"> Catherine Manseau </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">D</span>
</div>
<div class="list-body">
<span class="message-author"> Domenic Houston </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
 <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">B</span>
</div>
<div class="list-body">
<span class="message-author"> Buster Wigton </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">R</span>
</div>
<div class="list-body">
<span class="message-author"> Rolland Webber </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">C</span>
</div>
<div class="list-body">
<span class="message-author"> Claire Mapes </span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">M</span>
</div>
<div class="list-body">
<span class="message-author">Melita Faucher</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
 <a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">J</span>
</div>
<div class="list-body">
<span class="message-author">Jeffery Lalor</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">L</span>
</div>
<div class="list-body">
<span class="message-author">Loren Gatlin</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
<li>
<a href="chat.html">
<div class="list-item">
<div class="list-left">
<span class="avatar">T</span>
</div>
<div class="list-body">
<span class="message-author">Tarah Shropshire</span>
<span class="message-time">12:28 AM</span>
<div class="clearfix"></div>
<span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="chat.html">See all messages</a>
</div>
</div>
</div>
</div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/app.js"></script>
<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'

                });
            });
     </script>
</body>

<!-- Mirrored from preclinic.dreamguystech.com/template/edit-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:50:27 GMT -->
</html>
