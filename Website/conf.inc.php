
<!-- File that builds the database connection in every page.-->
<?php
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
?>