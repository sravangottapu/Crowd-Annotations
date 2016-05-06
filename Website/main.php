<!-- This the first page after the display-->
<?php
 $connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)
	echo "connection error";
require 'core.inc.php';
if(!loggedin())
	{
		header('Location:login.php');
	}
 
 $username=getuserfield('username');
	  $surname=getuserfield('surname');
	 //echo $username;
 if(isset($_POST['submit']))
 {		$flag = 0; //Checking for file upload and text at once
 		$flag_new = 0;//Checking for file upload
	 if(!empty($_POST['title']))
	 {
		 $title = $_POST['title'];
		 $title = trim(strtolower(mysqli_real_escape_string($connect,$_POST['title'])));
		
		  if(!empty($_POST['upload_annotate']) && !empty($name))
		  {
		  	?>
		  		<script type="text/javascript">alert("Please choose either text or File type Input")</script>
		  	<?php
		  	$flag = 1;
		  }
		   if(isset($_FILES["file"]))
		 {
		 $count = 1;	
		 $name=$_FILES['file']['name'];
		 $size=$_FILES['file']['size'];
		 $type=$_FILES['file']['type']; 
		 $tmp_name = $_FILES['file']['tmp_name'];
		  $location = 'uploads/';
		  if(!empty($name))
		  	$flag_new = 1;
		/* $name = substr($str, 0, strrpos($name, '.'));
		 	while(file_exists("./uploads/".$name))
			{	
				$name = $name$count;
				$count = $count + 1;
			}
		*/
		  if($flag_new ==1 && $flag ==0)
		  {		

		  	if($size<15000000)
		  	{
		  	  if  (move_uploaded_file($tmp_name, "$location/$name")){
		  	

            $query_upload = "INSERT INTO uploads (username ,title,filename) VALUES ('".$username."','".$title."','".$name."')";
            $result = $connect->query($query_upload);
            if($result)
            {
            	?>
            <script type="text/javascript">alert("Your file has been Successfully Uploaded")</script>
            <?php
            }
            else{
            	?>
            		<script type="text/javascript">alert("File not uploaded. Check file size");</script>
            	<?php
            }
        }
}
     else {
       ?>
<script type="text/javascript">alert("file size exceeded");</script>
       <?php
    }

		  }
}
		 if(!empty($_POST['upload_annotate']) && flag == 0)
{	
	$text = mysqli_real_escape_string($connect,($_POST['upload_annotate'])).PHP_EOL;
	$file_name = $title.".txt";
		$count  = 1;
		while(file_exists("./uploads/".$file_name))
			{	echo "ok";
				$file_name = $title.$count.".txt";
				$count = $count + 1;
			}
		$myfile = fopen($file_name, "w+");
	fwrite($myfile,$title);
	fwrite($myfile,"\n");
	fwrite($myfile,"\n");
	fwrite($myfile, $text);
fclose($myfile);

 $query_upload = "INSERT INTO uploads (username ,title,filename) VALUES ('".$username."','".$title."','".$file_name."')";
 $result_new = $connect->query($query_upload);
 if(!$result_new)
 {
 	?>
<script type="text/javascript">alert("Connection problem");</script>
 	<?php
 }
rename($file_name,"uploads/".$file_name);
	if($username == "ashish_anand")
    $query = "INSERT INTO paragraphs (paragraph,username,title) VALUES ('$text','$username','$title')";
	else
		$query = "INSERT INTO paragraph_users (username,paragraph,title) VALUES ('$username','$text','$title')";
	$query_run = $connect->query($query);
	if(!$query_run)
	{
		?>
<script type="text/javascript">alert("Error in inserting the text");</script>
		<?php
	}


	header('Location:main.php');
}
else
{		if($flag_new == 0){
    	?>
<script type="text/javascript">alert("Empty Text field");</script>
	<?php
}
}
	 }
	 else{
	 		?>
<script type="text/javascript">alert("Empty Title field");</script>
	<?php
	 }

 }
 
 
?>

<html>
<head>

<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="Animations/animate.css">
 <script src="Animations/WOW-master/dist/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">Annotate me !</a>
</div>

</ul>
<ul class="nav navbar-nav navbar-right">
<?php
if($username == "ashish_anand")
{
	echo "<li> <a  href='show_all_annotations.php'>All annotations</a></li>";
		echo "<li> <a  href='show_uploads.php'>Show Uploads</a></li>";
		echo "<li> <a  href='show_part.php'>Document wise annotations</a></li>";
}
else
	echo "<li> <a  href='my_uploads.php'>My Uploads</a></li>";
?>
<li><a href="show_doc.php">List of Documents</a></li>
<li><a href="annonymous.php">annonymous</a> </li>

 <li>
                        <a  href="top_contributors.php">Top Contributors</a>
  </li>
 <li>
                        <a  href="change_password.php">Change Password</a>
  </li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>

</ul>
</div>
</nav>
<div class = "container">

<form action = "main.php" method = "post" role = "form" enctype="multipart/form-data">
<div class = "row"><div class = "col-md-2 col-md-offset-5">
<div class="wow bounceInLeft center">
<input type = "button" value = "annotate" id = "annotate" name = "annotate" class = "btn btn-success btn-block" onclick = "document.location.href='annotate.php'"></div></div></div></br>
<div class = "row"><div class = "col-md-4 col-md-offset-4">
<div class="wow bounceInRight center">
<input type = "button" value = "show my annotations" id = "show_annotate" class = "btn btn-success form-control" name = "show_annotate" onclick = "location.href='show.php'"></div></div></div> </br>
<div class="wow bounceInLeft center">
<div class = "row"><div class = "col-md-5 col-md-offset-4">
	Either choose a file or insert text to be annotated:
</div></div></div><br>

<div class = "row"><div class = "col-md-4 col-md-offset-4">
<div class="wow bounceInRight center">
	<input type = "text" class = "form-control" placeholder = "Document title" id = "title" name = "title">
</div></div></div><br>
<div class = "form-group"><div class = "row"><div class = "col-md-4 col-md-offset-4">
<div class="wow bounceInLeft center">
<textarea class = "form-control" id = "upload_annotate" name = "upload_annotate"></textarea></div></div></div></div> <br>
<div class = "form-group">
<div class="wow bounceInRight center">
<div class = "row"><div class = "col-md-4 col-md-offset-4">
<input id="file" class= "btn btn-success form-control" type="file" name="file"><br></br>
</div>
</div>
</div>
</div>
<div class = "form-group"><div class = "row"><div class = "col-md-4 col-md-offset-7">
</div></div></div><br>
<div class="wow bounceInUp">
<div class = "row"><div class = "col-md-2 col-md-offset-5"><input type = "submit" class = "btn btn-success btn-block"  value = "submit" name ="submit" id = "submit"></div></div>
</div>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
