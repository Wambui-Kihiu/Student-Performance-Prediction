<!DOCTYPE html>
<html>
<head>
	<title>Student Homepage</title>
	<link rel="stylesheet" type="text/css" href="style/new.css" />
</head>
<body id="body">

<div id ="top">
	<div id="logo">
		<img src="images/logo2.png" width="200px" height="150px" />
	</div>
	<div id="header_text">
		<div id="header_text_main">
			</br>
			</br>
			<h2> Student Performance Prediction </h2>
		</div>
		<div id="header_text_about">
			<font color="orange">
				<h5>  About  <h5>
				<h6> Student Performance Prediction </h6>
			</font>
			<h6>Predicts student performance based on their demographic data and their learning behaviors.</h6> 

		</div>
	</div>
</div>

<?php

mysql_connect("localhost", "root", "") or die("Couldn't connect!");
mysql_select_db("dataset") or die("Couldn't find db");


$query1 = mysql_query("SELECT * FROM data");
$count1 = mysql_num_rows($query1);

$records =20;

$pages = ceil($count1/$records);
?>
<form action="" method="get" >
<select name="paging">
<?php 
$page_id = 1;
for($i=1; $i<=$pages; $i++)
{
	echo "<option value=$page_id >Page $i</option>";
	$page_id+=$records;
}
?>
</select>
<input type="submit" value="View Page" />
</form>

<?php
	if(@$_GET['paging'] <= 0)
	{
		$paging = $rec= 1;
	}
	else
	{		
		$paging = $rec= $_GET['paging'];
	}

	$query = mysql_query("SELECT * FROM data WHERE id>='".$paging."' LIMIT $records");
	echo "<table border='1px' >
			<tr>
				<th></th>
				<th>Course id</th>
				<th>User Id</th>
			</tr>";

	while($data = mysql_fetch_array($query))
	{
		$course_id = $data['course_id'];
		$userid_DI = $data['userid_DI'];
		echo "<tr>
				<td>$rec</td>
				<td>$course_id</td>
				<td>$userid_DI</td>
			";
		$rec++;
	}
?>
	</table>
</body>
</html>