<?php
include_once('simple_html_dom.php');
include_once('follow.php');
//$mas = array(
//    'process'=>'login',
//    'redir'=>'index.php?fg_id=4253314'
//,        'email'=>'ludelyn@visahq.ae',
//    'pwd' => 'visaHQ2014',
//    'fg_id'=>'4327979'
//);
$header = array(
    'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0',
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Accept-Encoding: gzip, deflate',
    'DNT: 0',
    'Referer:https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979',
    'Cookie: tlscontact_lang=en; TLScontact=806d4232534b01751f1d7a9184b4a153; uid=ClsAO1P0XMZ9ABrtAyTYAg==; TLScontact=4dcb2ab378bb9e427e840316c88f936d',
    'Connection: keep-alive'
);
$header0 = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Connection: keep-alive',
    'DNT: 0',
    'Host:adm.tlscontact.com',
    'Referer:https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979',
    'Cookie: tlscontact_lang=en; TLScontact=806d4232534b01751f1d7a9184b4a153; uid=ClsAO1P0XMZ9ABrtAyTYAg==; TLScontact=4dcb2ab378bb9e427e840316c88f936d',
    'Connection: keep-alive',
    'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0'

);



    $header2 = array(
        'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
        'Cache-Control:no-cache',
        'Content-Type:application/x-www-form-urlencoded',
        'Pragma:no-cache',
        'Referer:https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314',
        'DNT:0',
        'Cookie:tlscontact_lang=en; TLScontact=91d7aecb0bcea55ef2883c46a2d5a368; uid=ClsAO1P0XMZ9ABrtAyTYAg==; TLScontact=4dcb2ab378bb9e427e840316c88f936d',
        'Connection:keep-alive',

);




function SendRequest($url,$url0,$url1,$url3, $header,$header0,$mas,$mas0,$mas1){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
    $n=curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
    var_dump($n);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
//    echo  $html = str_get_html($result);

//    $info = curl_getinfo($ch);
//    echo  $info['url'].'<br>'.'<br>'. 'це круто коля розумний к ' . $info['request_header'].'<br>';
    //infocurl2($ch);//дає всю інформацю про курл інфож
    echo curl_error($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    }
//    echo  $html1 = str_get_html($result);


    curl_setopt($ch, CURLOPT_URL,$url0);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
    $n=curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
    var_dump($n);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas0));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header0);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result0 = curl_exec($ch);
//    echo  $html0 = str_get_html($result0);

    $info = curl_getinfo($ch);
    echo  $info['url'].'<br>'.'<br>'. 'це круто коля розумний к ' . $info['request_header'].'<br>';
    //infocurl2($ch);//дає всю інформацю про курл інфож

    curl_setopt($ch, CURLOPT_URL,$url1);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
     $n=curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
    var_dump($n);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas0));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header0);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result1 = curl_exec($ch);
//    echo  $html1 = str_get_html($result);

//    $info = curl_getinfo($ch);
//    echo  $info['url'].'<br>'.'<br>'. 'це круто коля розумний к ' . $info['request_header'].'<br>';
    //infocurl2($ch);//дає всю інформацю про курл інфож




    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL,$url3);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
    $n=curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
    var_dump($n);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas1));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header0);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2= curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    }
    echo  $html2 = str_get_html($result2);
//    var_dump($html2);

    $info = curl_getinfo($ch);

    echo  $info['url'].'<br>'.'<br>'. 'це круто коля розумний к ' . $info['request_header'].'<br>';
    curl_close($ch);
}
$url='https://adm.tlscontact.com/ae2dk/login.php';
$url0='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4327979';
$url1='https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979';
$url2='https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979';
$url3='https://adm.tlscontact.com/ae2dk/css/common.css?date=201409240254';

$mas1 = array(
    'date'=>'201409240254',
//    '_sid'=>"$a",
//    'email'=>'ludelyn@visahq.ae',
//    'pwd' => 'visaHQ2014',
//    'fg_id'=>'4327979'
);
$mas0 = array(
    'redir'=>'/index.php?fg_id=4253314',
//    '_sid'=>"$a",
//    'email'=>'ludelyn@visahq.ae',
//    'pwd' => 'visaHQ2014',
//    'fg_id'=>'4327979'
);
$mas = array(
    'process'=>'login',
    '_sid'=>'e007b35d5d04a45b1ab4042b64eea8e1',
    'email'=>'ludelyn@visahq.ae',
    'pwd' => 'visaHQ2014',
);

SendRequest($url,$url0,$url1,$url3, $header,$header0,$mas, $mas0,$mas1)

?>