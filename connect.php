<?php
  include('mysql_connect.inc.php');
  session_start();
  $userid=$_POST["username"];
  $password=$_POST["password"];
  if(!$connect){
   die("資料庫連接失敗！");
   }
  $query = "select * from manager where username='".$userid."'";
  $result = $connect->query($query);
  $rows = $result->fetchAll();
  foreach($rows as $row)
  {
    $dbuserid=$row["username"];
    $dbpassword=$row["password"];
  }
    if(is_null($dbuserid)){
?>

<script>
  alert("查無此帳戶，請重新輸入！");
  window.location.href="login.html";
</script>
<?php
   }
  else{
    if($password!= $dbpassword){
?>
<script>
  alert("密碼錯誤！");
  window.location.href="login.html";
</script>
<?php
   }
   else{
      $_SESSION['userid']=$userid;
      $_SESSION['code']=mt_rand(0,100000);//隨機數
      $_SESSION['admin']=$row['role'];//用戶管理權限
      $_SESSION['username']=$row['name'];//用戶名稱
      $_SESSION['userimg']=$row['image'];//用戶頭像
      $_SESSION["times"]=mktime();  //把當前的登錄時間存儲到 $_SESSION["times"]
      $_SESSION['baseUri']=$baseUri;//GWS Uri
      $_SESSION['place']=$_GET['place'];
      $_SESSION['password']=$dbpassword;
      $_SESSION['debug']=$debug;
?>
<script>
  window.location.href="manager.html";
</script> 
<?php
   }
   }
  $link=null; //結束與資料庫連線
?>
 