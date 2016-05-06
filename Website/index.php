<!--  Index page of the project-->

 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="basic.css"/>
 </head>
 <body>
 </body>
 </html>
 
 <?php
 require_once 'core.inc.php';
 $connect = mysqli_connect('localhost','root','','annotated_words');
if($connect->connect_errno)                    //Checks database connection
	echo "Connection error";
 
     
  if(loggedin()) //loggedin function is present in core.inc.php file
  { 
    header('Location:main.php');
	 }
  else
  {
  require_once 'login.php';

  }
  
 
   
	?>
  
 