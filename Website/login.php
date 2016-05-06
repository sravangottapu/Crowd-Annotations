<!--Login page of the website-->

<html>
<head>
<!--<link rel="stylesheet" type="text/css" href="basic.css"/>-->
<title>Annotate Me</title>
</head>
<body>


</body>
</html>
<?php
require_once 'core.inc.php';
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
	if(isset($_POST['submit'])){
		if($_POST['submit']){
			if(isset($_POST['username']) && isset($_POST['password']))
			{	
				$username=$_POST['username'];
				$password=$_POST['password'];
				$password_hash=md5($password);
				if(!empty($username) && !empty($password))
				{
					$query="SELECT id FROM users WHERE username='".$username."' AND password='".$password_hash."'";
					$result = $connect->query($query); 

					if($result)
					{	
						$query_num_rows=$result->num_rows;
						if($query_num_rows==0)
							{?>

							<script>alert("Invalid name or Password");</script>
							<?php
							}
						else if($query_num_rows==1)
						{	
							$row =0;
							$field = 'id';
							if($result->num_rows==0) return 'unknown'; 
							$result->data_seek($row);
							$ceva=$result->fetch_assoc(); 
							$rasp=$ceva[$field]; 


							$user_id=$rasp;
							$_SESSION['user_id']=$user_id;
							header('Location: index.php');
						}

					}

				}
			}
		}
	}
if(isset($_POST['register'])){
	if($_POST['register'])
	{

		header('Location: register.php');
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
<div id="container">
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="#">Annotate me !</a>
</div>

</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="forgot_password.php">Forgot Password</a></li>
<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

</ul>
</div>
</nav>
<div id = "rows"></br></br></br></br></br></div>
<div class="login">
<form action="<?php echo $current_file; ?>" role = "form"  method="POST">
<div class = "rows">
<div class="col-xs-3 col-xs-offset-4">
<div class="form-group">
<div class="wow bounceInLeft center">
<label for="username">Username:</label>
<input type="text" name="username" placeholder="Username" class = "form-control">
</div></div></div></div></br>
<div class = "rows">
<div class="col-xs-3 col-xs-offset-4">
<div class="form-group"></br>
<div class="wow bounceInRight center">
<label for="password">Password:</label>
<input type="password" name="password" class = "form-control" placeholder="Password"></br>
</div></div></div></div></br>
</br></br></br><br>
<div class = "rows">
<div class="col-md-1 col-md-offset-5">
  <div class="wow bounceInUp">
<input type="submit" class="btn btn-success btn-block" value="Log in" name="submit" id="login"></div></div></div> 
</br></br>
<!--
<div class = "rows">
<div class="col-xs-4 col-xs-offset-4">
<strong>New User</strong> </br></br>
<div id="register"><input type="submit" class="btn btn-info" value="Register" name="register" id="register"></div></div></div>-->
</form>
</div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

</body>
</html>

