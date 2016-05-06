<!-- Shows the words annotated by a particular user-->

<?php
require_once 'core.inc.php';
if(!loggedin())
  header('Location:login.php');
$username = getuserfield('username');
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
<li><a href="annotate.php">Back to Annotations</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>

</ul>

</div>
</div>
</nav>
<div class="container">
<div class="wow bounceInUp">
<div class = "col-md-8 col-md-offset-2">
<?php
  $query = "SELECT word,category,document FROM word_list_web WHERE username = '".$username."'";
$result = $connect->query($query);
//echo $result->num_rows;
$count = 1;
echo '<table class="table table-striped table-bordered table-hover">'; 
echo "<tr><th>ID</th><th>Word</th><th>Category</th><th>Document</th></tr>"; 
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
  echo $row['document'];
  echo "</td></tr>";  
  
  //echo $row['word'].'&emsp;&emsp;'.$row['category'].'<br>';
}
echo "</table>";   
?>
</div>
</div>
</div>
</body>
</html>