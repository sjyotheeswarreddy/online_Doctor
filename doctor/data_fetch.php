<?php
session_start();
error_reporting(0);
require_once("config.php");
if (!isset($_SESSION['name'])) {
    header("location:../login.php");
}
$admin = $_SESSION['name'];
$qw = mysqli_query($con, "select * from register");
$res=mysqli_fetch_assoc($qw);
$name1 = $res['Username'];


$i = 1;

$columns = array(
        
            "Username",
            "EmailAddress",
            "UserMobile",
            "role",
            "Hospital_Name",
            "status"
            
);
 $query = "SELECT * from  register WHERE role='staff' AND ";

 if (isset($_POST["search"]["value"])) {
    $query  .= '(id LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Username LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR EmailAddress LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR UserMobile LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR role LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR Hospital_Name LIKE "%' . $_POST["search"]["value"] . '%")';
   
    
    
}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $columns[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' 
 ';
} 

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($con, $query));

$result = mysqli_query($con, $query);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $sub_array = array();
    $sub_array[] = '<div style="text-align:center;color:black;">' . $i . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Username"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["EmailAddress"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["UserMobile"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["role"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["Hospital_Name"] . '</div>';
     $sub_array[] = '<center><a href="edit-staff.php?id='.$row["id"].'"><i class="fas fa-edit fa-2x" id="update"></i></a></center>';
         $data[] = $sub_array;
    $i++;
}


function get_all_data($con)
{
    $query = "SELECT * FROM register";
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