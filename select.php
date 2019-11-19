<?php
	include('mysql_connect.inc.php');
	
	$searchs = $_POST['key'];
	$select = "select * from tourism where area like '%$searchs%'";
	$result=$connect->query($select);
	$rows=$result->fetchAll();
?>