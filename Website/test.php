<?php
$file = fopen("testing.txt","r");
$conn = mysqli_connect('localhost','root','','annotated_words');
error_reporting(0);
if($conn->connect_errno) //Checks database connection
	echo "Connection error";
while(! feof($file))
{
	$detail=explode(" ",fgets($file));
	$username=trim($detail[0]);
	$word=trim($detail[1]);
	$category=trim($detail[2]);
	$document=trim($detail[3]);
	$start=trim($detail[4]);
	$end=$start + strlen($word);
	//echo $catg." ".$cand."<br>";
	$q="INSERT INTO word_list_web (username,word,category,document,start,endo) VALUES ('$username','$word','$category','$document','$start','$end')";
	$result=$conn->query($q);

$query4 = "SELECT points FROM users WHERE username = '$username'"; 
		$result4 = $conn->query($query4);
			if($result4->num_rows!= 0)
		{
			 
			$row4 = $result4->fetch_assoc();                  //Converts the result to an associative array
			//echo "Successfully Annotated";
			$points = $row4['points'];
			$points += 1;
			$update4 = $conn->query("UPDATE users SET points = '$points' WHERE username = '$username'");//Updates the count by 1
		
			}


	$query3 = "SELECT word,frequency FROM word_list WHERE word = '$word' AND type = '$category'"; 
				$result3 = $conn->query($query3);
				if($result3->num_rows!= 0)
				{
			 
					$row3 = $result3->fetch_assoc();                  //Converts the result to an associative array
					echo "Successfully Annotated";
					$frequency = $row3['frequency'];
					$frequency += 1;
					$update = $conn->query("UPDATE word_list SET frequency = '$frequency' WHERE word = '$word' AND type ='$category'");//Updates the count by 1
				}
				else
				{
					$number = 1;
					$query = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$category' ,'$number' )";//If word donot exists creates a new row for the word
					if(!$query)
					echo "Connection ERROR";
					if($conn->query($query))
					{
						echo "Successfully Annotated";
					}
				}



}

// fclose($file);
// require 'db_disconnect.php';
?>