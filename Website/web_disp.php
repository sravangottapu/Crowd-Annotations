<?php
$connect = mysqli_connect("localhost", "root","","annotated_words");
if($connect->connect_errno)
	{
		echo "Connection error";
	}
if(isset($_POST['submit']))
{
	if(empty($_POST['type']))
		{
			echo "Please give a type to Annotated word";
		}

if(isset($_POST['submit']))
{
	if(empty($_POST['type']))
		{
			echo "Please enter the word type";
		}
	if(!empty($_POST['type']))
	{
		$type = ($_POST['type']);
		$query = "SELECT word FROM word_list WHERE type = '".$type."'";
		$words = $connect->query($query);
		if($words->num_rows!=0)
		{
			$word = $words->fetch_all(MYSQLI_ASSOC);
			$ran =  $words->fetch_all(MYSQLI_ASSOC); 
			foreach ($word as $entity)
			{
				echo $entity['word'],'</br>';
			}
		}
		else
		{

			echo "OOPS!! Word type doesn't exist in the database,Try again";

		}
		
	}
}

?>
