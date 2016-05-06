<?php
require 'core.inc.php';
if(1==1)
{
	if(isset($_POST['username']) && isset($_POST['question']) && isset($_POST['question2']))
	{
		$username = $_POST['username'];
		$question = $_POST['question'];
		$question2 = $_POST['question2'];
		$question = mysqli_real_escape_string($question);
		$question2 = mysqli_real_escape_string($question2);
		$question = md5($question);
		$question2 = md5($question2);
		if(!empty($username) && !empty($question))
		{
			$connection = mysqli_connect('localhost','root','','annotated_words');
			$query="SELECT * FROM users WHERE username='$username' AND question2='$question2' AND question='$question'"; 
			$result = $connection->query($query);
			if($result->num_rows != 0)
			{
				$row_k  = $result->fetch_assoc();
				$id_k = $row_k['id'];
				$value_k = $id_k;
				$t = time();
				$_SESSION['time'] = $t;
				$_SESSION['id'] = $id_k;
				header("Location:new_password.php");
			}
			else
			{?>
					<script>alert("Invalid answers or your username dosen't match");</script>

		<?php
			}


		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
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
<li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Let me in !</a></li>

</ul>
</div>
</nav>

<form action="forgot_password.php" method="post" role = "form">
	<div id = "rows"></br></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInLeft center">
	<label for="username">Username:</label> 
	<input type="text" name="username" maxlength="30" placeholder="Username" class = "form-control" value="<?php if(isset($username)){echo $username;}?>" placeholder="Username">
	</div>
	</div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInRight center">
	<label for="question">Which cricketer you like the most:</label> 
	<input type="text" name="question" maxlength="30" placeholder="it's a security question" class = "form-control" value="">
		</input>
	</div></div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInLeft center">
	<label for="question2">Enter the most liked article:</label> 
	<input type="text" name="question2" maxlength="30" placeholder="it's a security question" class = "form-control" value="">
		</input>
	</div></div></div>
	<div class = "rows"><div class="wow bounceInUp">
	<div class = "col-md-4 col-md-offset-4"><div class = "form-group">
	<input type="submit" value="forgot password" class = "btn btn-success btn-block"><br>
	</div></div></div>
</form>
</body>
</html>
