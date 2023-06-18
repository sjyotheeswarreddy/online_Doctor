<?php
 session_start();
 error_reporting(0);
 require_once("config.php");
 if (!isset($_SESSION['name'])) {
     header("location:../login.php");
 }
 $admin = $_SESSION['name'];
 $qw = mysqli_query($con, "select * from appointment");
 $res=mysqli_fetch_assoc($qw);
 $name1 = $res['Username'];
 $i = 1; 

$columns = array(
            "id",
            "doctorname",
            "PatientName",
            "Patient_Email",
            "PatientPhone",
            "Date",
            "Time",
            "Comments",
            "meeting_link",
            "Medicine",
            "Tests",
            "status",
            
);
 $query = "SELECT * from  appointment WHERE";

 if (isset($_POST["search"]["value"])) {
    $query .= '(id LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR doctorname LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PatientName LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Patient_Email LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PatientPhone LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Date LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Time LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Comments LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR meeting_link LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Medicine LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Tests LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR status LIKE "%' . $_POST["search"]["value"] . '%")';
    
}
$query .= "ORDER BY id DESC";

// if (isset($_POST["order"])) {
//     $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
//  ';
// } 

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div style="text-align:center;color:black">' . $i . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["doctorname"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PatientName"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Patient_Email"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PatientPhone"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Date"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Time"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Comments"] . '</div>';
    $sub_array[] = '<a href=https://zoom.us/join>' . $row["meeting_link"] . '</a>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Medicine"] . '</div>';    
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Tests"] . '</div>';   
    $sub_array[] = '<center><a href="edit-appointment.php?id='.$row["id"].'"><i class="fa fa-edit fa-2x" id="update"></i></a></center>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["status"] . '</div>';
    $data[] = $sub_array;
    $i++;
}


function get_all_data($con)
{
    $query = 'SELECT * FROM appointment';
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($con),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);
?>