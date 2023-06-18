<?php
//error_reporting(0);
require_once('config.php');
require_once("encrypt.php");
if (isset($_POST['submit'])) {
    $Username = $_POST['Username'];

     $EmailAddress= $_POST['EmailAddress'];

     $Password = encrypt_decrypt('encrypt',$_POST['Password']);

     $UserMobile = $_POST['UserMobile'];
     $role = $_POST['role'];
     $hsname ='';
    $img='';
    $quali='';
    $exper='';
    $addr='';
    $pcode='';
    if($role=='Admin'){
    $status=1;
    }else{
        $status=0;
    }
    $q1 = mysqli_query($con, "INSERT INTO register(Username,EmailAddress,Password,UserMobile,role,Hospital_Name,Qualification,Experience,Address,Pincode,image,status) VALUES ('$Username','$EmailAddress','$Password','$UserMobile','$role','$hsname','$quali','$exper','$addr','$pcode','$img','$status')");

    if ($q1) {
            echo '<script type="text/javascript">';
            echo 'alert("Registered Successfully...");';
            echo 'window.location.href="login.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to Register...");';
            echo 'window.location.href="register.php";';
            echo '</script>';
        }
}
?>




<html>
    <head>
       <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
       <link rel="stylesheet" media="screen" href="css/style2.css">
        <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
        <style>
            body{
                /*background-color: rgba(178, 241, 246, 0.708);*/
background-color:#1a4780;
            height: 500px; 
            background-position: center; 
            background-repeat: no-repeat; 
            background-size: cover; 

            }
            img{
                height: 100px;
                width: 100px;
            }
            .forms{
                width: 460px;
                height: 590px;
                background-color: aliceblue;
                border: 1px solid;
                text-align: center;
                padding: 20px;
                margin-top: 200px;
                margin-bottom: 70px;
                margin-right: 500px;
                margin-left: 400px;
                border-radius: 5px;
                
            }
            .one{
                margin-bottom:50PX ;
            }
            
            input{
                padding: 3px 5px;
                margin: 8px 3px;
            }
            #roles
                {
    margin: 0 0 15px 0;
    padding: 4px;
    width: 46%;
}
            
        </style>
      
</head>
<body id="particles-js">
    <div class="count-particles">
        <div class="container">
        <div class="forms" style="margin-top:10px!important;"> 
            <img src="images/logo-dark.png" alt="" class="one">
            <h1 style="color:#1a4780;margin-top:-15px!important;">Sagar Hospitals</h1>
            <script src="js/particles.js"></script>
<script src="js/app.js"></script>

<!-- stats.js -->
<script src="js/lib/stats.js"></script>
            <!--<h2 style="color:#009EFB;margin-top:0px!important;margin-bottom:5px!important;">Register</h2>-->
        <form  method="post" action=""> 
        <label for="Name" style="float: left;" >Username : </label><br>
        <input type="text" name="Username" id="Username" placeholder="Enter Username" style="height: 40px; width:100% ; "><br>
        <label for="EmailAddress" style="float: left;">Email : </label><br>
<input type="text" name="EmailAddress" id="EmailAddress" placeholder="Enter EmailAddress" style="height: 40px; width:100% " required><br>
        <label for="Password" style="float: left;">Password : </label><br>
        <input type="password" name="Password" id="Passward" placeholder="Enter Password" style="height: 40px; width:100% ; " required><br>
        <label for="UserMobile" style="float: left;">Mobile Number : </label><br>
        <input type="text" name="UserMobile" id="UserMobile" placeholder="Enter Mobile Number" style="height: 40px; width:100% ; "><br>
        <label for="cars" style="float: left;" >Choose Role :</label>&nbsp;
    
        <select name="role" id="roles" style="height: 40px; width:100% ;margin-top:8px !important; ">
        <option value="">Choose Role</option>
        <option >Admin</option>
        <option >Doctor</option>
        <option >Staff</option>
        <option >User</option>
        </select><br>
        <input type="submit" name="submit"  style="color:white; background-color:#1a4780;border-radius: 20px; width: 100px;height: 40px;margin-bottom:3px;"><br></br>
        <p>Do you have an account?<a href="login.php" style="color:#1a4780;font-size: 15px;"><u>Sign in</u></a></p>
    </form>
    
</div>
</div></div>
    </body>
</html>