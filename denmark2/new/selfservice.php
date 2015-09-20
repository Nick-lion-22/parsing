<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
require_once('simple_html_dom.php');
require_once('conect.php');
$header = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
    'Referer:https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4253314'
);
$header2 = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
);
function SendRequest($url, $header){
    include_once('simple_html_dom.php');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2 = curl_exec($ch);
     $html1 = str_get_html($result2);
    //infocurl2($ch);//дає всю інформацю про курл інфож
echo curl_error($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    };
//   echo $html1 = str_get_html($result2);
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
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
    //infocurl2($ch);//дає всю інформацю про курл інфож
    echo curl_error($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_errno($ch);
    }
    echo $html1 = str_get_html($result);
    curl_close($ch);
    return $mas;
}
$url2='https://adm.tlscontact.com/ae2dk/login.php';
$url3='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314';
$url4='https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4253314';
//$dom2=SendRequest($url,$header);






















 $redirect=location0($url2,$header2);
echo $redirect;
get_all_redirects($url2,$redirect);
//location3($url3,$header);
























































//location3($url4,$header2);
//location3($url3,$header);

//if($mas)
//{
//    location2($url2,$header,$mas);
////    location3($url2,$header);
//}
//$dom=location($url2,$header);

//    location3($url2,$header);

//var_dump($dom);
// var_dump($dom);
//    $input2=$dom->find("div[class=take_appointment] a[class=dispo]");
//    foreach($input2 as $span){
//
//     $item1['time']=$span->plaintext;
//     $item1['date']=substr($span->onclick ,166 , -35);
//        $max_masiv[]=$item1;
//
//}
//if(is_array($input2)){
//    $m=1;
//    foreach($input2 as $span){
//
//        $item1['time']=$span->plaintext;
//       echo  $item1['date']=$span->id;
//        $max_masiv[]=$item1;
//        $m++;
//    }
//}


//if($max_masiv){
//
//conect($max_masiv);
//}
    ?>
</body>
</html>
