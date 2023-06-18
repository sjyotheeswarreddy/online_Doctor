<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}
$admin = $_SESSION['name'];
$qw = mysqli_query($con, "select * from register where Username='$admin'");
$res=mysqli_fetch_assoc($qw);
$name1 = $res['Username'];
$img=$res['image'];

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:48:57 GMT -->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
		<style>
		#sidebar{background-color: #1a4780;}
		#sidebar li a{background-color: #1a4780;color:white!important;}
		.submenu  ul li span{color:white!important;}
		.notifications {padding: 6px;}
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
									$date = date("y-m-d H:i:s");
                                    $result = mysqli_query($con, "SELECT * FROM appointment where  PatientName='$admin' && status='pending'");
                                    if (isset($_GET[''])) {
                                        echo $_GET['msg'];
                                    }
                                    include_once('./index.php');
                                    ?>
                                    <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                	$meeting=$row['meeting_link'];
									$dt1=$row['Date'];

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
<p class="noti-details"><span class="noti-title"><?php echo $row["PatientName"]; ?></span>.<span class="noti-title">your upcoming appointment on <?php echo $row["Date"]; ?> <?php echo $row["Time"]; ?></span></p>

</div>
</div><br>
<?php if($meeting!=''){?>
<div class="media">
<span class="avatar">
<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
</span>
<div class="media-body">	
<p class="noti-details"><span class="noti-title"></span><span class="noti-title">your upcoming appointment metting link is<a  href="<?php echo $meeting; ?>"><?php echo $meeting; ?> </span></a></p>

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

<!--<div class="topnav-dropdown-footer">
<a href="activities.html">View all Notifications</a>
</div>-->
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
<a class="dropdown-item" href="reset_password.php">change password</a>
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.php">My Profile</a>
<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</div>
</div>
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
	
<li>
<a href="index.php"><i class="fa fa-user-md"></i> <span>Select Doctors</span></a>
</li>
<li>
		<a href="payments.php"><i class="fa fa-money"></i> <span>Payment History</span></a>
		 </li>
<li>
<a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointment List</span></a>
 </li>
	
	<!--<li>
	
	</li> -->
	<!-- <li>
	<a href="prescriptionview.php"><i class="fa fa-medkit"></i> <span>Prescription Page</span></a>
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
					<!--<li class="submenu">
						<a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span class="menu-arrow"></span></a>
						<ul style="display: none;">
						<li><a href="compose.html">Compose Mail</a></li>
						<li><a href="inbox.html">Inbox</a></li>
						<li><a href="mail-view.html">Mail View</a></li>
						</ul>
						</li>-->
						

		</ul>
		</li>
		<li>
	<a href="logout.php"><span>Logout</span></a>
	 </li>

</div>
</div>
</div>



</div>
</div>
</div>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-4 col-3">
<h4 class="page-title">Doctors</h4>
</div>
<div class="col-sm-8 col-9 text-right m-b-20">
<!--<a href="add-doctor.html" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>-->
</div>
</div>
<div class="row doctor-grid">

<?php
   
error_reporting(0);
require_once("config.php");
$qw = mysqli_query($con, "select * from register WHERE role='Doctor'");
// $res=mysqli_fetch_assoc($qw);
while ($res = mysqli_fetch_array($qw)) {
$id=$res['id'];
$role = $res['Username'];
$Experience = $res['Experience'];
$Qualification = $res['Qualification'];
 $img= $res['image'];

?>
<div class="col-md-4 col-sm-4  col-lg-3">
<div class="profile-widget">
<div class="doctor-img">
<a class="avatar" href="#"><img alt="" src="<?php echo $img?>"></a>
</div>
<h4 class="doctor-name text-ellipsis"><a href=""><?php echo $role?></a></h4>
<div class="doc-prof"><?php echo $Experience?></div>
<div class="doc-prof"><?php echo $Qualification?></div>

	<a href="index2.php?id=<?php echo $id; ?>" class="btn btn-primary btn-rounded float-center">Book Now</a>

</div>

</div>
<?php
                                   
                                }
                                ?>
								</div>
<div class="container-fluid ">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p> Developed by  <a href="#"> <i class="ti-heart"></i> </a><a href="https://sagarsoftwaresolution.com"> Sagar Software Solutions</a></p>
</div>
</div>
</div>
</div>
<!--<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget">
<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
<div class="dash-widget-info text-right">
<h3>98</h3>
<span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget">
<span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
<div class="dash-widget-info text-right">
<h3>1072</h3>
<span class="widget-title2">Appointments <i class="fa fa-check" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget">
<span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
<div class="dash-widget-info text-right">
<h3>72</h3>
<span class="widget-title3">Solved <i class="fa fa-check" aria-hidden="true"></i></span>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="dash-widget">
<span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
<div class="dash-widget-info text-right">
<h3>618</h3>
<span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12 col-md-6 col-lg-6 col-xl-6">
<div class="card">
<div class="card-body">
<div class="chart-title">
<h4>Total Appointments</h4>
<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
</div>
<canvas id="linegraph"></canvas>
</div>
</div>
</div>
<div class="col-12 col-md-6 col-lg-6 col-xl-6">
<div class="card">
<div class="card-body">
<div class="chart-title">
<h4>Patients In</h4>
<div class="float-right">
<ul class="chat-user-total">
<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
</ul>
</div>
</div>
<canvas id="bargraph"></canvas>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12 col-md-6 col-lg-8 col-xl-8">
<div class="card">
<div class="card-header">
<h4 class="card-title d-inline-block">Upcoming Appointments</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
</div>
<div class="card-body p-0">
<div class="table-responsive">
<table class="table mb-0">
<thead class="d-none">
<tr>
<th>Patient Name</th>
<th>Doctor Name</th>
<th>Timing</th>
<th class="text-right">Status</th>
</tr>
</thead>
<tbody>
<tr>
<td style="min-width: 200px;">
<a class="avatar" href="profile.html">B</a>
<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
</td>
<td>
<h5 class="time-title p-0">Appointment With</h5>
<p>Dr. Cristina Groves</p>
</td>
<td>
<h5 class="time-title p-0">Timing</h5>
<p>7.00 PM</p>
</td>
<td class="text-right">
<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
</td>
</tr>
<tr>
<td style="min-width: 200px;">
<a class="avatar" href="profile.html">B</a>
<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
</td>
<td>
<h5 class="time-title p-0">Appointment With</h5>
<p>Dr. Cristina Groves</p>
</td>
<td>
<h5 class="time-title p-0">Timing</h5>
<p>7.00 PM</p>
</td>
<td class="text-right">
<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
</td>
</tr>
<tr>
<td style="min-width: 200px;">
<a class="avatar" href="profile.html">B</a>
<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
</td>
<td>
<h5 class="time-title p-0">Appointment With</h5>
<p>Dr. Cristina Groves</p>
</td>
<td>
<h5 class="time-title p-0">Timing</h5>
<p>7.00 PM</p>
</td>
<td class="text-right">
<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
</td>
</tr>
<tr>
<td style="min-width: 200px;">
<a class="avatar" href="profile.html">B</a>
<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
</td>
<td>
<h5 class="time-title p-0">Appointment With</h5>
<p>Dr. Cristina Groves</p>
</td>
<td>
<h5 class="time-title p-0">Timing</h5>
<p>7.00 PM</p>
</td>
<td class="text-right">
<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
</td>
</tr>
<tr>
<td style="min-width: 200px;">
<a class="avatar" href="profile.html">B</a>
<h2><a href="profile.html">Bernardo Galaviz <span>New York, USA</span></a></h2>
</td>
<td>
<h5 class="time-title p-0">Appointment With</h5>
<p>Dr. Cristina Groves</p>
</td>
<td>
<h5 class="time-title p-0">Timing</h5>
<p>7.00 PM</p>
</td>
<td class="text-right">
<a href="appointments.html" class="btn btn-outline-primary take-btn">Take up</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4 col-xl-4">
<div class="card member-panel">
<div class="card-header bg-white">
<h4 class="card-title mb-0">Doctors</h4>
</div>
<div class="card-body">
<ul class="contact-list">
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">John Doe</span>
<span class="contact-date">MBBS, MD</span>
</div>
</div>
</li>
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">Richard Miles</span>
<span class="contact-date">MD</span>
</div>
</div>
</li>
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">John Doe</span>
<span class="contact-date">BMBS</span>
</div>
</div>
</li>
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">Richard Miles</span>
<span class="contact-date">MS, MD</span>
</div>
</div>
</li>
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">John Doe</span>
<span class="contact-date">MBBS</span>
</div>
</div>
</li>
<li>
<div class="contact-cont">
<div class="float-left user-img m-r-10">
<a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
</div>
<div class="contact-info">
<span class="contact-name text-ellipsis">Richard Miles</span>
<span class="contact-date">MBBS, MD</span>
</div>
</div>
</li>
</ul>
</div>
<div class="card-footer text-center bg-white">
<a href="doctors.html" class="text-muted">View all Doctors</a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12 col-md-6 col-lg-8 col-xl-8">
<div class="card">
<div class="card-header">
<h4 class="card-title d-inline-block">New Patients </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
</div>
<div class="card-block">
<div class="table-responsive">
<table class="table mb-0 new-patient-table">
<tbody>
<tr>
<td>
<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
<h2>John Doe</h2>
</td>
<td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c58faaadaba1aaa0f7f485a2a8a4aca9eba6aaa8">[email&#160;protected]</a></td>
<td>+1-202-555-0125</td>
<td><button class="btn btn-primary btn-primary-one float-right">Fever</button></td>
</tr>
<tr>
<td>
<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
<h2>Richard</h2>
</td>
<td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bae8d3d9d2dbc8de8b8889fac3dbd2d5d594d9d5d7">[email&#160;protected]</a></td>
<td>202-555-0127</td>
<td><button class="btn btn-primary btn-primary-two float-right">Cancer</button></td>
</tr>
<tr>
<td>
<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
<h2>Villiam</h2>
</td>
<td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f5a79c969d948791c4c7c6b58c949d9a9adb969a98">[email&#160;protected]</a></td>
<td>+1-202-555-0106</td>
<td><button class="btn btn-primary btn-primary-three float-right">Eye</button></td>
</tr>
<tr>
<td>
<img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
<h2>Martin</h2>
</td>
<td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="63310a000b021107525150231a020b0c0c4d000c0e">[email&#160;protected]</a></td>
<td>776-2323 89562015</td>
<td><button class="btn btn-primary btn-primary-four float-right">Fever</button></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-12 col-md-6 col-lg-4 col-xl-4">
<div class="hospital-barchart">
<h4 class="card-title d-inline-block">Hospital Management</h4>
</div>
<div class="bar-chart">
<div class="legend">
<div class="item">
<h4>Level1</h4>
</div>
<div class="item">
<h4>Level2</h4>
</div>
<div class="item text-right">
<h4>Level3</h4>
</div>
<div class="item text-right">
<h4>Level4</h4>
</div>
</div>
<div class="chart clearfix">
<div class="item">
<div class="bar">
<span class="percent">16%</span>
<div class="item-progress" data-percent="16">
<span class="title">OPD Patient</span>
</div>
</div>
</div>
<div class="item">
<div class="bar">
<span class="percent">71%</span>
<div class="item-progress" data-percent="71">
<span class="title">New Patient</span>
</div>
</div>
</div>
<div class="item">
<div class="bar">
<span class="percent">82%</span>
<div class="item-progress" data-percent="82">
<span class="title">Laboratory Test</span>
</div>
</div>
</div>
<div class="item">
<div class="bar">
<span class="percent">67%</span>
<div class="item-progress" data-percent="67">
<span class="title">Treatment</span>
</div>
</div>
</div>
<div class="item">
<div class="bar">
<span class="percent">30%</span>
<div class="item-progress" data-percent="30">
<span class="title">Discharge</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>-->
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
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from preclinic.dreamguystech.com/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:49:20 GMT -->
</html>