<!-- Helps in establishing sessions and checking if user is logged in or not in every page-->

<?php 
ob_start();
session_start();
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
$current_file=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
	$http_referer=$_SERVER['HTTP_REFERER'];
	}
	if(!function_exists("loggedin"))
	{
function loggedin()
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		return true;
	else
		return 
	false;
}
}
if(!function_exists("getuserfield"))
{
function getuserfield($field)
{
	$connect = mysqli_connect('localhost','root','','annotated_words');
	$query="SELECT $field FROM users WHERE id='".$_SESSION['user_id']."'";
if($r=$connect->query($query))
{
    $row = $r->fetch_assoc()[$field];  	
	return $row;
}
	}
}
?>
