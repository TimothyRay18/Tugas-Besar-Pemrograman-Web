<head>
    <title>Admin</title>
    <head>
		<style>
			form {
				background-color: #e5eecc;
				padding: 5px;
			}
		</style>
        <script>
            $(document).ready(function(){
                $(".formAdmin").hide();
                $("#admin").click(function(){
                    $(".formAdmin").slideToggle("fast");
                });
                $(".formDelete").hide();
                $("#delete").click(function(){
                    $(".formDelete").slideToggle("fast");
                });
            });
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
                xmlhttp.open("GET","ajax/cekUsername.php?q="+str,true);
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
                xmlhttp.open("GET","ajax/cekPassword.php?q="+pass2+"&r="+pass1,true);
                xmlhttp.send();
            }
        </script>
    </head>
</head>
<body>
    <form>
	<?php
        if(!isset($_SESSION)) {
            session_start();	
        }
        if(isset($_COOKIE['login'])){
            $_SESSION['login'] = $_COOKIE['login'];
            $_SESSION['username'] = $_COOKIE['username'];
        }
        $user=$_SESSION['username'];
        echo "<h1>Welcome $user</h1>";
    ?>
    <button type="button" id="admin">Add admin</button>
	</form>
    <div class="formAdmin">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Add New Admin</h2>
		<input type="text" name="name" placeholder="Name"><br>
        <input type="text" name="username" onkeyup="cekUsername(this.value)" placeholder="Username"><br>
        <span class="ajax" id="usedUsername"></span><br>
        <input type="email" name="email" placeholder="Email"><br>
        <table>
            <tr><td class="radio1"><input type="radio" name="gender" value="male" checked="checked"></td><td class="radio2">Male</td>
            <td class="radio1"><input type="radio" name="gender" value="female"></td><td class="radio2">Female</td></tr>
        </table>
        <input type="password" name="newPass" id="p1" placeholder="Password"><br>
        <input type="password" name="confirmPass" id="p2" onkeyup="cekPassword()" placeholder="Confirm Password"><br>
        <span id="validPassword"></span><br>
        <input type="file" name="PP"><br>
        <input type="submit" name="adminSubmit"><br>
    </form>
    </div>
	<form>
    <button type="button" id="delete" onSubmit="return confirm('are you sure?')">Delete Member</button><br>
    </form>
	<div class="formDelete">
    <form action="" method="post" >
        <h2>Delete Member</h2>
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="passwordAdmin" placeholder="Password Admin"><br>
        <input type="submit" name="submitDelete" value="Delete">
    </form>
    </div>
</body>
<?php
    if(isset($_POST['adminSubmit'])){
        $password1=$_POST['newPass'];
        $password2=$_POST['confirmPass'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        if($password1 == "" || $password2=="" || $name=="" || $username == ""){
            echo "<script>alert(\"Please Fill All The Blank Space\")</script>";
        }else{
            if($password1!=$password2){
                echo "<script>alert(\"Password not match\")</script>";
            }else{
                if($_FILES["PP"]["error"]>0){
                    echo "Return Code: ".$_FILES["petPic"]["error"]."<br>";
                }else{
                    $path = "login/Upload/".basename(($_FILES["PP"]["name"]));
                    if(file_exists("login/Upload/".$_FILES["PP"]["name"])){

                    }else{
                        move_uploaded_file($_FILES["PP"]["tmp_name"], "login/Upload/".$_FILES["PP"]["name"]);
                    }
                    if($name != "" && $email != "" && $username!= ""){
                        $link=mysqli_connect("localhost","root","","tubes");
                        $password=md5($password1);
                        $sql = "INSERT INTO accountList(Name,Username,Gender,Email,Password,Type,Foto) VALUES ('$name','$username','$gender','$email','$password','admin','$path')";
                        if(mysqli_query($link,$sql)){
                            echo "<script>alert(\"Registered Successfully\")</script>";
                        }else{
                            echo "ERROR: Could not able to execute $sql. ".mysqli_error($link)."<br>";
                        }
                    }
                }
            }
        }
    }
    if(isset($_POST['submitDelete'])){
        $username=$_POST['username'];
        $password=$_POST['passwordAdmin'];
        $link = mysqli_connect("localhost", "root", "", "tubes");
        $password=md5($password);
        $result = mysqli_query($link,"SELECT*FROM accountList WHERE Username='$user'");
        $finalResult = False;
        while($row = mysqli_fetch_row($result)){
            if($row[2]==$user && $row[5]==$password){
                $finalResult = True;
            }
        }
        if(!$finalResult){
            echo "<script>alert(\"Incorrect Password\")</script>";
        }else{
            $sql = "DELETE from accountList WHERE Username = '$username'";
            if(mysqli_query($link,$sql)){
                echo "<script>alert(\"Delete successfull\")</script>";
            }else{
                echo "<script>alert(\"Username not found\")</script>";
            }
        }
    }
?>