<!-- File that is responsible for 
signing up new isers.-->
<html>
<head>
<!-- <link rel="stylesheet" type="text/css"  href="basic.css"/>-->
</head>
<body>
</body>
</html>
<?php 

require 'core.inc.php';
 
if(!loggedin())
   { 
	if(isset($_POST['username']) && isset($_POST['question']) &&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['question2']))
		{   $email=$_POST['email'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$password_again=$_POST['password_again'];
			$password_hash=md5($password);
			$firstname=$_POST['firstname'];
			$surname=$_POST['surname'];
			$question = $_POST['question'];
			$question2 = $_POST['question2'];
			$question2 = md5($question2);
			$question = md5($question);
			if(!empty($username) && !empty($password) && !empty($password_again) && !empty($firstname) && !empty($surname) && !empty($email)&& !empty($question) && !empty($question2))
			{
				if($password!=$password_again)
				{
					echo 'password donot match';
				}
				else if(filter_var($email,FILTER_VALIDATE_EMAIL)==false)
				{
					echo "Enter a valid email id";
				}
				 
else{
 $query = "SELECT username FROM users WHERE username = '".$username."'"; 

$result = $connect->query($query);
if($result->num_rows==1)
{
	echo 'username exists';
}
else{

$query = "INSERT INTO users (username,password,question,question2,firstname,surname,email) VALUES ('$username' ,'$password_hash','$question','$question2','$firstname','$surname','$email')"; 
$result_o = $connect->query($query);
 if($result_o)
{	
	$freq = 0;
	 
	$query_m = "SELECT id FROM paragraphs ORDER BY id LIMIT 1";
			$result_m = $connect->query($query_m);
			if($result_m->num_rows != 0)
			$row_m  = $result_m->fetch_assoc();
			$id_m = $row_m['id'];
			$value = $id_m;
	$query_o = "UPDATE users SET value = '$value' WHERE username = '$username'"; 
	$result_o = $connect->query($query_o);
	$points = 0;
	$query_oo = "UPDATE users SET points = '$points' WHERE username = '$username'"; 
	$result_oo = $connect->query($query_oo);
	header('Location: login.php');
}
else{
	echo 'sorry';
}
}
}
				 
			}
		else{
			echo 'all fields are required';
		}
		
	}
	
	?>
	<html>
<head>
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="Animations/animate.css">
 <script src="Animations/WOW-master/dist/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>
<div class="container">
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
 

  <div class = "row">
  <div class = "col-md-8 col-md-offset-2">
<div class = "panel panel-success">
   <div class = "panel-heading">
      <h3 class = "panel-title">
         REGISTER
      </h3>
   </div>
   
    <div class = "panel-body">
	<form action="register.php" method="post" role = "form">
	<div id = "rows"></br></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInLeft center">
	<label for="username">Username:</label> <input type="text" name="username" maxlength="30" placeholder="Username" class = "form-control" value="<?php if(isset($username)){echo $username;}?>" placeholder="Username">
	</div>
	</div>
	</div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInRight center">
	<label for = "password">Password:</label><br> <input type="password" class = "form-control" name="password" placeholder="[a-z],[A-Z],[0-9],symbols"> 	</div>
	</div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInLeft center">
	<label for = "re-password">Re-enter Password:</label><br> <input type="password" class = "form-control" name="password_again" placeholder="Password-again">
	</div>
	</div>
	</div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInLeft center">
	<label for="question">Which cricketer you like the most:</label> 
	<input type="text" name="question" maxlength="30" placeholder="it's a security question" class = "form-control" value="">
		</input>
	</div></div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group"><div class="wow bounceInRight center">
	<label for="question2">Enter the most liked article:</label> 
	<input type="text" name="question2" maxlength="30" placeholder="it's a security question" class = "form-control" value="">
		</input></div>
	</div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInLeft center">
	<label for = "firstname">First name:</label><br><input type="text" name="firstname" class = "form-control" maxlength="40" placeholder="First Name" value ="<?php if(isset($firstname)){echo $firstname ;}?>" placeholder="First name">	</div>
	</div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInRight center">
	<label for = "surname">Lastname:</label><br><input type="text" name="surname" class = "form-control" maxlength="40" placeholder="Surname"value="<?php if(isset($surname)){echo $surname;}?>" placeholder="Surname">	</div>
	</div></div>
	<div id = "row" class = "col-md-4 col-md-offset-4">
	<div class = "form-group">
	<div class="wow bounceInLeft center">
	<label for = "email">Email ID:</label><br><input type="text" name="email" class = "form-control" placeholder="Email ID"value="<?php if(isset($email)) {echo $email;}?>" placeholder="Email Address">	</div>
	</div> </div></div>
	<div class = "rows">
	<div class = "col-md-4 col-md-offset-4"><div class = "form-group">
	<div class="wow bounceInUp">
	<input type="submit" value="Register" class = "btn btn-success btn-block"><br>
	</div></div></div>
	</div> 
	</form>
	</div></div> 
	</div></div> 
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</body>
	</html>
 	
<?php
	}
else  
echo 'youre logged in';
 
?>