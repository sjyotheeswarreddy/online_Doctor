<?php
  
    // Connect to database 
    require_once("config.php");
  
    // Check if id is set or not, if true,
    // toggle else simply go back to the page
   if($_POST['action'] == 'edit')
  
        // Store the value from get to 
        // a local variable "course_id"
        $sno=$_GET['id'];
  
        // SQL query that sets the status to
        // 0 to indicate deactivation.
        $sql="UPDATE appointment SET 
            status=0 WHERE id='$sno'";

  
        // Execute the query
        $qw=mysqli_query($con,$sql);
    }
  echo json_encode($qw);
    // Go back to course-page.php
   // header('location: staff.php');
?>


