<!--
This file shows all the words annoatated by the users
for the admin
-->
<?php
require_once 'core.inc.php';
if(!loggedin())
  header('Location:login.php');
$username = getuserfield('username');
$display = 1;
?>
 <html>

<head>
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
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
<form role = "form" method = "POST" action = "show_all_annotations.php">
<div class = "row">
<div class = "form-group">
<div class = "col-md-2 col-md-offset-3">
<div class="wow bounceInLeft center">
<input type = "text" class = "form-control" name = "search_val" placeholder="ID/Word/Frequency/Category" />
</div></div>
<div class = "col-sm-2"><div class="wow bounceInDown">
<select id="sel1" class = "form-control" name = "field">
<option value = "id">ID</option> 
<option value= "word">Word</option>
<option value = "type">Category</option>
<option value = "frequency">Frequency</option>
</select>
</div></div>
<div class = "col-md-2"><div class="wow bounceInRight center">
<input type = "submit" class = "btn btn-success btn-block" name = "search" value = "Search" />
</div>
</div>
</div>
</div>
</form>
<div class="wow bounceInUp">
<div class = "col-md-8 col-md-offset-2">
<?php
if(isset($_POST['search']))
{
if(!empty($_POST['search_val']))
{
   $search = trim(strtolower(mysqli_real_escape_string($connect,$_POST['search_val'])));
   $field = $_POST['field'];
  $query  = "SELECT * FROM word_list WHERE $field = '$search'";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  {
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Word</th><th>Category</th><th>Frequency</th></tr>"; 
    $count = 1;
    while($row = $result->fetch_assoc())
    {
      echo "<tr><td>"; 
      echo $count;
      $count = $count + 1;
      echo "</td><td>";   
      echo $row['word'];
      echo "</td><td>";   
      echo $row['type'];
      echo "</td><td>";   
        
      echo $row['frequency'];
      echo "</td></tr>"; 
    }
    echo '<table />';
    $display = 0; 
  }
  else
      {
        ?>
          <script type="text/javascript">alert("No words found in relevent field");</script>
        <?php
      }



}
}
if($display == 1){
  $query = "SELECT * FROM word_list";

$result = $connect->query($query);
//echo $result->num_rows;
$count = 1;
echo '<table class="table table-striped table-bordered table-hover">'; 
echo "<tr><th>ID</th><th>Word</th><th>Category</th><th>Frequency</th></tr>"; 
while($row = $result->fetch_assoc())
{ 
  echo "<tr><td>"; 
  echo $count;
  $count = $count + 1;
   echo "</td><td>"; 
  echo $row['word'];
  echo "</td><td>";   
  echo $row['type'];
  echo "</td><td>";   
  echo $row['frequency'];
  echo "</td></tr>";  
  
  //echo $row['word'].'&emsp;&emsp;'.$row['category'].'<br>';
}
echo "</table>";   
}
?>
</div>
</div>
</div>
</body>
</html>