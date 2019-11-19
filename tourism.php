<?php
  include('mysql_connect.inc.php');

  $north = "select * from tourism where area ='台北'or area ='新北'or area ='宜蘭' or area ='桃園' or area ='新竹'";
  $result=$connect->query($north);
  $north_rows=$result->fetchAll();

  $medium = "select * from tourism where area ='苗栗'or area ='台中'or area ='彰化' or area ='南投' or area ='花蓮'";
  $result=$connect->query($medium);
  $medium_rows=$result->fetchAll();

  $south = "select * from tourism where area ='雲林'or area ='嘉義'or area ='台南' or area ='高雄' or area ='屏東' or area='台東'";
  $result=$connect->query($south);
  $south_rows=$result->fetchAll();

  $outer_island = "select * from tourism where area ='金門'or area ='媽祖'or area ='澎湖' or area ='蘭嶼' or area ='綠島'";
  $result=$connect->query($outer_island);
  $outer_island_rows=$result->fetchAll();

  $foreign = "select * from tourism where area ='日本'or area ='澳洲'";
  $result=$connect->query($foreign);
  $foreign_rows=$result->fetchAll();

?>