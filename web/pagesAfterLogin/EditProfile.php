<head>
    <title>Edit Profile</title>
	<style>
        form {
			background-color: #e5eecc;
			padding: 5px;
        }
    </style>
	<script>
        $(document).ready(function(){
            $(".formEdit").hide();
            $("#edit").click(function(){
                $(".formEdit").slideToggle("fast");
            });
            $(".changePass").hide();
            $("#editPass").click(function(){
                $(".changePass").slideToggle("fast");
            });
            $(".formPP").hide();
            $("#editPP").click(function(){
                $(".formPP").slideToggle("fast");
            });
        });
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
    </script>
</head>
<body>
<?php
    ob_start();
	if(!isset($_SESSION)) {
        session_start();	
    }
    if(isset($_COOKIE['login'])){
        $_SESSION['login'] = $_COOKIE['login'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
    $user=$_SESSION['username'];
    $sql = mysqli_connect("localhost", "root", "", "tubes");
    $result = mysqli_query($sql, "SELECT * FROM accountList WHERE username = '$user'");
    echo "<form>";
	while($row = mysqli_fetch_row($result)){
        if($row[7]==""){
            echo "<img src=\"login/Upload/manBlack.png\" alt=\"You haven't add a \" width=\"200px\"><br>";
            echo "Add Profile Picture<br>";
            
        }else{
            echo "<img src=\"$row[7]\" alt=\"You haven't add a photos\" width=\"200px\"><br>";
            echo "Change Profile Picture<br>";
        }
	echo "</form>";
    echo "<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">";
    echo "<input type=\"hidden\" name=\"no\" value=$row[0]>";
    echo '<input type="file" name="PP"><br>';
    echo "<input type=\"submit\" name=\"submitPP\" value=\"Change\">";
    echo "</form>";
    echo "<form><h2>Account $row[2]</h2>";
    echo "<table>";
	echo "<tr><td>Name:</td><td>$row[1]</td></tr>";
    echo "<tr><td>Gender:</td><td>$row[3]</td></tr>";
    echo "<tr><td>Email:</td><td>$row[4]</td></tr>";
    echo "<tr><td>Status:</td><td>$row[6]</td></tr>";
	echo "</table>";
?>
<button type="button" id="edit">Edit Profile</button></form>
<form action="" class="formEdit" method="post">
    <input type="hidden" name="no" value=<?php echo $row[0]?>>
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $row[1]?>"></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value=<?php echo $row[2]?>></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="email" name="email" value=<?php echo $row[4]?>></td>
		</tr>
		<tr>
			<td>Current Password:</td>
			<td><input type="password" name="currentPassword"></td>
		</tr>
		<tr>
			<td><button type="button" id="editPass">ChangePass</button></td>
		</tr>
	</table>
    <div class="changePass">
        <table>
			<tr>
				<td>New Password:</td>
				<td><input type="password" name="newPass" id="p1" value=""></td>
			</tr>
			<tr>
				<td>Confirm Password:</td>
				<td><input type="password" name="confirmPass" id="p2" onkeyup="cekPassword()" value=""></td>
			</tr>
			<tr>
				<td><span id="validPassword"></span></td>
			</tr>
		</table>
    </div>
    <input type="submit" name="editSubmit" value="submit"></submit>
</form>
<?php } ?>
<?php
    if(isset($_POST['editSubmit'])){
        $link = mysqli_connect("localhost", "root", "", "tubes");
        $no = $_POST['no'];
        $name= $_POST['name'];
        $username= $_POST['username'];
        $email= $_POST['email'];
        $cPass= $_POST['currentPassword'];
        $cPass=md5($cPass);
        $pass= $_POST['confirmPass'];
        $result = mysqli_query($link,"SELECT*FROM accountList WHERE Username='$user'");
        $finalResult = False;
        while($row = mysqli_fetch_row($result)){
            if($row[2]==$user && $row[5]==$cPass){
                $finalResult = True;
            }
        }
        if(!$finalResult){
            echo "<script>alert(\"Incorrect Password\")</script>";
        }else{
            if($pass==""){
                $sql="UPDATE accountList SET Name='$name', Username='$username', Email='$email' WHERE No='$no'";
                if(mysqli_query($link,$sql)){
                    echo "<script>alert(\"Profile has been updated\")</script>";
                }
            }else{
                $pass=md5($pass);
                $sql="UPDATE accountList SET Name='$name', Username='$username', Email='$email', Password='$pass' WHERE No='$no'";
                if(mysqli_query($link,$sql)){
                    echo "<script>alert(\"Profile or Pasword has been updated\")</script>";
                }
            }
        }
        header('Refresh:0');
    }
?>
<?php
    if(isset($_POST['submitPP'])){
        $no=$_POST['no'];
        echo "<form>";
		if($_FILES["PP"]["error"]>0){
            echo "<script>alert(\"Input your profile picture\")</script>";
        }else{
            $path = "login/Upload/".basename(($_FILES["PP"]["name"]));
            if(file_exists("login/Upload/".$_FILES["PP"]["name"])){
                echo $_FILES["PP"]["name"]." already exists. ";
            }else{
                move_uploaded_file($_FILES["PP"]["tmp_name"], "login/Upload/".$_FILES["PP"]["name"]);
            }
            $link = mysqli_connect("localhost", "root", "", "tubes");
            $sql="UPDATE accountList SET Foto='$path' WHERE No='$no'";
            if(mysqli_query($link,$sql)){
                echo "<script>alert(\"Profile Picture has been change\")</script>";
            }
        }
		echo "</form>";
        header('Refresh:0');
    }
	ob_flush();
?>
</body>