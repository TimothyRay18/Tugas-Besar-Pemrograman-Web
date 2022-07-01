<head>
    <title>Add Hero</title>
    <style>
        form {
			background-color: #e5eecc;
			padding: 5px;
        }
    </style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
    <h2>Input your Character Detail</h2>
    <table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Character's Picture:</td>
			<td><input type="file" name="heroPic"></td>
		</tr>
		<tr>
			<td>Gender:</td>
			<td>
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female
			</td>
		</tr>
		<tr>
		<td>Choose Class:</td>
		<td>
		<select name="class">
			<option value="Weapon Master">Weapon Master</option>
			<option value="Mage">Mage</option>
			<option value="Target Man">Target Man</option>
			<option value="Marksman">Marksman</option>
			<option value="Support">Support</option>
			<option value="Assasin">Assasin</option>
		</select>
		</td>
		</tr>
		<tr>
			<td>Weapon's Name:</td>
			<td><input type="text" name="weaponName"></td>
		</tr>
		<tr>
			<td>Weapon's Picture:</td>
			<td><input type="file" name="weaponPic"></td>
		</tr>
		<tr>
			<td>Pet's Name:</td>
			<td><input type="text" name="petName"></td>
		</tr>
		<tr>
			<td>Pet's Picture:</td>
			<td><input type="file" name="petPic"></td>
		</tr>
	</table>
	<input type="submit" name="AddHero" value="Add Character">
</form>
<?php
    if(!isset($_SESSION)) {
        session_start();	
    }
    if(isset($_COOKIE['login'])){
        $_SESSION['login'] = $_COOKIE['login'];
        $_SESSION['username'] = $_COOKIE['username'];
    }
    if(isset($_POST['AddHero'])){
        $name= $_POST['name'];
        $name=ucwords($name);
        $weapon= $_POST['weaponName'];
        $weapon=ucwords($weapon);
        $pet= $_POST['petName'];
        $pet=ucwords($pet);
        $class= $_POST['class'];
        $username = $_SESSION['username'];
        
        if($name == "" || $weapon == "" || $pet = ""){
            echo "<script>alert(\"Please Fill All The Blank Space\")</script>";
        }else{
            if($_FILES["petPic"]["error"]>0 || $_FILES["heroPic"]["error"]>0 || $_FILES["weaponPic"]["error"]>0){
                echo "<script>alert(\"Please Fill All The Blank Space\")</script>";
            }else{
                $path_pet = "Upload/pet/".basename(($_FILES["petPic"]["name"]));
                if(file_exists("Upload/pet/".$_FILES["petPic"]["name"])){
                    echo $_FILES["petPic"]["name"]." already exists. ";
                }else{
                    move_uploaded_file($_FILES["petPic"]["tmp_name"], "Upload/pet/".$_FILES["petPic"]["name"]);
                }

                $path_pic = "Upload/character/".basename(($_FILES["heroPic"]["name"]));
                if(file_exists("Upload/character/".$_FILES["heroPic"]["name"])){
                    echo $_FILES["heroPic"]["name"]." already exists. ";
                }else{
                    move_uploaded_file($_FILES["heroPic"]["tmp_name"], "Upload/character/".$_FILES["heroPic"]["name"]);
                }

                $path_weapon = "Upload/weapon/".basename(($_FILES["weaponPic"]["name"]));
                if(file_exists("Upload/weapon/".$_FILES["weaponPic"]["name"])){
                    echo $_FILES["weaponPic"]["name"]." already exists. ";
                }else{
                    move_uploaded_file($_FILES["weaponPic"]["tmp_name"], "Upload/weapon/".$_FILES["weaponPic"]["name"]);
                }

                $link = mysqli_connect("localhost","root","","tubes");
                $sql="INSERT INTO hero (name, username, class, weapon_name, weapon_pic, pet_name, pet_pic, picture) VALUES ('$name','$username','$class','$weapon','$path_weapon','$pet','$path_pet','$path_pic')";
                if(mysqli_query($link,$sql)){
                    echo "<script>alert(\"Your Character has been record\")</script>";
                }else{
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($link)."<br>";
                }
            }
        }
    }
?>
</body>