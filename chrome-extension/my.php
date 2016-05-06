<?php
$connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
$myfile = fopen("popup.html", "w") or die("Unable to open file!"); 
$text = '<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style type="text/css">
.btnExample 
{
  color: #900;
  background: #FF0;
  font-weight: bold;
  border: 1px solid #900;
}
 .btnExample:hover {
  color: #FFF;
  background: #900;
}
.btnExample:hover {
  cursor: pointer;
}
.buttone{
  color: #900;
  background: #FF0;
  font-weight: bold;
  border: 1px solid #900;
}
 .buttone:hover{
  color: blue;
  background: #900;
}
.buttone:hover {
  cursor: pointer; 
}
body{
  background-color: lightblue;
  min-width:160px;
}
input[type="text"] {
  display: block;
  margin: 0;
  width: 80%;
  font-family: sans-serif;
  font-size: 10px;
  appearance: none;
  box-shadow: none;
  border-radius: none;
}
input[type="text"] {
  padding: 7px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}
#random {
  position: relative;
  left:30%;
}
</style>
<script src="popup.js"></script>
</head>
<body>
<form action="http://localhost/team2cs243/Website/insert.php" method="POST">
<br>
<input type="checkbox" name="annonymous" value="1">Annotate Annonymously<br><br>
<input id="text" type="text" name="Text" placeholder="Text to Annotate"><br>';
fwrite($myfile, $text);
$query_new = "SELECT distinct type FROM word_list ORDER BY frequency DESC LIMIT 4";
$res_new = $connect->query($query_new);
while($row_new = $res_new->fetch_assoc())
{
  $vari = $row_new['type'];
  $q = "<input type=\"radio\" name=\"labels\" id = \"labels\" value=\"";
  $q2 = $vari;
  $q3 = "\">";
  $q4 = $vari;
  $q5 = "<br>";
  $new_var = $q . $q2 . $q3 . $q4 . $q5;
  fwrite($myfile,$new_var);

}

$text2 ='<br>
Others...<br>
<div class="ui-widget">
<input id="labels" type="text" name="labelnew" placeholder="New Category" value="" list="datalist">
<datalist id="datalist">';
fwrite($myfile, $text2);

$query = "SELECT distinct category FROM word_list_web";
$result = $connect->query($query);
if($result)
echo "Successfully Updated the list of categories";
while($row = $result->fetch_assoc())
{
	$new = "<option value=\"";
	$new2 = "\">";
	$txt =  $row['category'];
	$tex = $new . $txt . $new2;
fwrite($myfile, $tex);
	
}

$new_text = '</datalist>
</input>
<br></div>
<input id="url" type="text" name="url" placeholder="URL"><br>
<input class = "btnExample" type="submit" value="Submit" name = "submit">
<br>
</form>
<a href="http:localhost/team2cs243/chrome-extension/my.php" target="_blank">Dynamic update</a><br>
<a href="http:localhost/team2/index.php" target="_blank">Check If you are logged in </a>
</body>
</html>';
fwrite($myfile, $new_text);
 fclose($myfile);
?> 