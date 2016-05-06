<?php
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Jane Doe";
$new = "<option value=\"";
$new2 = "\">";
$text = $new . $txt . $new2;
fwrite($myfile, $text);
fclose($myfile);
?>