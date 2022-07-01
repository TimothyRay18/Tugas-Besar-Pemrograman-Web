<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<meta name = "author" content = "DaTim (Dave & Timothy)">
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/style_global.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div class="content">
			<?php 
				if(isset($_GET['page'])){
					$page = $_GET['page'];
					switch ($page) {
						case 'home':
							include "pages/header/HeaderHome.html";
							break;
						case 'contact':
							include "pages/header/HeaderContact.html";
							break;
						case 'gallery':
							include "pages/header/HeaderGallery.html";
							break;			
					}
				}else{
					include "pages/header/HeaderHome.html";
				}
			?>

			<!--pilihan menu-->
			<div class = "navbar">
				<?php
					if(isset($_GET['page'])){
						$page = $_GET['page'];
						if($page=='home'){
							echo "<a href = \"index.php?page=home\" class =\"active\">Home</a>";
						}else{
							echo '<a href = "index.php?page=home">Home</a>';
						}
						if($page=='contact'){
							echo '<a href = "index.php?page=contact" class ="active">Contact</a>';
						}else{
							echo '<a href = "index.php?page=contact">Contact</a>';
						}
						if($page=='gallery'){
							echo '<a href = "index.php?page=gallery" class ="active">Gallery</a>';
						}else{
							echo '<a href = "index.php?page=gallery">Gallery</a>';
						}
						if($page=='login'){
							echo '<a href="login/login.php" class ="active">Log In</a>';
						}else{
							echo '<a href="login/login.php">Log In</a>';
						}
						
					}else{
						echo "<a href = \"index.php?page=home\" class =\"active\">Home</a>
						<a href = \"index.php?page=contact\">Contact</a>
					  	<a href = \"index.php?page=gallery\">Gallery</a>
					  	<a href=\"login/login.php\">Log In</a>";
					}
				?>
			</div>
			
			<!--isi dari setiap menu-->
			<div class="article">
				<?php 
				if(isset($_GET['page'])){
					switch ($page) {
						case 'home':
							include "pages/home.php";
							break;
						case 'gallery':
							include "pages/gallery.html";
							break;			
						case 'contact':
							include "pages/contact.php";
							break;			
					}
				}else{
					include "pages/home.php";
				}
				?>
			</div>
		</div>
		
		<?php
			include "pages/footer.html";
		?>
	</body>
</html>