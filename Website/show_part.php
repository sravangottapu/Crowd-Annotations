<!--
Shows the list of annotations by each 
document wise
-->

<?php
require_once 'core.inc.php';
$flag = 1;
if(!loggedin())
  header('Location:login.php');
$username = getuserfield('username');
if($username != "ashish_anand")
  header('Location:main.php');
if(isset($_POST['submit']) && !empty($_POST['search']))
  $flag = 0;
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
<li><a href="show_doc.php">List of Documents</a></li>
<li><a href="annotate.php">Back to Annotations</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>

</ul>

</div>
</div>
</nav>
<div class="container">
<?php
if($flag == 1){
echo '<form role = "form" method = "POST" action = "show_part.php">
<div class = "row">
<div class = "form-group"><div class="wow bounceInLeft center">
<div class = "col-md-4 col-md-offset-3">
      
      <input class = "form-control" type = "text" name = "search" placeholder = "Search by Document name">
      
       </div></div>
       <div class="wow bounceInRight center">
      <div class = "col-md-2">
      <input type = "submit" name = "submit" class = "btn btn-success"/>
      </div></div>
     
</div>
</div>
</form>';
}
if(isset($_POST['search_value']))
{
if(!empty($_POST['search_val']))
{
   $search = trim(strtolower(mysqli_real_escape_string($connect,$_POST['search_val'])));
   $field = $_POST['field'];
  $query  = "SELECT * FROM word_list_web WHERE $field = '$search'";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  {
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Word</th><th>Category</th><th>Username</th><th>Start in file</th><th>End in file</th></tr>"; 
    $count = 1;
    while($row = $result->fetch_assoc())
    {
     echo "<tr><td>"; 
  echo $count;
  $count = $count + 1;
   echo "</td><td>"; 
  echo $row['word'];
  echo "</td><td>";   
  echo $row['category'];
  echo "</td><td>";   
  echo $row['username'];
  echo "</td><td>";   
  echo $row['start'];
  echo "</td><td>";   
  echo $row['endo'];
  echo "</td></tr>"; 
    }
    $flag = 0;
    echo '<table />';
    
  }
  else
      {
        ?>
          <script type="text/javascript">alert("No words found in relevent field");</script>
        <?php
      }



}
}
?>
<div class="wow bounceInUp">
<div class = "col-md-8 col-md-offset-2">
<?php
if(isset($_POST['submit']))
{
  if(!empty($_POST['search'])){
    $name = trim(strtolower(mysqli_real_escape_string($connect,$_POST['search'])));
  $query = "SELECT * FROM word_list_web WHERE document = '$name'";
$result = $connect->query($query);
echo'<form role = "form" method = "POST" action = "show_part.php">
<div class = "row">
<div class = "form-group">
<div class = "col-md-4 col-md-offset-1">
<div class="wow bounceInLeft center">
<input type = "text" class = "form-control" name = "search_val" placeholder="ID/Word/Frequency/Category" />
</div></div>
<div class = "col-sm-2"><div class="wow bounceInDown">
<select id="sel1" class = "form-control" name = "field">
<option value = "id">ID</option> 
<option value= "word">Word</option>
<option value = "type">Category</option>
<option value = "username">Username</option>
</select>
</div></div>
<div class = "col-md-2"><div class="wow bounceInRight center">
<input type = "submit" class = "btn btn-success btn-block" name = "search_value" value = "Search" />
</div>
</div>
</div>
</div>
</form>';
if($result->num_rows != 0){
//echo $result->num_rows;
$count = 1;
echo "<div class = 'col-md-offset-4'>";
echo "<h3>";
echo $name;
echo "</h3>";
echo "</div>";
echo '<table class="table table-striped table-bordered table-hover">'; 
echo "<tr><th>ID</th><th>Word</th><th>Category</th><th>Username</th><th>Start in file</th><th>End in file</th></tr>"; 
while($row = $result->fetch_assoc())
{ 
  
 
  echo "<tr><td>"; 
  echo $count;
  $count = $count + 1;
   echo "</td><td>"; 
  echo $row['word'];
  echo "</td><td>";   
  echo $row['category'];
  echo "</td><td>";   
  echo $row['username'];
  echo "</td><td>";   
  echo $row['start'];
  echo "</td><td>";   
  echo $row['endo'];
  echo "</td></tr>";  
  
  //echo $row['word'].'&emsp;&emsp;'.$row['category'].'<br>';
}
echo "</table>"; 
$flag = 0;  
}
else
{
?>
<script type="text/javascript">alert("No annotation under given document name");</script>
<?php
}
}
    else
    {
      ?>
    <script type="text/javascript">alert("Insert name of the document");</script>
      <?php
    }
}
if($flag == 1)
{
  $query  = "SELECT * FROM paragraphs";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  {
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Title</th></tr>"; 
    while($row = $result->fetch_assoc())
    {
      echo "<tr><td>"; 
      echo $flag;
      $flag = $flag +1;
      echo "</td><td>";   
      echo $row['title'];
      echo "</td></tr>"; 
    }
    echo '<table />';
   
  }
}
?>
</div>
</div>
</div>
</body>
</html>