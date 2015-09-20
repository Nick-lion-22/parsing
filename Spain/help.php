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
    'Referer:https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221%247%2444%2421%24227%24195%24228%24120%24228%24113%24154%24114%24232%2420%24203%2467%2446%2476%24241%24129%2492%24213%2466%24207%24185%2432%24130%2474%242%2485%245%24197'
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
$url2='https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppSchedulingGetInfo.aspx';

$formp2=array(
    '__EVENTTARGET'=>'ctl00$plhMain$cboVisaCategory',
    '__EVENTARGUMENT'=>'',
    '__LASTFOCUS'=>'',

    '__VIEWSTATE'=>'HZG4WYKLQe9Sz0cAob2GEXc9H3FYKuj1nZlGFZme5R664nI+c4RLkM4s3BAF6AQGk09+OY5wAJKJsAmwZFp7V23mosif2q1EOr3HPifRjJGi6DoNstkuLX5au205dT3M+liOOZfUEQkG0cCzbDqt/HFzHqqV+QathiDyAGDo4RnwBZlp7xLLoO//C25SXzkETssOFSf40XGURVTeS2L4DaTubJFu9N1T0fhthh4xkUlTZJGwsPFOhFv0rwxP440R91nOWE5wpN0rd2sa95EnK7umhu3//J01NoCfUOn8uRzoxvBZoL3D/nh2xc7nkbvyPyO6o7Xpo5Sg1jIwulanwFlFH0OacRZqrbE0J6QIelclL5BOkuifgMbAGdLOYFuAIYM194QzFj42y53YZoDsB3DDOYb9N/IwrUYI0HIR5NhLmIo80rzQo41hK7qwdkoWT1hE519a6hLjiJTifn/2v3y7gIG7qIX+D+SpnDhJp0mPrN2qUPkxkT/hVA8Ei4dD5M+CW7Qo+7PCZbrHvdEAUbXtPQDb8MLRF+dc2vQPUOhdgQcfS6qKmbDRJUdnsDocph4w+N4wFu2r7PzIN4sl+olXlGsufMB9sfERjKi9NCzPGOGeBzQkMkt/Ot8aUpdHDitTv2eb0Z4e/w2NZrlX/QjirBcUFUo8SMtMhP/9lcNRGmro2I/nyitPXI82MWiubqYIlkJBAASAhapPRwfk2Bx0VtUmWqyg71H8m5nkZGdFaoriQJnSa/7Dvae4q9oQEwxNR7lLZb2mXb+Wqbthn3fCkaDWJmQgrz9Lu7YpMR9HylmRC43RdumvSrpmQ01YUwb5wJj446JRivj1M/XE4GGN4hN3Mo0ARWsYQ76uRWOXtfMYgLFWkzg359qf2gRkKwciRfzTRNHrfFjLeLyRKvksAUOuYvhcRkzmwKVVduH5/nzx0H0B0Wt9RFV1Lpfcof1s7YKv2jGEjYNn0vxXWt2Q4/ivHVO5Edk8GU0qQDh2yFZov6Nf6nzEbmDTcz4Nj0MyVyCCVQYWPjWzI1unfoj62fCOKay4gzV3YBCGJKuQSbLUcpFXfIvZwahnUqoFqgwfEbqomtslGaNIUsb88OLpNVvbTX0bRg8ubc4N2PWu6V7rhuf2eNKWEAcG/W2awSb5DTNnKBFBLOliMGHskWg3jErYF3EkNTkoBfX3xdXx+i6Spqob2xS2BUQySazYfQu1CHWhjmXw75NEODx13BxJuQQQWmS70coG2/iWlFbmvwhzhxknZEJLEkg+McjilqvN3QLH35zP8PvU+8NwHxntGD0Cwt7HrFHSQRcHl9Y3CZZP6MLfWyeyGdYNpT1nnt2cGZchhrQE9HvziPOSHyMin+ybFNFK4Zd4v0J5+EmzabkTXXHfyRhysYsQT+TwOIsS4RiqymAZCSXy+op6uhn0X8gy5xuaKUQUJmlmi+p28zYryd2gfEHpd78sdcMeYnQKXmxyzZDpXOy8unObAS+rnOLCor9Q/ehuV115psuY0OkshorRg0BO7gJioq9U8sggpUP2YfWO3n89JHgfyXjC53Y7MWzz+GcttIrsPtzhK7QTn54FAvSyUl2gREtqu+/4tWVlDJhjLsobsQof+KnNiLf4jv/wFCAtNzm2Gou5ak5xiXQomh2aSDjWMIlY+BJ6UjP9PL7LyaGFhXQ9SUVV5eTl+pdG94p8EvDMB9Hl/KH2TyWFbQzaJ3deG1m4h8aEAqvJKHrWJfZxmoAKnEjvjoooUtnRKh10O+eo79aNiV/0H1GfZ8AHNPnRdfqoBVTBHp8/aVXdS2yVNwZcd91aUBAAT6U1EUK+8uvXfXXzAH9rocIgI4LvPmn52ptoUicFDwg25d+T5vb3eG0ELbwR4n1bTSLDLm53F/jrNdWGgI3lNCzgebeSFMWMm+QlNpFlBVJPmDeup/kbjUZzyuVt3hvtvxPckJSpO5UzlbRtBYYgBPhkOVdkNeikPDBcA8CF2g==',
    '____Ticket'=>'3',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'oJ1exkCK2dS0nPlS+OSPwRokNpzIazjlBIMTCEDNErUTaItvRBILs0+1aQic2oY8TvLiP2rbjDbhCOeX+zDxLnc1vJXEyeNG+gt4v0gjn08FItwFo2A8AwFdma/RK/XT+6Es3fm4iEVpTx/N7Ddatpt2U+T6oOmZ/GkVtxocIee2mMcV',
    'ctl00$plhMain$tbxNumOfApplicants'=>'1',
    'ctl00$plhMain$cboVisaCategory'=>'522',
    'ctl00$plhMain$hdnMode'=>'S',
);

$formpost=http_build_query($formp2);
// $table=Send($url0,$formpost,$header);
$table=SendRequest($url2,$formpost,$header);
    $dani=$table->find("span[id=ctl00_plhMain_lblMsg]");
    if(is_array($dani)){
    $m=1;
    foreach($dani as $span){

         $item1=$span->plaintext;
      
    }
}
?>

<form method='GET' action='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html' >
<?
echo "
<table style=border:'1'>
<tr>
<th>id</th>
<th>date</th>
</tr>";
$item2=substr($item1,-25);
$item3=substr($item2,0,12);
echo "<tr>"."";
echo "<td>" . 1 . "</td>";
echo "<td>" . $item3 . "</td>";
echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo '('.round( microtime( true ) - $btime, 4 ).' sec.)';
?>
</body>
</html>
