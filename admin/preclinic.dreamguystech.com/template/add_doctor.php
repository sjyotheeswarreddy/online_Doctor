<?php
//error_reporting(0);
require_once('config.php');
if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];

     $EmailAddress= $_POST['EmailAddress'];

     $Password = $_POST['Password'];

     $UserMobile = $_POST['UserMobile'];
     $role = $_POST['role'];
    $hsname = $_POST['hsname'];
    $quali = $_POST['quali'];
    $exper = $_POST['exper'];
    $addr = $_POST['addr'];
    $pcode = $_POST['pcode'];
    $img='';
    
    $q1 = mysqli_query($con, "INSERT INTO register(Username,EmailAddress,Password,UserMobile,role,Hospital_Name,Qualification,Experience,Address,Pincode,image) VALUES ('$Username','$EmailAddress','$Password','$UserMobile','$role','$hsname','$quali','$exper','$addr','$pcode' ,'$img')");

    if ($q1) {
            echo '<script type="text/javascript">';
            echo 'alert("Registered Successfully...");';
            echo 'window.location.href="add_doctor.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Register...");';
            echo 'window.location.href="add_doctor.php";';
            echo '</script>';
        }
}
?>

<?php
session_start();
error_reporting(0);
require_once("config.php");
$admin = $_SESSION['name'];
$qw = mysqli_query($con, "select * from register where Username='$admin'");
$res=mysqli_fetch_assoc($qw);
$name1 = $res['Username'];

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
        #sidebar{background-color: #3B577C;}
        #sidebar li a{background-color: #3B577C;color:white!important;}
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
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right">3</span></a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span>Notifications</span>
</div>
<div class="drop-scroll">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">
<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">John Doe</span> added new task <span class="noti-title">Patient appointment booking</span></p>
<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">V</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> changed the task name <span class="noti-title">Appointment booking with payment gateway</span></p>
<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">L</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Misty Tison</span> added <span class="noti-title">Domenic Houston</span> and <span class="noti-title">Claire Mapes</span> to project <span class="noti-title">Doctor available module</span></p>
<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
 <a href="activities.html">
<div class="media">
<span class="avatar">G</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> completed task <span class="noti-title">Patient and Doctor video conferencing</span></p>
<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">V</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> added new task <span class="noti-title">Private chat module</span></p>
<p class="noti-time"><span class="notification-time">2 days ago</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<!--<a href="activities.html">View all Notifications</a>
</div>
</div>
</li>
<li class="nav-item dropdown d-none d-sm-block">
<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
</li>-->
<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
<span class="user-img">
<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
<span class="status online"></span>
</span>
<span><?php echo $name1?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.html">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>-->
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>-->
<!--<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</div>
</div>
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
	&nbsp;
<!--<li class="menu-title float:left"><a href="index.html">Main</a></li>-->
<!--<li class="active">
<a href="index.html"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>-->

		 <li class="submenu">
			<a href="#"><i class="fa fa-user"></i> <span> Users</span> <span class="menu-arrow"></span></a>
			<ul style="display: none;">
				<li>
					<a href="userdrop.php"><i class="fa fa-envelope"></i> <span>Add</span></a>
					</li>
	
					<li>
						<a href="staff.php"><i class="fa fa-eye"></i> <span>view</span></a>
						</li>
	
	
			</ul>
			</li>
	<!--<li>
	<a href="doctors.html"><i class="fa fa-user-md"></i> <span>Consultation Room</span></a>
	</li>-->

	<!--<li>
	<a href="patients.html"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
	</li> -->
	<li>
	<a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointment List</span></a>
	 </li>

	<li>
		<a href="payments.php"><i class="fa fa-money"></i> <span>Payment History</span></a>
		 </li>
	
	<!--<li>
	<a href="schedule.html"><i class="fa fa-calendar-check-o"></i> <span>Doctor Schedule</span></a>
	</li> 
	<li>
	<a href="departments.html"><i class="fa fa-hospital-o"></i> <span>Departments</span></a>
	</li>
	<li class="submenu">
	<a href="#"><i class="fa fa-user"></i> <span> Employees </span> <span class="menu-arrow"></span></a>
	<ul style="display: none;">
	<li><a href="employees.html">Employees List</a></li>
	<li><a href="leaves.html">Leaves</a></li>
	<li><a href="holidays.html">Holidays</a></li>
	<li><a href="attendance.html">Attendance</a></li>
	</ul>
	</li>
	<li class="submenu">
	<a href="#"><i class="fa fa-money"></i> <span> Accounts </span> <span class="menu-arrow"></span></a>
	<ul style="display: none;">
	<li><a href="invoices.html">Invoices</a></li>
	<li><a href="payments.html">Payments</a></li>
	<li><a href="expenses.html">Expenses</a></li>
	<li><a href="taxes.html">Taxes</a></li>
	<li><a href="provident-fund.html">Provident Fund</a></li>
	</ul>
	</li>
	<li class="submenu">
	<a href="#"><i class="fa fa-book"></i> <span> Payroll </span> <span class="menu-arrow"></span></a>
	<ul style="display: none;">
	<li><a href="salary.html"> Employee Salary </a></li>
	<li><a href="salary-view.html"> Payslip </a></li>
	</ul>
	</li> -->
	<!--<li>
		<a href="prescriptionview.php"><i class="fa fa-medkit"></i> <span>Prescription Page</span></a>
		 </li>-->
	
	
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
	 
</div>
</div>
</div>
<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<!--<h4 class="page-title">Add </h4>
</div>
</div>
<div class="row">
<div class="col-lg-8 offset-lg-2">
<form>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Problem Name</label>
<input class="form-control" type="text" value="" >
</div>
</div>-->
&nbsp;
<!--<div class="col-md-6">
<div class="form-group">
<label>Patient Name</label>
<select class="select">
<option>Select</option>
<option>Jennifer Robinson</option>
<option>Terry Baker</option>
</select>
</div>
</div>
</div>-->

<div class="row">
	<div class="col-md-8">
	<div class="card-box">
	<h4 class="card-title">Add Doctor</h4>
	<form method="POST" action="">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Name <span class="text-danger">*</span></label>
<input class="form-control" name="Username"  type="text">
</div>


</div>
<div class="col-sm-6">
<div class="form-group">
<label>Email <span class="text-danger">*</span></label>
<input class="form-control" name="EmailAddress" type="email">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Password</label>
<input class="form-control" name="Password" type="password">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Phone Number</label>

<input type="text" name="UserMobile" class="form-control">

</div>
</div>
<div class="col-sm-6">
	<div class="form-group">
<label for="cars"  >Choose Role :</label><br>
        <select name="role" id="roles" style="height: 40px; width:100% ; ">
        <option value="">Choose Role</option>
      	<option >Doctor</option>
        
        </select>
    </div></div>

<div class="col-sm-6">
<div class="form-group">
<label>Qualification/Specialization</label>
<input type="text"  name="quali" class="form-control ">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Experience</label>
<input type="text"  name="exper" class="form-control ">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Hospital Name</label>
<input type="text"  name="hsname" class="form-control ">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Address</label>
<input type="text"  name="addr" class="form-control ">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Pincode</label>
<input type="text"  name="pcode" class="form-control ">
</div>
</div>
<!--<div class="col-sm-6 col-md-6 col-lg-3">
<div class="form-group">
<label>Country</label>
<select class="form-control select">
<option>USA</option>
<option>United Kingdom</option>
</select>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3">
<div class="form-group">
<label>City</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-3">
<div class="form-group">
<label>State/Province</label>
<select class="form-control select">
<option>California</option>
<option>Alaska</option>
<option>Alabama</option>
</select>
</div>
</div>
<div class="col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
<label>PinCode</label>
<input type="text" class="form-control">
</div>
</div>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Phone Number </label>
<input class="form-control" type="text">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Avatar</label>
<div class="profile-upload">
<div class="upload-img">
<img alt="" src="assets/img/user.jpg">
</div>
<div class="upload-input">
<input type="file" class="form-control">
</div>
</div>
</div>
</div>-->
</div>
<!--<div class="form-group">
<label class="display-block">Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="patient_active" value="option1" checked>
<label class="form-check-label" for="patient_active">
Active
</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="patient_inactive" value="option2">
<label class="form-check-label" for="patient_inactive">
Inactive
</label>
</div>
</div>-->
<div class="m-t-20 text-center">
<input type="submit" name="submit"  style="color:white; background-color:#009EFB;border-radius: 20px; width: 100px;height: 40px;">
</div>
</form>

	</div>
	</div>


<!--<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Problem Type</label>
<select class="">
<option>Select</option>
<option>Software</option>
<option>Hardware</option>

</select>
</div>
</div>-->
<!--<div class="col-md-6">
<div class="form-group">
<label>Doctor</label>
<select class="select">
<option>Select</option>
<option>Cristina Groves</option>
<option>Marie Wells</option>
<option>Henry Daniels</option>
</select>
</div>
</div>
</div>-->
<!--<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Date</label>
<div class="cal-icon">
<input type="text" class="form-control datetimepicker">
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
 <label>Time</label>
<div class="time-icon">
<input type="text" class="form-control" id="datetimepicker3">
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Patient Email</label>
<input class="form-control" type="email">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Patient Phone Number</label>
<input class="form-control" type="text">
</div>
</div>
</div>
<div class="form-group">
<label>Message</label>
<textarea cols="30" rows="4" class="form-control"></textarea>
</div>
<div class="form-group">
<label class="display-block">Appointment Status</label>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="product_active" value="option1" checked>
<label class="form-check-label" for="product_active">
Active
</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="status" id="product_inactive" value="option2">
<label class="form-check-label" for="product_inactive">
Inactive
</label>
</div>
</div>
<div class="m-t-20 text-center">
<button class="btn btn-primary submit-btn">Create Appointment</button>
</div>
</form>
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

<!-- Mirrored from preclinic.dreamguystech.com/template/add-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:50:27 GMT -->
</html>
