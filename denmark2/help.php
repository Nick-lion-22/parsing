<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style=" color: #2e1805; margin:50px 0 0 300px;  position:absolute;">
<?php
include_once('simple_html_dom.php');
include_once('conect.php');
$btime = microtime( true );
$header = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
    'Referer:https://adm.tlscontact.com/ae2dk/login.php',
    'DNT:0',
'Connection:keep-alive',
    'Connection:keep-alive',
    'Cookie:TLScontact=7ce97aadff59ab3636460efc7c8b2ea1; tlscontact_lang=en; uid=ClsAO1P0XMZ9ABrtAyTYAg==; TLScontact=14188ab6426f3c991b87783b50f1c3b1'
);
function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, "./_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "./_cookies.txt");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_error($ch);
    }
    $html = str_get_html($result);
   return $html;

}
//visaHQ2014
//Email: ludelyn@visahq.ae
//Password: visaHQ2014
//https://adm.tlscontact.com/ae2dk/login.php
$url0='https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221%247%2444%2421%24227%24195%24228%24120%24228%24113%24154%24114%24232%2420%24203%2467%2446%2476%24241%24129%2492%24213%2466%24207%24185%2432%24130%2474%242%2485%245%24197';
$url1='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html';
$url2='http://www.secomunidades.pt/vistos/index.php?option=com_content&view=article&id=204&Itemid=161&lang=en';
$url4='https://adm.tlscontact.com/ae2dk/login.php';

$form=array(
//    'option'=>'com_content',
//    'view'=>'article',
//    'id'=>'204',
//    'Itemid'=>'161',
//    'lang'=>'en'
    '_sid'=>'3d95c5594a3c8728a4d95d3c94554df4',
    'email'=>'ludelyn@visahq.ae',
    'process'=>'login',
    'pwd'=>'visaHQ2014',


);

$formpost=http_build_query($form);

$table=SendRequest($url4,$formpost,$header);
echo $table;
// $mas="$table";
//$masiv=explode(';', $mas);
//// echo gettype($masiv);
////echo $table;
////var_dump($table);
////echo $dani=$table->find('doc');
////if(is_array($dani)){
//$i=0;
//foreach($masiv as $span){
//$i++;
//    $SPECIAL_DAYS[$i]=explode('= new Array',$span);
//
//}
////$item2=substr($item1,-60);
////$item3=substr($item2, 0,12);
////var_dump($SPECIAL_DAYS);
//if($SPECIAL_DAYS){
//    conect($SPECIAL_DAYS);
//}
//$masiv=$table['doc'];
//var_dump($table);
//$masiv=preg_split(';', $table, PREG_SPLIT_OFFSET_CAPTURE);
//var_dump($masiv);
//echo $table;
//$masiv=spliti(';',$table);

//echo $masiv;
//var_dump($masiv);
?>
</body>
</html>
