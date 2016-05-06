<?php
    //database configuration
   require 'core.inc.php';
    
    //get search term
    $searchTerm = $_GET['term'];
   // $data = array;
    //get matched data from webmails table
    $query = $connect->query("SELECT distinct type FROM word_list WHERE type LIKE '%".$searchTerm."%' ORDER BY word ");
    while ($row = $query->fetch_assoc()) 
    {
        //if(!in_array($row['word'],$data)
        $data[] = $row['type'];
    }
    
    //return json data
    echo json_encode($data);
?>