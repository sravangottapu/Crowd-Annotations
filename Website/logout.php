<!-- File that is using for logging out of the website-->

<?php
require_once 'core.inc.php';
$username = getuserfield('username');
$query_m = "SELECT id FROM paragraphs ORDER BY id LIMIT 1";
			$result_m = $connect->query($query_m);
			if($result_m->num_rows != 0)
			$row_m  = $result_m->fetch_assoc();
			$id_m = $row_m['id'];
			$value = $id_m;
	$query_o = "UPDATE users SET value = '$value' WHERE username = '$username'"; 
	$result_o = $connect->query($query_o);
session_unset();
session_destroy();
header('Location:index.php');
?>