<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include_once('simple_html_dom.php');
require('table.php');
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
function SendRequest($header ,$url2){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url2);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies777.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "./my_cookies777.txt");
//    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($mas));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLINFO_HEADER_OUT, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2 = curl_exec($ch);
  $html3 = str_get_html($result2);

    curl_close($ch);
    return $html3;
}
$url2='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4327979';

$html=SendRequest($header2,$url2);
$table=$html->find("li a[class=dispo]");
foreach($table as $span){
    $item1['date']=$span->plaintext;
    $it_time=$span->onclick;
    $item2=substr($it_time,-82);
    $item3=substr($item2,37,50);
    $item4=substr($item3,0,10);
    $item1['time']=$item4;


    $max_masiv[]=$item1;
}
if($max_masiv)
{
conect_table($max_masiv);
}
var_dump($max_masiv);
echo ",k";
?>
</body>
</html>
