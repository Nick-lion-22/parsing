<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style=" color: #2e1805; margin:50px 0 0 300px;  position:absolute;">
<?php
include_once('simple_html_dom.php');
$btime = microtime( true );
$header = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
    'Referer:https://www.visaservices.firm.in/Jvac-AbuDhabi-Appointment/AppScheduling/AppWelcome.aspx'
);
function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
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
$url2='https://www.visaservices.firm.in/Jvac-AbuDhabi-Appointment/AppScheduling/AppSchedulingGetInfo.aspx';

$formp2=array(
    '__EVENTTARGET'=>'ctl00$plhMain$cboVisaCategory',
    '__EVENTARGUMENT'=>'',
    '__LASTFOCUS'=>'',

    '__VIEWSTATE'=>'HpZ/QviMMZ/bEa2zPJa1JddfXpuCZ8TzorWnbPr/TnnmDwrT7I4pcCEL9nY9uwb9qvHH+PAJycvqJ0uSjgsaqSm3EG9WD5YLX7/Fu2UTMPR37gf1/P8EvzisEXWvC5ciquODyB7TWr0wju5xqQquZcj7gOxgd37IeSW4w1a3smcHkS0CJ67vbeIZZqdf7duuqBM4R0v9ISrYvw5jerJIYYflT0bhO2UWCq68+VBS1yMBPT9vNbCvxMjQlO+0Y9OLSh4WUtAWAuDIiB5rM7xv8knb61O2Wy+iqqvn+cFxpThyovCcGQZAViXyTv1zItQXXLEqmhqutJy/mA4Y+zMwpKPekfrEVehsBIyTzawZ4sBhpOV8Ez9bNvOAUfqDjD66YeX4MZ4Fi+7NWXFf4prKtv3dqxq1E8r9jpH9dgC2ErHSJsKImMolvSbuv/umEt2ikU6PT5FvkuJrF8mR9qtQi48PuLNWrH3J+f2qIfaYhd1RHhVMqsV01P+JqFQC1mRmq8nuChY02q5dy5plr/oVnC+BzJ/ipK16AFzIKQLDVnCES0IsZysVk3W0dR7cASk6wPqqwVFnsSfX3+tkzFLszrTQ+ViC0IDruGHp9UsTKhiJ9XQEq1TBUWGaEosVnyb6BXl1qq9HHoud0vzSADlXmbuFKZg5BG+fFWVWTmr3nlIVumhYXzpg3t1BB1kagwH0JtF9pri5fKfjlEo3tlvAzQ==',
    '____Ticket'=>'3',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'5m7AD8DD/GctJZ00/PmUGlUzVfiofNrDdjPBgLhTWoeOfg/4BkQoU7PRqB/73bDTEBB7XJOtsocmuH0i2JkHnA==',
    'ctl00$plhMain$tbxNumOfApplicants'=>'1',
    'ctl00$plhMain$cboVisaCategory'=>'1',
    'ctl00$plhMain$hdnMode'=>'S',
);

$formpost=http_build_query($formp2);
// $table=Send($url0,$formpost,$header);
//SendRequest($url2,$formpost,$header);
$table=SendRequest($url2,$formpost,$header);
    $dani=$table->find("span[id=ctl00_plhMain_lblMsg]");
    if(is_array($dani)){
    $m=1;
    foreach($dani as $span){

         $item1=$span->plaintext;
    }
}
echo
"<form method='post' action='https://www.visaservices.firm.in/Jvac-AbuDhabi-Appointment/AppScheduling/AppStatusPage.aspx?param=q5a+uqrpZxh27ThU6Kcs2QqJFBeROjsQ8cBxquAYizs=' >
<table style=border:'1'>
<tr>
<th>id</th>
<th>date</th>

</tr>";
$item2=substr($item1,-12);
echo "<tr>"."";
echo "<td>" . 1 . "</td>";
echo "<td>" . $item2 . "</td>";
echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo '('.round( microtime( true ) - $btime, 4 ).' sec.)';
?>
</body>
</html>
