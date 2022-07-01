<head>
    <title>Gallery</title>
	<style>
        form {
			background-color: #e5eecc;
			padding: 5px;
        }
    </style>
</head>
<body>
    <form>
		<h1>Your Hero</h1>
<?php
    if(!isset($_SESSION)) {
        session_start();	
    }
    if(isset($_COOKIE['login'])){
        $_SESSION['login'] = $_COOKIE['login'];
        $_SESSION['username'] = $_COOKIE['username'];
        $username=$_SESSION['username'];
    }
    $sql = mysqli_connect("localhost", "root", "", "tubes");
    $result = mysqli_query($sql, "SELECT * FROM hero WHERE Username='$username'");
    while($row = mysqli_fetch_row($result)){
        echo "<h2>$row[1]</h2>";
        echo "Class: $row[3]<br>";
        echo "Weapon: $row[4]<br>";
        echo "Pet: $row[6]<br>";
        echo "<img src=\"$row[8]\" width=\"200px\">";
        echo "<img src=\"$row[7]\" width=\"200px\">";
        echo "<img src=\"$row[5]\" width=\"200px\">";
    }
?>
		<h1>Other User's Hero</h1>
<?php
    $sql = mysqli_connect("localhost", "root", "", "tubes");
    $result = mysqli_query($sql, "SELECT * FROM hero WHERE Username <> '$username'");
    while($row = mysqli_fetch_row($result)){
        echo "<h1>$row[2]</h1>";
        echo "Name: $row[1]<br>";
        echo "Class: $row[3]<br>";
        echo "Weapon: $row[4]<br>";
        echo "Pet: $row[6]<br>";
        echo "<img src=\"$row[8]\" width=\"200px\">";
        echo "<img src=\"$row[7]\" width=\"200px\">";
        echo "<img src=\"$row[5]\" width=\"200px\">";
    }
?>
	</form>
</body>