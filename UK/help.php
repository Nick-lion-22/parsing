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
    'Referer:https://www.visa4uk.fco.gov.uk/appointment/appointmentlocation?headerid=67845c74-e93b-e411-85bd-005056921984&formId=5772597a-e93b-e411-85bd-005056921984',
    'Cookie:V4CookieInfo=ShowCookie=false; _ga=GA1.3.1413586767.1408020496; __RequestVerificationToken=jYbwJqwvm8u2aELMiatAq6U1N021aoHZhs07cB57cR38wgFC7crHmbUwLmdPvCfb33eoPTW8IdoXUTfFIB_n1b1uh0M1; TS0147c885=01710a7a2d2991ea0eb50fa3df3fa0cb0bc7131410c5699f4e578ec135409e7b5e39bb2ee19bfc8ffb7b74abd487791e99cd51219b28a8a2aa86c6fdcb05b9715186c9f5e0dde2d6c440f20c02ccb7a2e3ede6956bbd5bf18e85d20e10a27ca9f32103614d; TS0147c885_28=016f9c2934f4e47d573c904e17d48c064a9dc8dd12c72c855af6d8198acf4f2167432609a6789d7ce7b2c24e1d79ad9acb8333b5fc; ASP.NET_SessionId=suobqormq0oedtwr4jwx4c4x; .ASPXAUTH=80FD0E5715B03DC1005FD6351D8EF236B522C91D812F376ED0C831F4678BADD85219C6B424490E5C66A0922E73365662A9D64B80F93534788B1C5C5006CD71F1C0054AFCA7852E0A34668CEEC511E54E0607279BA19CDF5369EEC10FBDC6F6C823996B66A4DA70B2FAB06A95AADD538C3018FB4347245F5918D22C5299996F256A4B8D5EBC7F9CD4AB121226922A6306CD2011CD17C4DCC316CE07CB7D5AA05A08D74617402D55C595C8CD1B81006F18D09E64B99D069075CC157D8F955B6D5E1058E2DF681410AE79CC728C5F471EE5DD57307F0D162500C65D3F64D785E6900CD06C77C8847604BE27FF464B236EC225CC8915257A1D9567006F94022E3FEDD014D9F6BCAFCBEC96BFB7D8E2B9C129262E7431C9C3908B3814E54CB0AC53F49B4B4ED42CF38206DB8BDDDA9BBAE7623FA18EAFEFD22340A76B79A393BCA0A899221A07C95C3C6059D61D785D00EBA559C95B1F6B4AADCCD90F632D5DF68E6870CC561C880BE310D449F834337AA6DD03F8D6DEE91EDD18992AE052E4A5B9B3A782ADE52B7952A39B0BB2248BF661EB6AFBA1D4A4E4F3F48DC75F980CD019A8415FDC50578777FDC734D249CF3A089AF10AA3CF35744813A4AFB679CF957783D331613F39E2FBF92E3AD61899FABC29E4B7BEF88B9E426E6B704767B236F35B656741CB7BFDC74B958C74A9A2C73226D0ECCD82D557B3EEF98BDEE5B39B86A0ACFE1F2009BA34CB9E0111022135659E242A7952969E1606C0A235D203856B7ACA0691E8A88B1BEE0037ACDB1DF023F2EED28A1184919983D6513962095D5ACB79F5646D7C9291D8D5D73230745C384322A6BA4BD793D0CB7DA15519F0CCF2AB056CABEB1D92CE9CDAC9851F323738DE89C803AB'
);
function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
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

$url0='https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221%247%2444%2421%24227%24195%24228%24120%24228%24113%24154%24114%24232%2420%24203%2467%2446%2476%24241%24129%2492%24213%2466%24207%24185%2432%24130%2474%242%2485%245%24197';
$url1='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html';
$url2='http://www.secomunidades.pt/vistos/index.php?option=com_content&view=article&id=204&Itemid=161&lang=en';
$url4='https://www.visa4uk.fco.gov.uk/Appointment/AppointmentSchedule?headerId=00000000-0000-0000-0000-000000000000&formId=00000000-0000-0000-0000-000000000000';

$form=array(
//    'option'=>'com_content',
//    'view'=>'article',
//    'id'=>'204',
//    'Itemid'=>'161',
//    'lang'=>'en'
    'headerId'=>'00000000-0000-0000-0000-000000000000',
    'formId'=>'00000000-0000-0000-0000-000000000000',


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
