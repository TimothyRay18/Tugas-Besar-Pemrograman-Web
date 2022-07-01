<?php
    if(isset($_GET['editSubmit'])){
        $link = mysqli_connect("localhost", "root", "", "tubes");
        $no = $_GET['no'];
        $name= $_GET['name'];
        $username= $_GET['username'];
        $email= $_GET['email'];
        $cPass= $_GET['currentPassword'];
        $cPass=md5($cPass);
        $pass= $_GET['confirmPass'];
        $pass=md5($pass);
        $result = mysqli_query($link,"SELECT*FROM accountList");
        while($row = mysqli_fetch_row($result)){
            $a[]=$row[5];
        }
        $cek=false;
        foreach($a as $value){
            if(strcmp($cPass,$value)==0){
                $cek=true;
            }
        }
        if($cek==false){
            echo "<script>alert(\"Currrent Password not match\")</script>";
            header('Location: ../welcome.php?page=editProfile');
        }else{
            $sql="UPDATE user SET Name='$name', Username='$username', Email='$email', Password='$pass' WHERE No='$no'";
            if(mysql_query($link,$sql)){
                echo "<script>alert(\"Profile has been updated\")</script>";
            }else{
                header('Location: ../welcome.php?page=editProfile');
            }
        }
    }
?>