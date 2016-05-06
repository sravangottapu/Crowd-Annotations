<!-- This file is responsible for inserting the words in the database that are inserted through the extension-->

<?php
require_once 'core.inc.php';
$annonymous = 0;
$connect = mysqli_connect('localhost','root','','annotated_words');
if(isset($_POST['submit']))             
//mysqli_result Object ( [current_field] => 0 [field_count] => 2 [lengths] => [num_rows] => 0 [type] => 0 ) okChecks if the form 	is submitted
{
	if(isset($_POST['annonymous'])&& !empty($_POST['annonymous']))
	{
		$annonymous = 1;
	}
	if(loggedin() && $annonymous == 0)
	{
		$username = getuserfield('username');
		if(!empty($_POST['Text']))
		{


			
			$flag_var = 0;
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
				$flag_var =1 ;
			}
			if(!isset($_POST['labels']) && empty($_POST['labelnew']))
			{
				echo "Select a category";
				$flag_var =1 ;
			}






			if($flag_var ==0)
			{
				$query_o = "INSERT INTO word_list_web (username,word ,category,document) VALUES ('$username','$word','$type','$url')";
				//$query_o = "INSERT INTO word_list_web (word) VALUES ('$word')";
				$result_o = $connect->query($query_o);
				if(!$result_o)
					echo "Connection Error";




				//For updating the count in the name of user
				$query_a = "SELECT points FROM users WHERE username = '$username'"; 
				$result_a = $connect->query($query_a);
				if($result_a)
				{	$query_num_rows=$result_a->num_rows;
					if($result_a->num_rows!= 0)
					{
			 
						$row4 = $result_a->fetch_assoc();                  //Converts the result to an associative array
						//echo "Successfully Annotated";
						$points = $row4['points'];
						$points += 1;
						$update4 = $connect->query("UPDATE users SET points = '$points' WHERE username = '$username'");//Updates the count by 
					}
						//end
				}
				$query3 = "SELECT word,frequency FROM word_list WHERE type = '$type'"; 
				$result = $connect->query($query3);
				if($result->num_rows!= 0)
				{
			 
					$row = $result->fetch_assoc();                  //Converts the result to an associative array
					echo "Successfully Annotated";
					$frequency = $row['frequency'];
					$frequency += 1;
					$update = $connect->query("UPDATE word_list SET frequency = '$frequency' WHERE  type ='".$type."'");//Updates the count by 1
					$new_update = $connect->query("INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$frequency' )");
				}
				else
				{
					$query = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$number' )";//If word donot exists creates a new row for the word
					if(!$query)
					echo "Connection ERROR";
					if($connect->query($query))
					{
						echo "Successfully Annotated";
					}
				}
			}
		}
	}
	elseif($annonymous==0)
	{
		echo "Please login to annotate";
		echo "<a href = 'http://localhost/team2/login.php' target='blank'>Login<a/>";
	}
	elseif ($annonymous==1) 
	{
		# code...
		$username = $_SERVER['REMOTE_ADDR'];
		if(!empty($_POST['Text']))
		{
			$flag_var = 0;
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
				$flag_var =1 ;
			}
			if(!isset($_POST['labels']) && empty($_POST['labelnew']))
			{
				echo "Select a category";
				$flag_var =1 ;
			}
			if($flag_var ==0)
			{$unm = 1;
				$query_o = "INSERT INTO word_list_web (username,word ,category,document,anon) VALUES ('$username','$word','$type','$url','$unm')";
				$result_o = $connect->query($query_o);
				if(!$result_o)
					echo "Connection Error";
				else
					echo "Successfully Annotated";
			}
					$query3 = "SELECT word,frequency FROM word_list WHERE type = '$type'"; 
				$result = $connect->query($query3);
				if($result->num_rows!= 0)
				{
			 
					$row = $result->fetch_assoc();                  //Converts the result to an associative array
					$frequency = $row['frequency'];
					$frequency += 1;
					$update = $connect->query("UPDATE word_list SET frequency = '$frequency' WHERE  type ='".$type."'");//Updates the count by 1
					$new_update = $connect->query("INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$number' )");
				}
				else
				{
					$query = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$type' ,'$number' )";//If word donot exists creates a new row for the word
					if(!$query)
					echo "Connection ERROR";
					if($connect->query($query))
					{
							$n = 1;
					}
				}
		}
	}
}

 
?>