<head>
    <title>Contact | DaTim Project</title>
    <style>
		.main {   
			-ms-flex: 100%; 
			flex: 100%;
			background-color: white;
			padding: 20px;
		}
		
		.SubmitButton {
			color: #494949;
			text-transform: uppercase;
			text-decoration: none;
			background: #ffffff;
			padding: 10px;
			border: 4px solid #494949;
			display: inline-block;
			transition: all 0.4s ease 0s;
		}
		
		.SubmitButton:hover {
			color: #ffffff;
			background: #494949;
			border-color: #494949;
			transition: all 0.4s ease 0s;
		}
	</style>
</head>
<body>
    <div class="row">
        <div class="main">
            <p>
                Email     : <a href = "mailto:dave01nathaniel@gmail.com">dave01nathaniel@gmail.com</a>
                <br><br>
                Instagram : dave_nathan
                <br><br>
                Email     : <a href = "mailto:timothy.ray1802@gmail.com">timothy.ray1802@gmail.com</a>
                <br><br>
                Instagram : timothyray_
            </p>
            <h2>Would You Like to Add a Comment?</h2>
            <form id="myForm" action="" method="post">
                <fieldset> 
                    <legend>Your Details:</legend> 
                        <p>Name :<input type="text" name="name" id="name"size = "40"></p>
                        <p>E-mail :<input type="email" name="email"id="email" size = "40"></p> 
                </fieldset>
                    <br>
                <fieldset> 
                    <legend>Your Review:</legend> 
                        <br> 
                        Would you like to visit again?
                        <br>
                            <input type = "radio" id = "choice1" name = "contact" value = "yes" checked>
                                <label for = "contactchoice1">Yes</label>
                            <input type = "radio" id = "choice2" name = "contact" value = "no">
                                <label for = "contactchoice2">No</label>
                            <input type = "radio" id = "choice3" name = "contact" value = "maybe">
                                <label for = "contactchoice2">Maybe</label>
                        <br>
                        <br>
                        Comments:
                        <br>
                            <textarea name="comment" rows="5" cols="40" placeholder="Write Something here..."></textarea>
                        <br>
                        <br>
                        <input type="submit" name="formSubmit" value="submit" class="SubmitButton">
                </fieldset>	
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['formSubmit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $visit=$_POST['contact'];
        $comment=$_POST['comment'];
        date_default_timezone_set("Asia/Jakarta");
        $path_file= "../file text/comment.txt";
        $file=fopen($path_file,'a');
        fwrite($file,"Date: ".date( "Y-m-d H.i.s\n")."name: $name \nemail: $email \nvisit: $visit\ncomment: $comment\n\n");
        fclose($file);
        $link = mysqli_connect("localhost","root","","tubes");
        if($name != "" && $email != ""){
            $sql = "INSERT INTO commentList(name,email,visit,comments) VALUE ('$name','$email','$visit','$comment')";
            mysqli_query($link,$sql);
            echo "<script>alert(\"Your Review Has Been Submitted!\")</script>";
        }else{
            echo "<script>alert(\"Please Fill All The Blank Space\")</script>";
        }
    }
    ?>
</body>