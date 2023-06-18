<?php
session_start();
error_reporting(0);
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


$sql = mysqli_query($con, "SELECT * from  register WHERE id='$sno'");
$row = mysqli_fetch_assoc($sql);

$f=$row['fee'];
$dname=$row['Username'];

if(isset($_POST['submit'])) {
    $paymentid =uniqid('PAYT');
    $doctorname= $dname;
	$PatientName = $admin;
	$ptype = $_POST['ptype'];
	$PaidDate = date('m/d/Y h:i:s', time());
    $paidamount = $f;
       
$q2 = mysqli_query($con,"INSERT INTO payments(paymentID,doctorname,PatientName,PaymentType,PaidDate,PaidAmount) VALUES('$paymentid','$doctorname','$PatientName','$ptype','$PaidDate','$paidamount')");

    if ($q2) {
            echo '<script type="text/javascript">';
            echo 'alert("Payment Successfully...");';
            echo 'window.location.href="add-appointments.php";';
            $_SESSION['dname'] = $dname;
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed...");';
            //echo 'window.location.href="add_staff.php";';
            echo '</script>';
        }
}


?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preclinic.dreamguystech.com/template/doctors.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:49:37 GMT -->
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
<title>sagar - Medical & Hospital - Bootstrap 4 Admin Template</title>
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
<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge badge-pill bg-danger float-right"></span>
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
</div>
</div>
</li>
<li class="nav-item dropdown d-none d-sm-block">
<a href="javascript:void(0);" id="open_msg_box" class="hasnotifications nav-link"><i class="fa fa-comment-o"></i> <span class="badge badge-pill bg-danger float-right">8</span></a>
</li>-->
<li class="nav-item dropdown has-arrow">
<a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
<span class="user-img"><img class="rounded-circle" src="<?php echo $img; ?>" width="40" alt="Admin">
<span class="status online"></span></span>
<span><?php echo $name1?></span>
</a>
<div class="dropdown-menu">
<a class="dropdown-item" href="profile.php">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>-->
<a class="dropdown-item" href="logout.php">Logout</a>
</div>
</li>
</ul>
<div class="dropdown mobile-user-menu float-right">
<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">My Profile</a>
<!--<a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
<a class="dropdown-item" href="settings.html">Settings</a>-->
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
</ul>
</div>
</div>
</div>

<div class="container" style="margin-left: 15%;">

    <form action="" method="POST">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" placeholder="john deo">
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" placeholder="room - street - locality">
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" placeholder="tirupati">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" placeholder="india">
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" placeholder="517501">
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">payment</h3><h5><b>consultation fee:&#x20b9;<?php echo $f;?><b></h5>
                	<label>Payment Type:</label>
					<select class="select" name='ptype'>
					<option>Select</option>
					<option>Online</option>
					<option>UPI</option>
					<option>Debitcard</option>
					</select>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" placeholder="mr. john deo">
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="text" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" placeholder="january">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022">
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>
       

        <button type="submit" class="submit-btn" name="submit" style="color:white"; >Proceed To Pay</button>

  </form>

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
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from preclinic.dreamguystech.com/template/payments.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jun 2022 06:49:56 GMT -->
</html>