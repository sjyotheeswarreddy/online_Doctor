<?php
session_start();
error_reporting(0);
require_once("config.php");
require_once("encrypt.php");
if (isset($_POST['login'])) {
    $email = $_REQUEST['UserName'];
    
    $password = encrypt_decrypt('encrypt',$_REQUEST['Password']);

    $get_data = mysqli_query($con, "select * from register where EmailAddress='".$email."'AND Password='".$password."' AND status = '1' ");
    if ($get_data->num_rows > 0) {

        while ($data = mysqli_fetch_array($get_data)) {
             $userRole = $data["role"];
              $name = $data["Username"];
         

        }
        if ($userRole =='Doctor') {
            $_SESSION['name'] = $name;

        echo "<script>";
        echo "window.location.href='doctor/appointments.php';";
        echo "</script>";
        }elseif($userRole =='Admin'){
        $_SESSION['name'] = $name;
        echo "<script>";
        echo "window.location.href='admin/appointments.php';";
        echo "</script>";
        }elseif($userRole =='Staff'){
         $_SESSION['name'] = $name;

        echo "<script>";
        echo "window.location.href='staff/appointments.php';";
        echo "</script>";
        }elseif($userRole =='User'){
        $_SESSION['name'] = $name;
        echo "<script>";
        echo "window.location.href='user/index.php';";
        echo "</script>";
        }else{
        echo "<script>";
        echo "alert('UserName or Password wrong');";
        echo "window.location.href='index.php';";
        echo "</script>";
        }
        }
}
?>


<html>
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="stylesheet" media="screen" href="css/style2.css">
        <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
        <style>
        
           
            .forms{
                width: 445px;
                height: 390px;
                background-color: aliceblue;
                border: 1px solid;
                text-align: center;
                padding: 20px;
                
                margin-bottom: 50px;
                margin-right: 500px;
                margin-left: 400px;
                border-radius: 10px;
                
            }
            .one{
                margin-bottom:10PX ;
            }
            
            input{
                padding: 3px 5px;
                margin: 8px 3px;
            }
            p{
                display: inline;
            }
        </style>
        
</head>
    <body id="particles-js">
        <!-- <video autoplay muted loop id="Video">
  <source src="images/pic.mp4" type="video/mp4" style="height:100%">
</video> -->

<div class="count-particles">
        <div class="forms "> 
        
            <img src="images/logo-dark.png" alt="" class="one" style="height: 80px;%;margin-top: 0px;!important;">


 <h1 style="color:#1a4780;margin-top:5px!important;">Sagar Hospitals</h1>
 <script src="js/particles.js"></script>
<script src="js/app.js"></script>

<!-- stats.js -->
<script src="js/lib/stats.js"></script>
        <form action="" method="post">
        <label for="UserName">User Name : </label>
        <input type="text" name="UserName" id="UserName" placeholder="Enter User Name" style="height: 50px; width:70% ;margin-bottom: 30PX;"><br>
        <label for="Password">Password : </label>
        <input type="password" name="Password" id="Passward" placeholder="Enter Password" style="height: 50px; width:70% ;margin-bottom: 30PX;margin-left: 15PX;"><br>
        <input type="submit" name="login"  style="color:white; background-color:#1a4780; ;padding: 10px;border-radius: 20px; width: 100px;margin-top:5px!important;margin-bottom:20px!important;"><br>
        
        <p>Don't have an account?</p>
        <a href="./register.php" style="color:#1a4780;font-size: 11px;"><u>Register Now</u></a>
    
    </form>
</div>
</div>


    </body>
</html>