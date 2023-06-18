<?php
// database connection code
if(isset($_POST['Submit']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','onlinedoctor');

// get the post records

$Appointment_ID = $_POST['Appointment_ID'];
$Patient_Name = $_POST['Patient_Name'];
$Department = $_POST['Department'];
$Doctor = $_POST['Doctor'];
$Date	 = $_POST['Date	'];
$Time	 = $_POST['Time	'];
$PatientPn = $_POST['Patient Pn'];
$Message = $_POST['Message'];


// database insert SQL code
$sql = "INSERT INTO appointment (`Appointment_ID`, `Patient_Name`, `Department`, `Doctor`, `Date	`, `Time	`, `Patient_Email`, `Patient Pn`, `Message`)
 VALUES ('0', '$Appointment_ID', '$Patient_Name', '$Department', '$Doctor', '$Date	', '$Time	', '$Patient_Email', '$PatientPn', '$Message')";

// insert in database 
$rs = mysqli_query($con, $sql);
if($rs)
{
	echo " Records Inserted";
}
}
else
{
	echo " Records not Inserted";
	
}
?>