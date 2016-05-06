<!-- This file helps in changing the password when the user is logged in-->

<?php
require 'core.inc.php';
if(!loggedin())
{
	header('Location:index.php');
}
 $username = getuserfield('username');
if(isset($_POST['submit']))
{
	$curr_pswd = mysqli_real_escape_string($connect,$_POST['curr_pswd']);
	$new_pswd = mysqli_real_escape_string($connect,$_POST['new_pswd']);
	$re_new_pswd = mysqli_real_escape_string($connect,$_POST['re_new_pswd']);
	if(!empty($curr_pswd) && !empty($new_pswd) && !empty($re_new_pswd))
	{
		$curr_pswd = md5($curr_pswd);
		$new_pswd = md5($new_pswd);				//md5 hash of password
		$re_new_pswd = md5($re_new_pswd);
		$query = "SELECT password FROM users WHERE username = '$username'";
		$result = $connect->query($query);
		if($result->num_rows != 0)
		{
			$row = $result->fetch_assoc();
			$password = $row['password'];
			if($curr_pswd == $password)				//To check if the current password matches the original password
			{
				if($new_pswd == $re_new_pswd)		//To check if the newly entered password matches in bot the columns
				{
					$query_update = "UPDATE users SET password = '$new_pswd' WHERE username = '$username'";
					if($result = $connect->query($query_update))
					{
						?>
						<script type="text/javascript">alert("Your password has been successfully updated");</script>
						<?php
					}
				}
				else
				{
					?>
					<script type="text/javascript">alert("Please enter the new password correctly");</script>
					<?php
				}
			}
			else
			{
				?>
				<script type="text/javascript">alert("Your Current donot match");</script>
				<?php
			}
		}
	}
}
?>

<html>
<head>
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
<title>Change Password</title>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="main.php">Annotate me !</a>
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
<li>
                        <a  href="top_contributors.php">Top Contributors</a>
  </li>
<li><a href="show_doc.php">List of Documents</a></li>
<li><a href="show.php">Show annotations</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>

</ul>
</div>
</nav>
<div class = "container">
<form action = "change_password.php" method = "post" role = "form" enctype="multipart/form-data">
</br></br></br></br>
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<input type = "password" class = "form-control" name = "curr_pswd" placeholder="Current Password">
	</div>
</div>
</div>
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<input type = "password" class = "form-control" name = "new_pswd" placeholder="New Password">
	</div>
</div>
</div>
<div class = "row">
<div class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<input type = "password" class = "form-control" name = "re_new_pswd" placeholder="Re-enter New Password">
	</div>
</div>
</div>
<div class = "row">
<div class = "col-md-4 col-md-offset-5">
<input type = "submit" class = "btn btn-success" name= "submit" value = "Change Password">
</div>
</div>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
