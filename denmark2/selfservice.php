<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
include_once('simple_html_dom.php');
include_once('follow.php');
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
    'Referer:https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314',
    'DNT:0',
    'Cookie:__utma=111872281.1638365990.1407193090.1407345159.1410765277.4; __utmz=111872281.1407193090.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _ga=GA1.1.1638365990.1407193090; l2_pv23167=1; optimizelySegments=%7B%22300052124%22%3A%22false%22%2C%22300028445%22%3A%22direct%22%2C%22300028446%22%3A%22ff%22%7D; optimizelyEndUserId=oeu1407247382614r0.13841275652250007; optimizelyBuckets=%7B%7D; ajs_user_id=null; ajs_group_id=null; _sio=0db57403-3466-4640-a6d5-6a2169b97661----; hblid=y5LGg3B7tD6M93sz1Y4Bh90nDL91o1AA; mp_dc52d7d422b2946ea507a5ac632169b1_mixpanel=%7B%22distinct_id%22%3A%20%22147a67b00419-008655c76e1e3a-42504336-100200-147a67b004214%22%2C%22%24initial_referrer%22%3A%20%22http%3A%2F%2Flocalhost%2Fmywork%2Fcurl_task%2F%22%2C%22%24initial_referring_domain%22%3A%20%22localhost%22%7D; olfsk=olfsk8440550244156192; visitor_id9362=375185056',
    'Connection:keep-alive',
);
function SendRequest($url, $header ,$url2){


    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
////    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
//    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
//    $result2 = curl_exec($ch);
////    $object_1->curl_redir_exec($ch, $content = '');
//    $info = curl_getinfo($ch);
//
////    echo  '<br>'.'Прошло ' . $info['total_time'] . ' секунд во время запроса к ' . $info['url'].'<br>';
//    echo  '<br>'.'кількість перенаправлень  ' . $info['redirect_count'] . 'а це силочка на яку  ' . $info['url'].'<br>'.'<br>';
////    echo '<br>'. 'це видає хедер к ' . $info['request_header'].'<br>';
////     $html1 = str_get_html($result2);
//    //infocurl2($ch);//дає всю інформацю про курл інфож
//echo curl_error($ch);
//    if(curl_errno($ch))
//    {
//        echo 'Ошибка curl: ' . curl_errno($ch);
//    };
//     $html2 = str_get_html($result2);
////    var_dump($html2);
//    $input=$html2->find("input[name=_sid]");
//    foreach($input as $span){
//        $a=$span->value;
//    }
//
//
//    $mas = array(
//        'process'=>'login',
//        '_sid'=>"$a",
//        'email'=>'ludelyn@visahq.ae',
//        'pwd' => 'visaHQ2014',
//        'fg_id'=>'4327979'
//    );
//    var_dump($mas);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
//    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
////    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
//    $result = curl_exec($ch);
////    $object_1->curl_redir_exec($ch, $result = '');
////    var_dump($object_1);
//    $info = curl_getinfo($ch);
//
//    echo  '<br>'.'Прошло ' . $info['total_time'] . ' секунд во время запроса к ' . $info['url'].'<br>';
//    echo  '<br>'.'кількість перенаправлень  ' . $info['redirect_count'] . 'це круто коля розумний к ' . $info['url'].'<br>'.'<br>';
//    echo '<br>'. 'це круто коля розумний к ' . $info['request_header'].'<br>';
//    //infocurl2($ch);//дає всю інформацю про курл інфож
//    echo curl_error($ch);
//    if(curl_errno($ch))
//    {
//        echo 'Ошибка curl: ' . curl_errno($ch);
//    }
//  echo  $html1 = str_get_html($result);

//    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2 = curl_exec($ch);
//    $object_1->curl_redir_exec($ch, $result = '');
//    var_dump($object_1);

    echo  $html3 = str_get_html($result2);









    curl_close($ch);
}
//function location0($url,$header){
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
//    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
//    $result1 = curl_exec($ch);
//    echo var_dump(get_headers($url, 1));
//    $html1 = str_get_html($result1);
//    echo $html1;
//    $input=$html1->find("input[name=_sid]");
//    foreach($input as $span){
//        $a=$span->value;
//    }
//    $mas = array(
//        'process'=>'login',
//        '_sid'=>"$a",
//        'email'=>'ludelyn@visahq.ae',
//        'pwd' => 'visaHQ2014',
//    );
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
////    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
//    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
//    $html = curl_exec($ch);
//    if(curl_errno($ch))
//    {
//        echo 'Ошибка curl: ' . curl_error($ch);
//    }
//    $html = str_get_html($html);
//    return $html;
//    preg_match_all('/Location:(.*?)\n/', $html, $matches);
//    if (count($matches[1])>0){
//        $location[]=$matches[1][0];
//        $location=get_all_redirects($matches[1][0],$location);
//        return $location;
//    }
//    else{
//        return $location;
//    }
//    echo "<hr>";
//    echo var_dump(get_headers($url, 1));
//    echo  $html2 = str_get_html($result2);
//}
$url2='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4327979';
$url3='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314';
$url4='https://adm.tlscontact.com/ae2dk/login.php';
//$dom2=SendRequest($url,$header);




SendRequest($url4,$header2,$url2);

?>
</body>
</html>
