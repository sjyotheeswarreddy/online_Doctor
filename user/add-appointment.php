<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}
if(isset($_POST["submit"])){

$Problem_Name =$_POST['Problem_Name'];
$Email	=$_POST['Email'];
$protype =$_POST['protype'];
$message =$_POST['message'];
$files = $_FILES['img'];
 $filename = $files['name'];
 $filetmp = $files['tmp_name'];    
 $folder = 'assets/img/'.$filename;
 move_uploaded_file($filetmp, $folder);
$status='';

$sql = mysqli_query($con, "INSERT INTO  addsupport(Name,email,Problemtype,image,Description,status) VALUES('$Problem_Name','$Email','$protype','$folder','$message','$status')");
if ($sql) {
            echo '<script type="text/javascript">';
            echo 'alert("Added Successfully...");';
            echo 'window.location.href="supportview.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Add...");';
            echo 'window.location.href="add-appointment.php";';
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
		<style type="text/css">
    .ptype{
    width: 100%;
    
    padding: 9px;
    margin-left: 23px;
    border: 1px crimson white;
}

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
                                    $result = mysqli_query($con, "SELECT * FROM appointment where  PatientName='$admin' && status='pending'");
                                    if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
                                	$meeting=$row['meeting_link'];
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
</div>
<br>
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
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
<a class="dropdown-item" href="settings.html">Settings</a>-->
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
<a class="dropdown-item" href="login.html">Logout</a>
</div>
</div>
</div>
<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
	
<!--<li class="menu-title float:left"><a href="index.html">Main</a></li>-->
<!--<li class="active">
<a href="index.html"><i class="fa fa-dashboard"></i> <span>USERS</span></a>
</li>-->
<!--<li>
<a href="doctors.html"><i class="fa fa-user-md"></i> <span>Select Doctors</span></a>
</li>-->
<!--<li>
<a href="patients.html"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
</li> -->
<li>
<a href="index.php"><i class="fa fa-user-md"></i> <span>Select Doctors</span></a>
</li>
	<!--<li>
	<a href="doctors.html"><i class="fa fa-user-md"></i> <span>Consultation Room</span></a>
	</li>-->

	<!--<li>
	<a href="patients.html"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
	</li> -->
	<li>
		<a href="payments.php"><i class="fa fa-money"></i> <span>Payment History</span></a>
		 </li>
	<li>
	<a href="appointments.php"><i class="fa fa-calendar"></i> <span>Appointment List</span></a>
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
	<!-- <li>
		<a href="prescriptionview.php"><i class="fa fa-medkit"></i> <span>Prescription Page</span></a>
		 </li> -->
	
	
		 <li class="submenu1">
			<a href="#"><i class="fa fa-headphones"></i> <span> Support</span> <span class="menu-arrow1"></span></a>
			<ul style="display: none;">
				<li>
					<a href="add-appointment.php"><i class="fa fa-envelope"></i> <span>Add</span></a>
					</li>
	
					<li>
						<a href="supportview.php"><i class="fa fa-eye"></i> <span>view</span></a>
						</li>	<!--<li class="submenu">
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
	<a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
	 </li>
	</ul> 
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
	<h4 class="card-title">Add Problem</h4>
	<form action="" method="POST" enctype="multipart/form-data">
	<div class="form-group row">
	<label class="col-md-3 col-form-label">Name</label>
	<div class="col-md-9">
	<input type="text" name="Problem_Name" class="form-control">
	</div>
	</div>

	<div class="form-group row">
	<label class="col-md-3 col-form-label">Email</label>
	<div class="col-md-9">
	<input type="text" name="Email" class="form-control"required>
	</div>
	</div>


	<div class="form-group row">
		<label class="col-md- col-form-label" style="padding-left: 13px;">Problem Type</label>
		<div class="col-md-9">
			<div class="col-md-25">
				<div class="form-group">
			
				<select name="protype" class="ptype" style="margin-left: 12px;">
				<option>Select</option>
				<option>Software</option>
				<option>Hardware</option>
				<option>Treatment</option>
				<option>Maintainance</option>
				
				</select>
				</div>
				</div>
		</div>
		</div>
      
      <div class="form-group row">
	<label class="col-md-3 col-form-label">Description</label>
	<div class="col-md-9">
	<textarea cols="30" rows="4" class="form-control" name="message" ></textarea>
	</div>
	</div>

		


	
	<div class="form-group row">
	<label class="col-md-3 col-form-label">image</label>
	<div class="col-md-9">
	<input type="file" name="img" class="form-control">
	</div>
	</div>
	
	
	<div class="text-right">
	<center><button type="submit" name="submit" class="btn btn-primary ">Submit</button></center>
	</div>
	</form>
	</div>
	</div>
<div class="container-fluid ">
<div class="row">
<div class="col-lg-12">
<div class="footer_iner text-center">
<p>Developed by <a href="#"> <i class="ti-heart"></i> </a><a href="https://sagarsoftwaresolution.com"> Sagar Software Solutions</a></p>
</div>
</div>
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
