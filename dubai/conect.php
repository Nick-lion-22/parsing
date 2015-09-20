<?php
/* Подключение к базе данных ODBC, используя вызов драйвера */
include_once('simple_html_dom.php');
function conect($dom){
$dsn = 'mysql:dbname=u166302776_parsi;host=localhost';
$user = 'u166302776_parsi';
$password = 'mister.sty23';
//var_dump($dom);
try {

    $dbh = new PDO($dsn, $user, $password);
    $query = $dbh->prepare("TRUNCATE TABLE vizaparsing");
    $query->execute();

} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
     for($n=0;$n<count($dom);$n++){
    $date=$dom[$n]['date'];
    $time=$dom[$n]['time'];
//    echo $date;
//    echo $time;
//    $id='1';
    $query = $dbh->prepare("INSERT INTO vizaparsing(date, time) VALUES (?, ?)");
//    $query = $dbh->prepare("UPDATE  vizaparsing SET VALUE date= (?)");
//    $sql = "UPDATE vizaparsing SET  time= ".$time." WHERE id = ".$id.";";
//    $query = $dbh->prepare($sql);
    $query->execute(array($date,$time));
     }
//    $query->execute();
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $query = $dbh->prepare("SELECT * FROM vizaparsing");
    $query->execute();
//    $query->execute(array('21/08/2014'));
echo
"<form method='get' action='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314'>
<table border='2' border-color='rgb(0, 0, 206)' >
<tr>
<th>id</th>
<th>date</th>
<th>time</th>

</tr>";
for($i=0; $row = $query->fetch(); $i++){
    echo "<tr>"."";
  echo "<td>" . $row['id'] . "</td>";
//  echo "<td>" . $row['country'] . "</td>";
//  echo "<td>" . $row['type'] . "</td>";
//  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
//  echo "<td>" . $row['status'] . "</td>";
//  echo "<td>" . $row['Available'] . "</td>";
  echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"onClick=\accept.php?id=" . $row['id'] . "&start=true></td>";
}
echo "</tr>";
echo "</table>";
echo "</form>";
//print_r(PDO::getAvailableDrivers());
}
function infocurl2($ch)
{
    echo 'CURLINFO_CONNECT_TIME: '.curl_getinfo($ch, CURLINFO_CONNECT_TIME).'<hr />';
    echo 'CURLINFO_CONTENT_LENGTH_DOWNLOAD: '.curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD).'<hr />';
    echo 'CURLINFO_CONTENT_LENGTH_UPLOAD: '.curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_UPLOAD).'<hr />';
    echo 'CURLINFO_CONTENT_TYPE: '.curl_getinfo($ch, CURLINFO_CONTENT_TYPE).'<hr />';
    echo 'CURLINFO_EFFECTIVE_URL: '.curl_getinfo($ch,  CURLINFO_EFFECTIVE_URL).'<hr />';
    echo 'CURLINFO_FILETIME: '.curl_getinfo($ch, CURLINFO_FILETIME).'<hr />';
    echo 'CURLINFO_HEADER_SIZE: '.curl_getinfo($ch,  CURLINFO_HEADER_SIZE).'<hr />';
    echo 'CURLINFO_HTTP_CODE: '.curl_getinfo($ch,  CURLINFO_HTTP_CODE).'<hr />';
    echo 'CURLINFO_NAMELOOKUP_TIME: '.curl_getinfo($ch, CURLINFO_NAMELOOKUP_TIME).'<hr />';
    echo 'CURLINFO_PRETRANSFER_TIME: '.curl_getinfo($ch,  CURLINFO_PRETRANSFER_TIME).'<hr />';
    echo 'CURLINFO_REDIRECT_COUNT: '.curl_getinfo($ch,  CURLINFO_REDIRECT_COUNT).'<hr />';
    echo 'CURLINFO_REDIRECT_TIME: '.curl_getinfo($ch,  CURLINFO_REDIRECT_TIME).'<hr />';
    echo 'CURLINFO_REQUEST_SIZE: '.curl_getinfo($ch, CURLINFO_REQUEST_SIZE).'<hr />';
    echo 'CURLINFO_SIZE_DOWNLOAD: '.curl_getinfo($ch,  CURLINFO_SIZE_DOWNLOAD).'<hr />';
    echo 'CURLINFO_SIZE_UPLOAD: '.curl_getinfo($ch,  CURLINFO_SIZE_UPLOAD).'<hr />';
    echo 'CURLINFO_SPEED_DOWNLOAD: '.curl_getinfo($ch,  CURLINFO_SPEED_DOWNLOAD).'<hr />';
    echo 'CURLINFO_SPEED_UPLOAD: '.curl_getinfo($ch,  CURLINFO_SPEED_UPLOAD).'<hr />';
    echo 'CURLINFO_SSL_VERIFYRESULT: '.curl_getinfo($ch,  CURLINFO_SSL_VERIFYRESULT).'<hr />';
    echo 'CURLINFO_STARTTRANSFER_TIME: '.curl_getinfo($ch, CURLINFO_STARTTRANSFER_TIME).'<hr />';
    echo 'CURLINFO_TOTAL_TIME: '.curl_getinfo($ch, CURLINFO_TOTAL_TIME).'<hr />';
    echo '<hr>';
}
function location($url,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);

    $result = curl_exec($ch);
    echo $html1 = str_get_html($result);
    return $result;
}
function location1($url,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2 = curl_exec($ch);
    infocurl2($ch);
    $html2 = str_get_html($result2);
    $input=$html2->find("input[name=_sid]");
    foreach($input as $span){
        $a=$span->value;
    }
    $mas = array(
        'process'=>'login',
        '_sid'=>"$a",
        'email'=>'egyptian_guide@hotmail.com',
        'pwd' => 'visaHQ2014',
    );
    var_dump($mas);
    curl_close( $ch );
    return $mas;
}
function location2($url2,$header,$mas){
//    header('Location: https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314');
//    exit;
//    echo var_dump(get_headers('https://adm.tlscontact.com/ae2dk/index.php', 1));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url2);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");

    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
    infocurl2($ch);
    $html2 = str_get_html($result);
    $input=$html2->find("input[name=_sid]");
    foreach($input as $span){
         var_dump($a=$span->value);
    }

    infocurl2($ch);
//    var_dump($result);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    }
     curl_error($ch);
    echo $html1 = str_get_html($result);
    curl_close( $ch );
}


function location3($url3,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url3);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");

    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
    infocurl2($ch);
//    var_dump($result);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    }
    curl_error($ch);
    echo $html1 = str_get_html($result);
}












function location0($url,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result1 = curl_exec($ch);
    echo var_dump(get_headers($url, 1));
    $html1 = str_get_html($result1);
    echo $html1;
    $input=$html1->find("input[name=_sid]");
    foreach($input as $span){
        $a=$span->value;
    }
    $mas = array(
        'process'=>'login',
        '_sid'=>"$a",
        'email'=>'egyptian_guide@hotmail.com',
        'pwd' => 'visaHQ2014',
    );
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $html = curl_exec($ch);
    preg_match_all('/Location:(.*?)\n/', $html, $matches);
    if (count($matches[1])>0){
        $location[]=$matches[1][0];
        $location=get_all_redirects($matches[1][0],$location);
        return $location;
    }
    else{
        return $location;
    }
    echo "<hr>";
    echo var_dump(get_headers($url, 1));
   echo  $html2 = str_get_html($result2);
}








function get_all_redirects($url,$location=array()){
    $url=trim($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'MJ12bot');
    $html = curl_exec($ch);
    preg_match_all('/Location:(.*?)\n/', $html, $matches);
    if (count($matches[1])>0){
        $location[]=$matches[1][0];
        $location=get_all_redirects($matches[1][0],$location);
        return $location;
    }
    else{
        return $location;
    }
}


?>
