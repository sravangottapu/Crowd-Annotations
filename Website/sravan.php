
 <?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$file = fopen("cat.txt","r");
while(! feof($file)){
$txt = fgets($file);
fwrite($myfile, $txt);
fwrite($myfile,"\n");
$new = "<option value=\"";
$new2 = "\">";
$text = $new . $txt . $new2;
fwrite($myfile, $text);
}
fclose($file);
fclose($myfile);
 
 
?>