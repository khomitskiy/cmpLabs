<html>
<head>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Input your name
<input name ="name" type="text">
<input type = submit value="OK">
<br><br> 
</form>
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
$name = $_REQUEST['name']; 
if (empty($name)) { 
echo "Name is empty"; 
} else { 
echo $name; 
} 
}
?>
</body> 
</html>