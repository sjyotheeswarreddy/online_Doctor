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
 $i = 1; 

$columns = array(
            "id",
            "paymentID",
            "doctorname",
            "PatientName",
            "PaymentType",
            "PaidDate",
            "PaidAmount",
            
            
);
 $query = "SELECT * from  payments where PatientName='$admin'AND";

 if (isset($_POST["search"]["value"])) {
    $query .= '(id LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR paymentID LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR doctorname LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PatientName LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PaymentType LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PaidDate LIKE "%' . $_POST["search"]["value"] . '%"';
    $query .= 'OR PaidAmount LIKE "%' . $_POST["search"]["value"] . '%")';
    
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
    $sub_array[] = '<div style="text-align:center;color:black">' . $i . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["paymentID"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["doctorname"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PatientName"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PaymentType"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PaidDate"] . '</div>';
    $sub_array[] = '<div style="text-align:center;color:black">' . $row["PaidAmount"] . '</div>';
    $data[] = $sub_array;
    $i++;
}


function get_all_data($con)
{
    $query = 'SELECT * FROM payments';
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