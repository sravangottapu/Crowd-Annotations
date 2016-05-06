<!-- Shows the file uploaded by users. It also cinverts the paragraphs uploaded by them in to textn files-->
<?php
require_once 'core.inc.php';
  if(!loggedin())
  header('Location:login.php');
$username=getuserfield('username');
if($username != "ashish_anand")
  header('Location:main.php');
 $molly =1;
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
 <li>
                        <a  href="top_contributors.php">Top Contributors</a>
  </li>
  <li><a href="show_doc.php">List of Documents</a></li>
 <li>
                        <a  href="change_password.php">Change Password</a>
  </li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>

</ul>

</div>
</div>
</nav>
<div class="container">
<form role = "form" method = "POST" action = "show_uploads.php">
<div class = "row">
<div class = "form-group">
<!-- For searching -->
<div class = "col-sm-2 col-sm-offset-3"><div class="wow bounceInLeft center">
<select id="sel1" class = "form-control" name = "field">
<option value = "id">ID</option> 
<option value= "username">Username</option>
<option value = "title">Title</option>
<option value = "filename">Filename</option>
</select>
</div></div>

<!-- for sorting-->
<div class = "col-sm-2"><div class="wow bounceInDown">
<select id="sel1" class = "form-control" name = "order">
<option value = "AESC">Ascending</option>
<option value = "DESC">Descending</option>
</select>
</div>
</div>

<div class = "col-md-2"><div class="wow bounceInRight center">
<input type = "submit" class = "btn btn-success btn-block" name = "submit" value = "Sort" />
</div></div>
</div>

</div>
</form>
<form role = "form" method = "POST" action = "show_uploads.php">
<div class = "row">
<div class = "form-group">
<div class="wow bounceInLeft center">
<div class = "col-md-2 col-md-offset-3">
<input type = "text" class = "form-control" name = "search_val" placeholder="ID/username/title/filenames" />
</div></div>
<div class="wow bounceInDown">
<div class = "col-sm-2">
<select id="sel1" class = "form-control" name = "field">
<option value = "id">ID</option> 
<option value= "username">Username</option>
<option value = "title">Title</option>
<option value = "filename">Filename</option>
</select>
</div></div>
<div class="wow bounceInRight center">
<div class = "col-md-2">
<input type = "submit" class = "btn btn-success btn-block" name = "search" value = "Search" />
</div>
</div>
</div>
</div>
</form>

<div class="wow bounceInUp">
<div class = "col-md-8 col-md-offset-2">
<?php

  
  //For sorting the fields in database
  if(isset($_POST['submit']))
{
  $criteria = $_POST['field'];
  $username=getuserfield('firstname');
  $ord = $_POST['order'];
  if($ord == "AESC")
    $query = "SELECT id,username,title,filename,date_s FROM uploads WHERE id != 0 ORDER BY $criteria ";
  else
    $query = "SELECT id,username,title,filename,date_s FROM uploads WHERE id != 0 ORDER BY $criteria DESC";

  $result = $connect->query($query);
  echo '<table class="table table-striped table-bordered table-hover">'; 
   echo "<tr><th>ID</th><th>Username</th><th>Title</th><th>Filename</th><th>Date</th></tr>"; 
  while($row = $result->fetch_assoc())
  {
    echo "<tr><td>"; 
      echo $row['id'];
      echo "</td><td>";   
      echo $row['username'];
      echo "</td><td>";   
      echo $row['title'];
      echo "</td><td>";   
      $name = $row['filename'];
      echo "<a href='dncdownload.php?nama=".$name."'>$name</a> ";echo '<br \>';
      echo "</td><td>";   
      echo $row['date_s'];
      echo "</td></tr>"; 
  }
  $flag =1;
}
// For searching of values in database
if(!empty($_POST['search_val']))
{
  $search = mysqli_real_escape_string($connect,$_POST['search_val']);
  $field = $_POST['field'];
  $query  = "SELECT * FROM uploads WHERE $field = '$search'";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  {
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Username</th><th>Title</th><th>Filename</th><th>Date</th></tr>"; 
    while($row = $result->fetch_assoc())
    {
      echo "<tr><td>"; 
      echo $row['id'];
      echo "</td><td>";   
      echo $row['username'];
      echo "</td><td>";   
      echo $row['title'];
      echo "</td><td>";   
      $name = $row['filename'];
      echo "<a href='dncdownload.php?nama=".$name."'>$name</a> ";echo '<br \>';
      echo "</td><td>";   
      echo $row['date_s'];
      echo "</td></tr>"; 
    }
    echo '<table />';
    $flag =1;
  }
  else
    echo "<h3>No relevant result Found</h3>";
}

?>
<?php

if($flag == 0){
  $username=getuserfield('firstname');
  $query = "SELECT id,username,title,filename,date_s FROM uploads WHERE id != 0";
  $result = $connect->query($query);
  echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Username</th><th>Title</th><th>Filename</th><th>Date</th></tr>"; 
  while($row = $result->fetch_assoc())
  {
    echo "<tr><td>"; 
      echo $row['id'];
      echo "</td><td>";   
      echo $row['username'];
      echo "</td><td>";   
      echo $row['title'];
      echo "</td><td>";   
      $name = $row['filename'];
      echo "<a href='dncdownload.php?nama=".$name."'>$name</a> ";echo '<br \>';
      echo "</td><td>";   
      echo $row['date_s'];
      echo "</td></tr>"; 
  }
  echo '<table />';
}
?>

</div>
</div>
</div>
</body>
</html>
