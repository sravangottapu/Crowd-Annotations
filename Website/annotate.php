
<!-- This is the file that opens when the users click the annotate button on the main.php file.
Through this page user annotates words.-->
<?php
require_once 'core.inc.php';
if(!loggedin())
header('Location:index.php');
$display = 1;

$username = getuserfield('username');
$query_k = "SELECT id FROM paragraphs ORDER BY id LIMIT 1";
			$result_k = $connect->query($query_k);
			if($result_k->num_rows != 0)
			$row_k  = $result_k->fetch_assoc();
			$id_k = $row_k['id'];
			$value_k = $id_k;
$query_o = "SELECT value FROM users WHERE username = '$username'";
			$result_o = $connect->query($query_o);
			if($result_o->num_rows != 0)
			$row_o  = $result_o->fetch_assoc();
			$id_o = $row_o['value'];
			$value = $id_o;
	if(isset($_POST['submit']))
	{

$word = mysqli_real_escape_string($connect,$_POST['word']);
$category = mysqli_real_escape_string($connect,$_POST['category']);
$start = $_POST['start'];
$end = $_POST['end'];
if($end - $start <= 40){
$word = trim(strtolower($word));
$category = trim(strtolower($category));
	$query_ll = "SELECT value FROM users WHERE username = '$username'";
	$result_ll = $connect->query($query_ll);
	$row_ll = $result_ll->fetch_assoc();
	echo $document_id = $row_ll['value'];

	$query_kk = "SELECT title FROM paragraphs WHERE id = '$document_id'";
	$result_kk = $connect->query($query_kk);
	$row_kk = $result_kk->fetch_assoc();
	echo $document = $row_kk['title'];
if(!empty($word) && !empty($category))
{		$query3 = "SELECT word,frequency FROM word_list WHERE word = '".$word."' AND type = '".$category."'"; 
		$result3 = $connect->query($query3);
			if($result3->num_rows!= 0)
		{
			 
			$row3 = $result3->fetch_assoc();                  //Converts the result to an associative array
			//echo "Successfully Annotated";
			$frequency = $row3['frequency'];
			$frequency += 1;
			$update3 = $connect->query("UPDATE word_list SET frequency = '$frequency' WHERE word = '$word' AND type ='$category'");//Updates the count by 1
		
			}
		
				else{
			$number = 1;
			$query3 = "INSERT INTO word_list (word,type,frequency) VALUES ('$word' , '$category' ,'$number' )";//If word donot exists creates a new row for the word
			
			if($connect->query($query3)){

			}
		
	}


	$query = "INSERT INTO word_list_web (username,word,category,document,start,endo) VALUES ('$username','$word','$category','$document','$start','$end')";
	$result = $connect->query($query);

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
		
				


	if(!$result)
		echo "Connection Error";
	header('Location:annotate.php');
}
}
else
{
	?>
<script type="text/javascript">alert("Too long word to annotate .Please reduce the length of word");</script>
	<?php
}
}
if(isset($_POST['doc_search']) && !empty($_POST['doc_text']))
{
	$title_doc = mysqli_real_escape_string($connect,$_POST['doc_text']);
	$title_doc = trim(strtolower($title_doc));
	$query_doc = "SELECT * FROM paragraphs WHERE title = '$title_doc'";
	$result_doc = $connect->query($query_doc);
	if($result_doc->num_rows!=0)
	{	
		$row_doc = $result_doc->fetch_assoc();
		$id_doc = $row_doc['id'];
		$query_up = "UPDATE users SET value = '$id_doc' WHERE username = '$username'";
		$result_up = $connect->query($query_up);
		$query_ch = "SELECT value FROM users WHERE username = '$username'";
		$result_ch = $connect->query($query_ch);
		$row_ch = $result_ch->fetch_assoc();
	    $ans_ch = $row_ch['value'];
		$value = $row_ch['value'];
			}
	else
	{
		?>
		<script type="text/javascript">alert("Document By given title doesnot exist");</script>
		<?php
	}
}

?>
 <html>

<head>

<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="Animations/animate.css">
 <script src="Animations/WOW-master/dist/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<a class="navbar-brand" href="main.php">Annotate me !</a>
</div>

</ul>
<ul class="nav navbar-nav navbar-right">
<?php
if($username == "ashish_anand")
{
  echo "<li> <a  href='show_all_annotations.php'>All annotations</a></li>";
    echo "<li> <a  href='show_uploads.php'>Show Uploads</a></li>";
    echo "<li> <a  href='show_part.php'>Document wise annotations</a></li>";
}
else
  echo "<li> <a  href='my_uploads.php'>My Uploads</a></li>";
?>
<li>
                        <a  href="top_contributors.php">Top Contributors</a>
  </li>
<li><a href="show_doc.php">List of Documents</a></li>
<li><a href="show.php">Show annotations</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>

</ul>

</div>
</div>
</nav>
<div class="container">
<form role = "form" action = "annotate.php" method = "POST">
<div class = "row">
<div class = "col-md-1">
<div class="wow bounceInRight center">
<input type = "submit" class= "btn btn-success" name = "previous"  value = "previous" />
</div></div>
<div class = "col-md-1 col-md-offset-10">
<div class="wow bounceInLeft center">
<input type = "submit" class= "btn btn-success btn-block" name = "next"  value = "next" />
</div></div>
</div>
</form>
<div class = "row">
<div class = "col-md-8 col-md-offset-5">
<div class="wow bounceInLeft center">
<?php
if(isset($_POST['previous']) || isset($_POST['next']) || $value == $value_k )
{	if(isset($_POST['previous']))
		{
			$query_m = "SELECT id FROM paragraphs ORDER BY id LIMIT 1";
			$result_m = $connect->query($query_m);
			if($result_m->num_rows != 0)
			$row_m  = $result_m->fetch_assoc();
			$id_m = $row_m['id'];
			if($value == $id_m) 
				$value = $id_m;
			else
				{
					$query_n = "SELECT id FROM paragraphs WHERE id < '$value' ORDER BY id DESC LIMIT 1";
					$result_n = $connect->query($query_n);
					if($result_n->num_rows != 0)
					$row_n  = $result_n->fetch_assoc();
					$id_n = $row_n['id'];
					$value = $id_n;
				}
			 
		}
	if(isset($_POST['next']))
		{
			$query_m = "SELECT id FROM paragraphs ORDER BY id DESC LIMIT 1";
			$result_m = $connect->query($query_m);
			if($result_m->num_rows != 0)
			$row_m  = $result_m->fetch_assoc();
			$id_m = $row_m['id'];
			if($value == $id_m) 
				$value = $id_m;
			else
				{
					$query_n = "SELECT id FROM paragraphs WHERE id > '$value' ORDER BY id LIMIT 1";
					$result_n = $connect->query($query_n);
					if($result_n->num_rows != 0)
					$row_n  = $result_n->fetch_assoc();
					$id_n = $row_n['id'];
					$value = $id_n;
				}
		 
		}
	$query_r = "UPDATE users SET value = '$value' WHERE username = '$username'"; 
	$result_r = $connect->query($query_r);

	$query_head = "SELECT * FROM paragraphs WHERE id = '$value'";
	if($result_head = $connect->query($query_head))
	{
		$row_head = $result_head->fetch_assoc();
		$title_head = $row_head['title'];
		$para_head = $row_head['paragraph'];
		$display = 0;
	}
	echo "<h3>";
	echo $title_head;
	echo "</h3>";
 }
if($display == 1)
{
	$query_l = "SELECT value FROM users WHERE username = '$username'";
	$result_l = $connect->query($query_l);
	if($result_l)
	{
		$row_l = $result_l->fetch_assoc();
		$value_l = $row_l['value'];

	$query_head = "SELECT * FROM paragraphs WHERE id = '$value_l'";
	if($result_head = $connect->query($query_head))
	{
		$row_head = $result_head->fetch_assoc();
		$title_head = $row_head['title'];
		$para_head = $row_head['paragraph'];
		
	}
	echo "<h3>";
	echo $title_head;
	echo "</h3>";
	}
}
?>
</div>
</div>
</div>
<div class = "row">
<div class = "col-md-8 col-md-offset-2">
<div class="wow bounceInRight center">
<?php
	echo $para_head;
?>
</div>
</div>
</div>
<!--<div class="navbar navbar-fixed-bottom">-->
<form method  ="post" class = "form-group" action = "annotate.php">
<br><br>
<div class = "row">
<div class = "col-md-3 col-md-offset-2">
<div class = "form-group">
<div class="wow bounceInRight center">
	<input type = "text" class = "form-control" name = "word" id="selected_text" />
	<input type = "hidden" class = "form-control" name = "start" id="start_index" />
	<input type = "hidden" class = "form-control" name = "end" id="end_index" />
	</div>
</div>
</div>
<div class = "col-md-1">
<div class="wow bounceInRight center">
	<input type = "button" value ="Get Text" class = "btn btn-success" onclick="document.getElementById('selected_text').value = document.getSelection().toString();document.getElementById('start_index').value = window.getSelection().getRangeAt(0).startOffset;document.getElementById('end_index').value = window.getSelection().getRangeAt(0).endOffset - 1;" />
 </div>
 </div>
 <div class = "col-md-3">
<div class = "form-group">
<div class="wow bounceInLeft center">
	<input type = "text" class = "form-control" name = "doc_text" placeholder="Search By document name" />
	</div>
</div>
</div>
<div class = "col-md-1">
<div class="wow bounceInLeft center">
	<input type = "submit" value ="Search" class = "btn btn-success" name = "doc_search" />
 </div>
</div>
</div>
<br>	
<div class="wow bounceInUp">
<?php
require 'new.php';
?>	</div>
	<div class = "row">
<div class = "col-md-3 col-md-offset-2">
<div class="wow bounceInUp">
	<input type = "submit" id = "submit" name = "submit" class = "btn btn-success btn-block" />
 </div>
</div>
</div>
</form>
</div>

<!--</div>-->

  

   
 
 
  
 

 
</body>
 </html>
