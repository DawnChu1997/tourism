<?php
    ini_set("display_errors", "On");
    date_default_timezone_set("Asia/Taipei");
    $area = $_POST['area'];
    $attractions = $_POST['attractions'];
    $place = $_POST['place'];
    $introduction = $_POST['introduction'];
    $img=$_FILES['photo'];    
    if(isset($_POST['submit'])){ 
        if($img['name']==''){  
        echo "<h2>An Image Please.</h2>";
    }else{
        //["tmp_name"]：上傳檔案後的暫存資料夾位置
        //要在網頁目錄下建個暫存資料夾 upload
        $filename = $img['tmp_name'];
        $client_id="4e21d32bc6e5290";
        $handle = fopen($filename, "r");
        $data = fread($handle, filesize($filename));
        $pvars   = array('image' => base64_encode($data));
        $timeout = 30;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
        $out = curl_exec($curl);
        curl_close ($curl);
        $pms = json_decode($out,true);
        $url=$pms['data']['link'];
        if($url!=""){
           echo "<h2>Uploaded Without Any Problem</h2>";
           echo "<img src='$url'/>";
        }else{
           echo "<h2>There's a Problem</h2>";
           echo $pms['data']['error'];  
            } 
        }
    }   
    require_once "mysql_connect.inc.php";
    $insert = $connect -> prepare( "INSERT INTO
                        tourism (
                                area,
                                attractions,
                                place,
                                introduction,
                                photo
                              ) VALUES (
                                ?,?,?,?,?
                              )");
    $insert -> execute(
            array( $area,
                        $attractions,
                        $place,
                        $introduction,
                        $url,
                ));
    header("location:".$_SERVER["HTTP_REFERER"]);
?>