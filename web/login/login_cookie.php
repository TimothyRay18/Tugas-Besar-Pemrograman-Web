<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password1 = md5($password);

    $con=mysqli_connect("localhost","root","","tubes");
    $arr_user=array();
    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: ".mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM accountList where Username = '$username' and Password = '$password1'");
    $finalResult = False;
    while($row = mysqli_fetch_row($result)){
        if($row[2]==$username && $row[5]==$password1){
            $finalResult = True;
            $_SESSION['login']=True;
            $_SESSION['username']=$row[2];
            $_SESSION['type']=$row[6];
            if(isset($_POST['remember'])){
                setcookie('login','true',time()+3600);
                setcookie('username',$row[2],time()+3600);
                setcookie('type',$row[6],time()+3600);
            }
        }
    }
    
    if($finalResult){
        header('Location: ../welcome.php');
    }else{
        header('Location: login.php');
    }
?>