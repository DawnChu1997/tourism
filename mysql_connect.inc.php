<!-- 使用PDO連結 mysql & php -->
<!-- <?php
try {
    $dbh = new PDO(
        'mysql:host=127.0.0.1;dbname=dawn;port=33306;charset=utf8mb4',
        'root',
        ''
    );
} catch (PDOException $exception) {
    die("Something wrong: {$exception->getMessage()}");
}
?> -->

<?php
	$host = "localhost";
	$port = "33306";
	$user = "root";//填入SQL的連線帳號
	$password = "";//填入SQL對應連線帳號的密碼
	$database = "dawn";//填入要訪問DB的名稱
	$connect = new PDO("mysql:host=$host; dbname=$database; port=$port;", $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));  
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//用PDO產生連線，之後直接使用$connect這個變數就可以操作資料
	?>