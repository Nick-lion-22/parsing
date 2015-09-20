
<?php
include_once('simple_html_dom.php');
include_once('conect.php');
$btime = microtime( true );
$header = array(
    'Accept:application/json, text/javascript, */*; q=0.01',
    'User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:32.0) Gecko/20100101 Firefox/32.0',
    'Accept-Language:uk,ru;q=0.8,en-us;q=0.5,en;q=0.3',
//    'Location	/User/Home',
'X-Requested-With:XMLHttpRequest',
    'Content-Type:application/x-www-form-urlencoded',
    'Accept-Encoding: gzip, deflate',
    'DNT:1',
    'Connection: keep-alive',
    'Referer:https://www.visa4uk.fco.gov.uk/appointment/appointmentlocation?headerid=67845c74-e93b-e411-85bd-005056921984&formId=5772597a-e93b-e411-85bd-005056921984'
   );



function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
//    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, "./_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, "./_cookies.txt");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
  echo  $result = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_error($ch);
    }
//    var_dump($result);
    $html = str_get_html($result);
   return $html;
//var_dump($html);
}

$url0='https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221%247%2444%2421%24227%24195%24228%24120%24228%24113%24154%24114%24232%2420%24203%2467%2446%2476%24241%24129%2492%24213%2466%24207%24185%2432%24130%2474%242%2485%245%24197';
$url1='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html';
$url2='https://www.visa4uk.fco.gov.uk/Appointment/GetAppointmentAvailability?id=a4b8eb4e-aab5-e311-95ab-005056927793&count=%0A++++-1%0A++&selectedPostVisaTypeId=980';
$url4='https://www.visa4uk.fco.gov.uk/Account/Login';

$form=array(

    '__RequestVerificationToken'=>'I1W2lQt-5B12mLOnZCgH9pWrvdTYRX-in1m-fn0EaaHbjODR7u5JYsyhQIdriW78Jck4SzNkDtPrj-CUoTUlh3kMYC41',
    'Email'=>'hamada@visahq.ae',
    'Password'=>'visaHQ2014'
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

