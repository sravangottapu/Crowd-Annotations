
<!--
This file shows the list of articles that are given by the 
websites for the annotation purpose
-->

<?php
require_once 'core.inc.php';
if(!loggedin())
header('Location:index.php');
$username = getuserfield('username');
 if(isset($_POST['doc_delete']) && !empty($_POST['delete']))
{
  $title = strtolower(trim(mysqli_real_escape_string($connect,$_POST['delete'])));
  $query = "SELECT * FROM paragraphs WHERE title = '$title'";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  {
    $query_delete = "DELETE FROM paragraphs WHERE title = '$title'";
    $result_delete = $connect->query($query_delete);
    if($result_delete)
    {
      ?>
      <script type="text/javascript">alert("Document successfully deleted");</script>
      <?php
    }
  }
  else
  {
    ?>
    
    <script type="text/javascript">alert("No document exist by the given title");</script>
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
<li><a href="annotate.php">Back to Annotations</a></li>
<li><a href="show.php">Show annotations</a></li>
<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>

</ul>

</div>
</div>
</nav>
<div class = "container">
<form method  ="post" class = "form-group" action = "annotate.php">
<br><br>
<div class = "row">
 
 <div class="wow bounceInLeft center">
 <div class = "col-md-3 col-md-offset-4">
<div class = "form-group">
  <input type = "text" class = "form-control" name = "doc_text" placeholder="Search By document name" />
  </div>
</div></div>
<div class="wow bounceInRight center">
<div class = "col-md-1 ">
  <input type = "submit" value ="Search" class = "btn btn-success" name = "doc_search" />
 </div> 
</div>
</div>
</form>
<?php
if($username == "ashish_anand"){
echo'<form method  ="post" class = "form-group" action = "show_doc.php">';
echo'<br>';  
 echo'<div class = "row">';
 
 echo'<div class="wow bounceInLeft center">';
 echo'<div class = "col-md-3 col-md-offset-4">';
echo'<div class = "form-group">';
  echo'<input type = "text" class = "form-control" name = "delete" placeholder="Delete Document" />';
  echo'</div>';
echo'</div>';
echo'</div>';
echo'<div class="wow bounceInRight center">';
echo'<div class = "col-md-1 ">';
 echo'<input type = "submit" value ="Delete" class = "btn btn-success" name = "doc_delete" />';
 echo'</div>'; 
echo'</div>';
echo'</div>';
   
echo'</form>';
}
?>
<div class = "row">
<div class="wow bounceInUp">
<div class = "col-md-4 col-md-offset-4">
<?php
 $flag =1;
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
  ?>
</div>
</div>
</div>
</div>

  

   
 
 
  
 

 
</body>
 </html>
