<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dawn Tourism</title>
	<link rel="stylesheet" href="login.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC&display=swap" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<table width="700" border="1">
	  <tr>
	    <td>地區</td>
	    <td>名稱</td>
	    <td>地址</td>
	    <td>照片</td>
	  </tr>
	  <?php
	  include('tourism.php');
	  foreach($medium_rows as $row)
			{
		echo "<tr>"; 
		echo "<td>".$row['area']."</td>";
		echo "<td>".$row['attractions']."</td>"; 
		echo "<td>".$row['place']."</td>"; 
		echo "<td><a href=\"".$row['photo']."\">touch me</a></td>";
		echo "</tr>"; 
		}
		echo "</table>"; 

		$link=null; //結束與資料庫連線
		?> 
</body>
</html>
