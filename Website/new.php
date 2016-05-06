<!DOCTYPE html>
<html>
<head>
	<title>auto</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>
<script>
$(function() {
    $( "#category" ).autocomplete
    ({
        source: 'http://localhost/team2/search.php'
    });
});
</script>
<body>
<div class = "container">
<div class = "row">
<div class = "col-md-3 col-md-offset-2">
<div class="ui-widget">
    <div class = "form-group">
   <input id="category" name="category" class = "form-control" placeholder = "Category" value="">
   </div>
</div>
<br>
</div>
</div>
</div>
</body>
</html>
