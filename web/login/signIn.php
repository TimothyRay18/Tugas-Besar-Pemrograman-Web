<!DOCTYPE html>
<html>
    <head>
		<title>Sign in | DaTim Project</title>
        <meta charset = "UTF-8">
        <meta name = "author" content = "DaTim (Dave & Timothy)">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../../images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/util.css">
        <link rel="stylesheet" type="text/css" href="../../css/main.css">
        <link rel="stylesheet" type="text/css" href="styleFile.css">
        
        <style>
            input[type="radio"]{
                display:inline;
                height:auto;
            }
            table{
                display:block;
                margin-top:5px;
                margin-bottom:5px;
                margin:auto;
            }
            tr,td{
                font-family: Montserrat-Bold;
                font-size: 15px;
                line-height: 1.2;
                color: #333333;
            }
            .radio1{
                width:30px;
            }
            .radio2{
                width:45px;
            }
            .ajax{
                font-family: Montserrat-Bold;
                font-size: 15px;
                line-height: 1.2;
                color:red;
            }
            #inputFile,#pp{
                font-family: Montserrat-Bold;
            }
        </style>
        <head>
        <script>
            function cekUsername(str){
                if(str.length==0){
                    document.getElementById("usedUsername").innerHTML="";
                    return;
                }
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                        document.getElementById("usedUsername").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","../ajax/cekUsername.php?q="+str,true);
                xmlhttp.send();
            }
            function cekPassword(){
                var pass1 = document.getElementById("p1").value;
                var pass2 = document.getElementById("p2").value;
                if(pass2.length==0){
                    document.getElementById("validPassword").innerHTML="";
                    return;
                }
                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange=function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status==200){
                        document.getElementById("validPassword").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET","../ajax/cekPassword.php?q="+pass2+"&r="+pass1,true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <div class="limiter">    
            <div class="container-login100" style="background-image: url('../../images/login/img-01.jpg');">
                <div class="wrap-login100 p-t-190 p-b-30">    
                    <form class="login100-form validate-form" enctype="multipart/form-data" name="register" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                        <span class="login100-form-title p-t-20 p-b-45">Input your identity</span>

                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Name is required">
                            <input class="input100" type="text" name="name" placeholder="Name">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
                            <input class="input100" type="text" name="username" onkeyup="cekUsername(this.value)" placeholder="Username">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div>
                            <table class="wrap-input100 validate-input m-b-10">
                                <tr><td>&nbsp;&nbsp;&nbsp;</td><td class="radio1"><input type="radio" name="gender" value="male" style="height:inherit"></td><td class="radio2">Male</td>
                                <td class="radio1"><input type="radio" name="gender" value="female" style="width:inherit"></td><td class="radio2">Female</td></tr>
                            </table>
                        </div>

                        <span class="ajax" id="usedUsername"></span>
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
                            <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="symbol-input100">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                            <input class="input100" type="password" name="password" id="p1" placeholder="Password">
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                            <input class="input100" type="password" id="p2" name="Cpassword" onkeyup="cekPassword()" placeholder="Confirm Password">
                            <span class="symbol-input100">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <span class="ajax" id="validPassword"></span>

                        <div class="container-login100-form-btn p-t-10">
                            <input type="submit" name="signInSubmit" id="signInSubmit" value="submit" class="login100-form-btn">
                        </div>
                        
                        <div class="text-center w-full p-t-25 p-b-230">
                            <a class="txt1" href="login.php">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--===============================================================================================-->	
		    <script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
            <script src="../../vendor/bootstrap/js/popper.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
            <script src="../../vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
            <script src="../../js/main.js"></script>
            <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript" src="app.js"></script>
        <?php
            if(isset($_POST['signInSubmit'])){
                $password1=$_POST['password'];
                $password2=$_POST['Cpassword'];
                $name = $_POST['name'];
                $username = $_POST['username'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                if($password1!=$password2){
                    echo "<script>alert(\"Password not match\")</script>";
                }else{
                    if($name != "" && $email != "" && $username!= ""){
                        $link=mysqli_connect("localhost","root","","tubes");
                        $password=md5($password1);
                        $sql = "INSERT INTO accountList(Name,Username,Gender,Email,Password,Type,Foto) VALUES ('$name','$username','$gender','$email','$password','member','')";
                        if(mysqli_query($link,$sql)){
                            echo "<script>alert(\"Registered Successfully\")</script>";
                        }else{
                            echo "ERROR: Could not able to execute $sql. ".mysqli_error($link)."<br>";
                        }
                    }
                }
            }
        ?>
    </body>
</html>