<!-- File that helps in the downloads of the other files and is implemented in show_uploads.php-->

<?php
$name= $_GET['nama'];
$file="uploads/".$name;
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: attachment; filename=\"" . basename($file) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile("uploads/".$name); //showing the path to the server where the file is to be download
    exit;
?>