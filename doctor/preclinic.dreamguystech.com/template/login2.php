<html>
    <head>
        <title>my first script</title>
        <style>
            body{
                background-color: rgba(178, 241, 246, 0.708);
            }
            img{
                height: 100px;
                width: 100px;
            }
            .forms{
                width: 445px;
                height: 600px;
                background-color: aliceblue;
                border: 1px solid;
                text-align: center;
                padding: 20px;
                margin-top: 200px;
                margin-bottom: 70px;
                margin-right: 500px;
                margin-left: 400px;
                border-radius: 10px;
                
            }
            .one{
                margin-bottom:50PX ;
            }
            
            input{
                padding: 3px 5px;
                margin: 8px 3px;
            }
            p{
                display: inline;
            }
        </style>
        <script>
           function validateForm(){
               var x=document.forms['jyothi']['UserName'].value;
               var y=document.forms['jyothi']['Passward'].value;
               if(x.length>8 && x.length<20 && x.includes('@')) {
                document.write('UserName'+": "+x)
               }else{
                alert("ti is not validate UserName");      
               }  
               if(y.length>8 && y.length<16 && y.includes('@')) {
                document.write('Passward'+": "+y)
               }else{
                alert("ti is not validate Passward");      
               } 
           }
            
           function validate(){
           document.forms['jyothi']['Passward'].value="";
           document.forms['jyothi']['UserName'].value="";
           
           }
             function validateOne(){
            var a=document.forms['jyothi']['UserName'].value;
            var b=document.forms['jyothi']['Passward'].value;
            if(a=="hema@gmail.com"){
            document.write('UserName'+": "+x)
            }else{
            alert('go to regester')
             }
             if(b=="reddy@123"){
            document.write('Passward'+": "+x)
            }else{
            alert('go to regester')
             }
             }
        </script>
</head>
    <body>
        <div class="forms"> 
            <img src="assets/img/logo-dark.png" alt="" class="one">
        <form name="jyothi">
        <label for="UserName">User Name : </label>
        <input type="text" name="UserName" id="UserName" placeholder="Enter User Name" style="margin-bottom: 30PX;"><br>
        <label for="Passward">Passward : </label>
        <input type="password" name="Passward" id="Passward" placeholder="Enter Passward" style="margin-bottom: 30PX;"><br>
        <input onclick="validateForm()"type="button" value="login" style="padding: 10px;border-radius: 20px; width: 100px;""><br>
        <!-- <input onclick="validateOne()"type="button" value="Signup" style="padding: 10px; > -->
        <!-- <input onclick="validate()"type="button" value="Reset" style="padding: 10px;"> -->
        <p>Don't have an account?</p>
        <a href="./register.html">register</a>
    </form>
</div>
    </body>
</html>