<?php
require 'core.inc.php';
if(!isset($_SESSION['id']) || !isset($_SESSION['time']))
{
	header("Location:forgot_password.php");
}
$new_time = time();
$time = $_SESSION['time'];
$new_time = $new_time - 60;
if($new_time>$time)
{
	header("Location:forgot_password.php");
}
if(isset($_POST['submit']))
{
	$new_pswd = $_POST['new_pswd'];
	$re_new_pswd = $_POST['re_new_pswd'];
	if(!empty($new_pswd) && !empty($re_new_pswd))
	{
		if($new_pswd == $re_new_pswd)
		{
			if(isset($_SESSION['id']))
			{
				$new_pswd = mysqli_real_escape_string($new_pswd);
				$new_pswd = md5($new_pswd);
				$id = $_SESSION['id'];
				$connection1 = mysqli_connect('localhost','root','','annotated_words');
				$sql = "UPDATE users SET password='$new_pswd' WHERE id='$id'";
				$result1 = $connection1->query($sql);
				header("Location:login.php");
			}
		}
	}
}
?>
<h
<html>
<head>
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="Animations/animate.css">
 <script src="Animations/WOW-master/dist/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
<title>Set a New Password</title>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="main.php">Annotate me !</a>
</div>

</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="index.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Jump to main page</a></li>

</ul>
</div>
</nav>
<div class = "container">
<center><h2>Set up your New password</h2></center>
<h3>You got one minute to do!</h3>
<form action = "new_password.php" method = "post" role = "form" enctype="multipart/form-data">
</br>
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInLeft center">
	<input type = "password" class = "form-control" name = "new_pswd" placeholder="New Password">
	</div></div>
</div>
</div>
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInRight center">
	<input type = "password" class = "form-control" name = "re_new_pswd" placeholder="Re-enter New Password">
	</div></div>
</div>
</div>
<div class = "row">
<div class = "col-md-4 col-md-offset-5"><div class="wow bounceInUp">
<input type = "submit" class = "btn btn-success" name= "submit" value = "Change Password">
</div></div>
</div>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
