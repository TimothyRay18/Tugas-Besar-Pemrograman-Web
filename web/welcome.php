<!DOCTYPE html>
<html>
    </head>
        <meta charset = "UTF-8">
		<meta name = "author" content = "DaTim (Dave & Timothy)">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style_global.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <?php
            if(!isset($_SESSION)) {
                session_start();	
            }
            if(isset($_COOKIE['login'])){
                $_SESSION['login'] = $_COOKIE['login'];
                $_SESSION['username'] = $_COOKIE['username'];
                $_SESSION['type'] = $_COOKIE['type'];
            }
            if($_SESSION['login']==false){
                header('Location:index.php');
            }else{
        ?>
        <div class="content">
            <?php
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    switch($page){
                        case 'addHero':
                            include "pagesAfterLogin/header/HeaderAddHero.html";
                            break;
                        case 'editProfile':
                            include "pagesAfterLogin/header/HeaderEditProfile.html";
                            break;
                        case 'gallery':
                            include "pagesAfterLogin/header/HeaderGallery.html";
                            break;
                        case 'logout':
                            header('Location:login/logout.php');
                            break;
                        case 'admin':
                            include "pagesAfterLogin/header/HeaderAdmin.html";
                            break;
                    }
                }else{
                    include "pagesAfterLogin/header/HeaderAddHero.html";
                }
            ?>

            <!--pilihan menu-->
            <div class="navbar">
                <?php
                    $username=$_SESSION['username'];
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                        if($page == 'addHero'){
                            echo '<a href= "welcome.php?page=addHero" class="active">Add Hero</a>';
                        }else{
                            echo '<a href= "welcome.php?page=addHero">Add Hero</a>';
                        }
                        if($page == 'editProfile'){
                            echo '<a href= "welcome.php?page=editProfile" class="active">Edit Profile</a>';
                        }else{
                            echo '<a href= "welcome.php?page=editProfile">Edit Profile</a>';
                        }
                        if($page == 'gallery'){
                            echo '<a href= "welcome.php?page=gallery" class="active">Gallery</a>';
                        }else{
                            echo '<a href= "welcome.php?page=gallery">Gallery</a>';
                        }
                        if($_SESSION['type']=="admin"){
                            if($page == 'admin'){
                                echo '<a href= "welcome.php?page=admin" class="active">Admin</a>';
                            }else{
                                echo '<a href= "welcome.php?page=admin">Admin</a>';
                            }
                        }
                        if($page == 'logout'){
                            echo "<a href= \"welcome.php?page=logout\" class=\"active\">LogOut ($username)</a>";
                        }else{
                            echo "<a href= \"welcome.php?page=logout\">LogOut ($username)</a>";
                        }

                        echo "<a href=\"index.php\">Back Home</a>";
                    }else{
                        echo "<a href= \"welcome.php?page=addHero\" class=\"active\">Add Hero</a>
                        <a href= \"welcome.php?page=editProfile\">Edit Profile</a>
                        <a href= \"welcome.php?page=gallery\">Gallery</a>";
                        if($_SESSION['type']=="admin"){
                            echo '<a href= "welcome.php?page=admin">Admin</a>';
                        }
                        echo "<a href= \"welcome.php?page=logout\">LogOut ($username)</a>";
                        echo "<a href=\"index.php\">Back Home</a>";
                    }
                ?>
            </div>

            <!--isi dari setiap menu-->
            <div class="article">
                <?php
                if(isset($_GET['page'])){
                    switch($page){
                        case 'addHero':
                            include "pagesAfterLogin/AddHero.php";
                            break;
                        case 'editProfile':
                            include "pagesAfterLogin/EditProfile.php";
                            break;
                        case 'logout':
                            header('Location:login/logout.php');
                            break;
                        case 'admin':
                            include "pagesAfterLogin/Admin.php";
                            break;
                        case 'gallery':
                            include "pagesAfterLogin/gallery.php";
                            break;
                    }
                }else{
                    include "pagesAfterLogin/AddHero.php";
                }
                ?>
            </div>
        </div>
        <?php
			include "pages/footer.html";
		?>

        <?php } ?>
    </body>
</html>