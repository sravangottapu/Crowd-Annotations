<?php
require_once 'core.inc.php';
	if(isset($_POST['submit']))             //mysqli_result Object ( [current_field] => 0 [field_count] => 2 [lengths] => [num_rows] => 0 [type] => 0 ) okChecks if the form is submitted
{
	if(loggedin()){
		$username = getuserfield('username');
	if(!empty($_POST['Text']))
	{
		$flag = 0;
			$number = 1;
		$word = $_POST['Text'];
		$word = strtolower($word);
		if(!empty($_POST['url']))
			$url = mysqli_real_escape_string($connect,$_POST['url']);
		else
			$url = "unspecified";
		if(!empty($_POST['labelnew']))
			$type = $_POST['labelnew'];
		 
			if(isset($_POST['labels'])&&!empty($_POST['labels']))
				$type = $_POST['labels'];
			 
				if(isset($_POST['labels']) && !empty($_POST['labelnew']) &&!empty($_POST['labels'])&& isset($_POST['labelnew']))
				{
					echo "Select a single input type.";
					$flag =1 ;
				}
				if(!isset($_POST['labels']) && empty($_POST['labelnew']))
				{
					echo "Select a category";
					$flag =1 ;
				}
	if($flag ==0){
		$query_o = "INSERT INTO word_list_web (username,word ,category,document) VALUES ('$username','$word','$type','$url')";
	$result_o = $connect->query($query_o);
	if(!$result_o)
		echo "Connection Error";
//For updating the count in the name of user
	$query4 = "SELECT points FROM users WHERE username = '$username'"; 
		$result4 = $connect->query($query4);
			if($result4->num_rows!= 0)
		{
			 
			$row4 = $result4->fetch_assoc();                  //Converts the result to an associative array
			//echo "Successfully Annotated";
			$points = $row4['points'];
			$points += 1;
			$update4 = $connect->query("UPDATE users SET points = '$points' WHERE username = '$username'");//Updates the count by 1
		
			}
//end
		$query3 = "SELECT word,frequency FROM word_list WHERE word = '$word' AND type = '$type'"; 
		$result = $connect->query($query3);
			if($result->num_rows!= 0)
		{
			 
			$row = $result->fetch_assoc();                  //Converts the result to an associative array
			echo "Successfully Annotated";
			$frequency = $row['frequency'];
			$frequency += 1;
			$update = $connect->query("UPDATE word_list SET frequency = '$frequency' WHERE word = '".$word."' AND type ='".$type."'");//Updates the count by 1
		
			
			}
		
				else{
			
			$query = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$number' )";//If word donot exists creates a new row for the word
			if(!$query)
				echo "Connection ERROR";
			if($connect->query($query)){
echo "Successfully Annotated";
			}
		
	}
		
		
	}
	}
}
else{
echo "Please login to annotate";
//echo "<a href = 'http://localhost/team2/login.php'>Login<a/>";
}
 }

 
?>