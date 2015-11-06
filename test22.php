<html>
<head>
<style type="text/css">
table {
	border : 2px solid black;
	border-collapse : collapse;
	text-align : center;
}
td {
	border : 2px solid black;
	width : 25px;
}
th
{
	height : 25px;
}
</style>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Input your month
<input name ="month" type="text">
<br><br> 
Input your year
<input name ="year" type="text">
<br><br> 
<input type = submit value="OK">
</form>
<?php
$firstDay = getdate(mktime(0,0,0, $_REQUEST['month'],1,$_REQUEST['year']));
$lastDay = getdate(mktime(0,0,0, $_REQUEST['month']+1,0,$_REQUEST['year']));
echo '<table>';
echo '<tr>';
echo '<th colspan="7">'.$firstDay['month']." - ".$firstDay['year']."
</th>
</tr>
<tr>
	<td>Mo</td>
	<td>Tu</td>
	<td>We</td>
	<td>Th</td>
	<td>Fr</td>
	<td><font color="."red".">Sa</font></td>
	<td><font color="."red".">Su</font></td>
	</tr>";
echo '<tr>';
$dayNum = 0;
if($firstDay['wday'] != 0)
{
	$day = $firstDay['wday'];
}
else
{
	$day = 7;
}
for($i = 1; $i <=7; $i++)
{
	if ($i < $day)
	{
		echo '<td></td>';		
	}
	else
	{
		$dayNum++;
		if($i > 5)
			echo "<td><font color="."red".">$dayNum</font></td>";
		else
			echo "<td>$dayNum</td>";
		
	}
}
echo '</tr>';

$week = ceil(($lastDay['mday']-$dayNum)/7);
    
for ($i=0;$i<$week;$i++){
    echo '<tr>';
    for ($j=0;$j<7;$j++){
        $dayNum++;
		if($dayNum > $lastDay['mday'])
		{
			echo '<td></td>';
		}
		else
		{
			if($j > 4)
				echo "<td><font color="."red".">$dayNum</font></td>";
			else
				echo "<td>$dayNum</td>";
		}
    }
    echo '</tr>';
}	
echo '</table>';

?>
</body> 
</html>