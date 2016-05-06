<?php
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
if(isset($_GET['search_text'])){
	$search_text = $_GET['search_text'];
	//echo $search_text;
}
else 
	echo "error found 1"; 
if(!empty($search_text)){
$query = "SELECT type FROM word_list WHERE type LIKE '".$search_text."%'";
if($connect->query($query))
{
	$result = $connect->query($query);
			if($result->num_rows!= 0)
		{
			 $rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach($rows as $row)
			{
				echo $row['type'],'<br>';
			}
		}
}
}
else 
	echo "error found 2"; 
?>