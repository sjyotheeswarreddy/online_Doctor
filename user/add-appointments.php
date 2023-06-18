<?php
session_start();
error_reporting(0);
require_once("config.php");
$dname = $_SESSION['dname'];

// $sql = mysqli_query($con, "SELECT * from  payments WHERE id='$sno'");
// $row = mysqli_fetch_assoc($sql);
// $dname=$row['Username'];

if(isset($_POST["submit"])){
$doctorname=$dname;
$Patient_Name =$_POST['Patient_Name'];
$Patient_Email	=$_POST['Patient_Email'];
$PatientPn =$_POST['PatientPn'];
$Date =$_POST['Date'];
$Time = $_POST['Time'];
$Message =$_POST['Message'];
$meetlink ='';
$status='';
$Medicine='';
$Tests='';
$sql = mysqli_query($con, "INSERT INTO  appointment(doctorname,PatientName,Patient_Email,PatientPhone,Date,Time, Comments,meeting_link,Medicine,Tests,status) VALUES('$dname','$Patient_Name','$Patient_Email','$PatientPn','$Date','$Time','$Message','$meetlink','$Medicine','$Tests','$status')");
if ($sql) {
            echo '<script type="text/javascript">';
            echo 'alert("Registered Successfully...");';
            echo 'window.location.href="appointments.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Register...");';
            echo 'window.location.href="add-appointments.php";';
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
$email = $res['EmailAddress'];
$pnumber = $res['UserMobile'];
$img=$res['image'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<title>Sagar Hospitals</title>
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
                                    $result = mysqli_query($con, "SELECT * FROM appointment where  PatientName='$admin'&& status='Pending'");
                                    if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_array($result)) {
									$meeting=$row['meeting_link'];
									$ptn=$row1["PatientName"];
                                	$dt=$row1["Date"];
                                	$tim=$row1["Time"];
                                    ?>
</div>
<div >
<?php if($dt<=$date){?>
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media">
<span class="avatar">
<img alt="John Doe" src="assets/img/user.jpg" class="img-fluid">
</span>
<div class="media-body">
<p class="noti-details"><span class="noti-title"><?php echo $row["PatientName"]; ?></span>.<span class="noti-title">your upcoming appointment on <?php echo $row["Date"]; ?> <?php echo $row["Time"]; ?></span></p>
</div>
</div>
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
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
<a class="dropdown-item" href="settings.html">Settings</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
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
<a href="index.html"><i class="fa fa-dashboard"></i> <span>USERS</span></a>
</li>-->
<!--<li>
<a href="doctors.php"><i class="fa fa-user-md"></i> <span>Select Doctors</span></a>
</li>-->
<!--<li>
<a href="patients.html"><i class="fa fa-wheelchair"></i> <span>Patients</span></a>
</li> -->

<!--<li>
	<a href="payments.html"><i class="fa fa-money"></i> <span>Payment History</span></a>
	 </li>-->
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
<h4 class="page-title">Add Appointment</h4>
</div>
</div>
<!--<form name="frmContact" class="needs-validation " method="post" action="add-appointmentsdb.php">
<div class="row">-->
<div class="col-lg-8 offset-lg-2">
<form method="POST">
<div class="row">
<!--<div class="col-md-6">
<div class="form-group">
<label>AppointmentID</label>
<input class="form-control" name="Appointment_ID" type="text" value="" >
</div>
</div>-->
<div class="col-md-6">
<div class="form-group">
<label>PatientName</label>
<input class="form-control" name="Patient_Name" type="text" value="<?php echo $name1?>">
</div>
</div>
</div>
<div class="row">
<!--<div class="col-md-6">
<div class="form-group">
<label>Department</label>
<select class="" name="Department">
<option value="">Select</option>
<option value="Dentists">Dentists</option>
<option value="Neurology">Neurology</option>
<option value="Opthalmology">Opthalmology</option>
<option value="Orthopedics">Orthopedics</option>
<option value="Cancer Department">Cancer Department</option>
<option value="ENT Department">ENT Department</option>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Doctor</label>
<select class="" name="Doctor">
<option value="">Select</option>
<option value="Cristina Groves">Cristina Groves</option>
<option value="Marie Wells">Marie Wells</option>
<option value="Henry Daniels">Henry Daniels</option>
</select>
</div>
</div>-->
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Date</label>
<div class="">
<input type="date" class="form-control" id="" name="Date"required>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
 <label>Time</label>
<div class="">
<input type="time" class="form-control" id="" name="Time"required>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Patient Email</label>
<input class="form-control" type="email" name="Patient_Email" value="<?php echo $email?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>PatientPhoneNumber</label>
<input class="form-control" type="text" name="PatientPn" value="<?php echo $pnumber?>">
</div>
</div>
</div>
<div class="form-group">
<label>Description</label>
<textarea cols="30" rows="4" class="form-control" name="Message"></textarea>
</div>
<!--<div class="form-group">
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
</div>-->
<div class="m-t-20 text-center">

<button type="submit" class="btn btn btn-primary btn-rounded float-center" name="submit"> submit </button>
<!--<a href="" class="btn btn btn-primary btn-rounded float-center" name="submit"> submit </a>-->
</form>

    
<!--<button class="btn btn-primary submit-btn">Create Appointment</button>-->
</div>
<!--</form>-->
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

<!-- Mirrored from preclinic.dreamguystech.com/template/add-appointment.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:50:27 GMT -->
</html>