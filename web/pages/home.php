<head>
    <title>Home | DaTim Project</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
	<script> 
		$(document).ready(function(){
			$("#side-01").click(function(){
				$("#side-01-open").slideToggle("slow");
			});
		});
		$(document).ready(function(){
			$("#side-02").click(function(){
				$("#side-02-open").slideToggle("slow");
			});
		});
</script>
	<style>
		.side {
			-ms-flex: 35%; 
			flex: 35%;
			background-color: #f1f1f1;
			padding: 20px;
		}
		
		#side-01-open, #side-02-open, #side-01, #side-02 {
			padding: 5px;
			text-align: center;
			background-color: #e5eecc;
			border: solid 1px #c3c3c3;
		}

		#side-01-open, side-02-open {
			padding: 50px;
			display: none;
		}
		
		table, th, td {
			border: 1px solid black;
		}
			
		th {
			background-color: gray;
			color: white;
		}
			
		ul {
			display: table; 
			margin: 0 auto; 
			list-style-type: circle;
		}
		
		.profile {
			alt: Profile; 
			height: 300px; 
			width: 200px; 
			display: block; 
			margin-left: auto; 
			margin-right: auto;
		}
		
		.main {   
			-ms-flex: 65%; 
			flex: 65%;
			background-color: white;
			padding: 20px;
		}
	</style>
</head>
<body>
<?php
    $xml=simplexml_load_file("../xml/owner.xml");
    foreach($xml->children() as $value){
        $biodata[] = $value;
    }
    foreach($biodata[0]->children() as $value){
        $dave[] = $value;
    }
    foreach($biodata[1]->children() as $value){
        $timothy[] = $value;
    }
?>
    <div class="row">
        <div class="side">
            <h2 align = "center">About Us</h2>
            <div id = "side-01">About Dave</div>
			<div id = "side-01-open">
				<h5 align = "center">Photo of me:</h5>
				<img class = "profile" src = "../images/photo.jpg" width = "200px" height = "300px">
                <br>
                <table align = "center">
					<tr>
						<th colspan = "2">Name</th>
                        </tr>
                        <tr>
                <?php
                        echo "<td colspan = \"2\" align = \"center\">$dave[0]</th>";
                ?>
					</tr>
					<tr>
						<th colspan = "2">Education Profile</th>
					</tr>
					<tr>
                        <td>Elementary School</td>
                <?php
                        echo "<td>$dave[1]</td>";
                ?>
					</tr>
					<tr>
                        <td>Junior High School</td>
                <?php
                        echo "<td>$dave[2]</td>";
                ?>
					</tr>
					<tr>
                        <td>Senior High School</td>
                <?php
                        echo "<td>$dave[3]</td>";        
                ?>
					</tr>
					<tr>
                        <td>College</td>
                <?php
                        echo "<td>$dave[4]</td>";
                ?>
					</tr>
                </table>
				<br>
				<h2 align = "center">My Hobby</h2>
					<ul>
                        <?php
                            foreach($dave[5]->children() as $value){
                                echo "<li>$value</li>";
                            }
                        ?>
					</ul>
			</div>
			<div id = "side-02">About Timothy</div>
			<div id = "side-02-open">
				<h5 align = "center">Photo of me:</h5>
				<img class = "profile" src = "../images/photo-02.jpg" width = "200px" height = "300px">
                <br>
                <table align = "center">
					<tr>
						<th colspan = "2">Name</th>
                        </tr>
                        <tr>
                <?php
                        echo "<td colspan = \"2\" align = \"center\">$timothy[0]</th>";
                ?>
					</tr>
					<tr>
						<th colspan = "2">Education Profile</th>
					</tr>
					<tr>
                        <td>Elementary School</td>
                <?php
                        echo "<td>$timothy[1]</td>";
                ?>
					</tr>
					<tr>
                        <td>Junior High School</td>
                <?php
                        echo "<td>$timothy[2]</td>";
                ?>
					</tr>
					<tr>
                        <td>Senior High School</td>
                <?php
                        echo "<td>$timothy[3]</td>";        
                ?>
					</tr>
					<tr>
                        <td>College</td>
                <?php
                        echo "<td>$timothy[4]</td>";
                ?>
					</tr>
                </table>
				<br>
				<h2 align = "center">My Hobby</h2>
					<ul>
                        <?php
                            foreach($timothy[5]->children() as $value){
                                echo "<li>$value</li>";
                            }
                        ?>
					</ul>
			</div>
        </div>
        <div class="main">
            <h2>Video Games Inspiration</h2>
            <section>
                <img class="mySlides" src="../images/COD_MW.jpg" width="100%" height="350px">
                <img class="mySlides" src="../images/DS2.jpg" width="100%" height="350px">
                <img class="mySlides" src="../images/SW_JFO.jpg" width="100%" height="350px">
                <img class="mySlides" src="../images/RMEL.png" width="100%" height="350px">
            </section>
            <script>
                // Automatic Slideshow - change image every 3 seconds
                var myIndex = 0;
                carousel1();

                function carousel1() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                x[myIndex-1].style.display = "block";
                setTimeout(carousel1, 3000);
                }
            </script>
            <br>
            <h2>Some Bands That Supported This Website</h2>
            <section>
                <img class="MySlides" src="../images/OLN.jpg" width="100%" height="300px">
                <img class="MySlides" src="../images/Metallica.jpg" width="100%" height="300px">
                <img class="MySlides" src="../images/Avenged_Sevenfold.png" width="100%" height="300px">
            </section>
            <script>
                // Automatic Slideshow - change image every 5 seconds
                var myIndex = 0;
                carousel2();

                function carousel2() {
                var i;
                var x = document.getElementsByClassName("MySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                x[myIndex-1].style.display = "block";
                setTimeout(carousel2, 5000);
                }
			</script>
        </div>
    </div>
</body>