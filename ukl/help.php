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
    'Referer:https://www.visa4uk.fco.gov.uk/Appointment/AppointmentSchedule?headerId=00000000-0000-0000-0000-000000000000&formId=00000000-0000-0000-0000-000000000000'
//    'Cookie:V4CookieInfo=ShowCookie=false; _ga=GA1.3.1413586767.1408020496; TS0147c885=01710a7a2d8382e167dbc3f9b330dde69fa963cce3f04fd1c26372d3bc3877e9010ed73317bca21348eb26508293f6bf680d9e858334f1f3bd6966e7db2b8d288d428d900eee77adeda699a79c032137f96a190871; TS0147c885_28=016f9c293419d0fc7747bac0d32801143ef75cb9a62d17dae9d5788a551106597c3d482c561ef503883aa81b03d7f5ff687ed2158f; __RequestVerificationToken=7bSHkqq1o1iwPRkuRqeuqaj3mnesmQBP3rgfuzTkoBcOsc7sSKhIlMwBruQ3IPCE1l1Gir1lWIememXq81OYsBJ7o1s1; .ASPXAUTH=8B4593FBF5AD05D3B45CB199F01B6D6FBF9401D16E5D77AF9AB58354C9A784079DD8F7FB8EFCD99C054547DA3D8F8A5B21AAE442DBDC5D46F1AF0471CB8D9FE8EF8960D0E33CD28839260F6A4ADA7A3B00B93783E95AEBD0F8DA0FE299A3E1904A07DF3275B5350B5E82435B80EAC64E6E4ABD96CA5EFC52176B3BE0CE75A6258A467BC060FB981FAACDBA91BC8F494D52D3561976254472F78CB704ED10A3652B21ED89FD3DC94E9DAAB85EB5FD8E2C4797849682FE7BE78137F4F54B10230529A20A664D644CDEDFC308EC3573516B7C36AB754C79090E7197FDBD079348A0C2A8470B4C58D82A28D55B4C8230CBB8E532FC17F58A5F75891D5C7C6FDFDFCF02CAA38F1D7922330B8E916D4A57D1BA1F6A7C1819078907F14DB805CCDD7F191A9C721C36A58C8A8414FE96209A166B12C222095703059323852A2C22C540BF8D618FD383194A629CA4E1B1ACD37E62378FDBA2C26951829873783B486A0B5789930805ED7679E0D72FECE9E3AB011856AB454AC8A2EAAEFFE6A504A30A68107C06F7E56A800BD73D881D5BDE6B77E15B5FAD281356720FE622A48E43D4C51DFA48666B8DE8AC167D5CD3A987E6FC1BA357C8E87C5C802DD78A07CA86D8708AA1D7E32B5E0BAC76AA18743973F458AFCFB03F5684A26B067C45D274FCD44828B989259DA78781BD105ACA18BD6FA54E05CAE4A03CF4E3041119CBE8993361B33A5D3190B17E77B512EB69633E4AFE43A80F552FB3B86F9DBC23134E6FCA6EECD26C1A93D77F1D4083928A3347A6244EB46E669F46031DFD70583140C9926098D7695778FE76662817CCFBE18AE8F4C3DE27C994D96AAC2632F2E0AA959CB2FAD269C5AFC71021C5EB6C9C3F8796629BB2387379; ASP.NET_SessionId=oygdnypzintwguphk3uvuhat'
);
function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
////    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, "./_cookies.txt");
//    curl_setopt($ch, CURLOPT_COOKIEFILE, "./_cookies.txt");
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
//var_dump($html);
}

$url0='https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221%247%2444%2421%24227%24195%24228%24120%24228%24113%24154%24114%24232%2420%24203%2467%2446%2476%24241%24129%2492%24213%2466%24207%24185%2432%24130%2474%242%2485%245%24197';
$url1='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html';
$url2='http://www.secomunidades.pt/vistos/index.php?option=com_content&view=article&id=204&Itemid=161&lang=en';
$url4='https://www.visa4uk.fco.gov.uk/Appointment/GetAppointmentAvailability?id=a4b8eb4e-aab5-e311-95ab-005056927793&count=%0A++++-1%0A++&selectedPostVisaTypeId=980';

$form=array(
//    'option'=>'com_content',
//    'view'=>'article',
//    'id'=>'204',
//    'Itemid'=>'161',
//    'lang'=>'en'
    'headerId'=>'00000000-0000-0000-0000-000000000000',
    'formId'=>'00000000-0000-0000-0000-000000000000',


);
echo "hellov polisman";
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
