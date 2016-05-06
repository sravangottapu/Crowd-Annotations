<!--
This file shows the list of articles that are given by the 
websites for the annotation purpose
-->

<?php
require_once 'core.inc.php';
if(!loggedin())
header('Location:index.php');
$username = getuserfield('username');
 

?>
 <html>

<head>
<link rel="stylesheet" href="Animations/animate.css">
 <script src="Animations/WOW-master/dist/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
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
<div class = "row">
<div class="wow bounceInUp">
<div class = "col-md-4 col-md-offset-4">
<?php
 $flag =1;
 $ori = 1;
$query  = "SELECT * FROM users ORDER BY points DESC LIMIT 5";
  $result = $connect->query($query);
  if($result->num_rows != 0)
  { 
    $position = 0;
    echo '<table class="table table-striped table-bordered table-hover">'; 
    echo "<tr><th>ID</th><th>Username</th><th>Score</th></tr>"; 
    while($row = $result->fetch_assoc())
    {
     
         echo "<tr><td>"; 
      echo $flag;
      $flag = $flag +1;
      echo "</td><td>";   
      echo $row['username'];
      if($row['username'] == $username)
       { $ori = 0;
        $position = $flag - 1;
      }
      echo "</td><td>";   
      echo $row['points'];
      echo "</td></tr>"; 
    }
    echo '<table />';
   
  }
  if($ori == 1)
  {
    $query2 = "SELECT points FROM users ORDER BY points DESC";
    $result2 = $connect->query($query2);
    $query1  = "SELECT * FROM users WHERE username = '$username'";
  $result1 = $connect->query($query1);
  $row1 = $result1->fetch_assoc();
  $scores = $row1['points'];
  $ranks = 1;
  $rank = 0;
  while($row2 = $result2->fetch_assoc())
  {
    if($row2['points'] == $scores)
      $rank = $ranks;
    $ranks = $ranks+1;
  }
  if($result1->num_rows != 0)
  {echo "<div class='panel panel-info'>";
    echo "<div class='panel-heading'>Your Current score is    ";
        echo $row1['points'];
        echo "  and rank is ";
        echo $rank;
        echo "</div>";
        echo "</div>";
  }
  }
  else
  {
    echo "<div class='panel panel-info'>";
    echo "<div class='panel-heading'>Congrats !! You current ranking is   ";
        echo $position;
        
        echo "</div>";
        echo "</div>";
  }
  ?>
</div>
</div>
</div>
</div>

  

   
 
 
  
 

 
</body>
 </html>
