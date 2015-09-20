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
    'Referer:https://www.visaservices.org.in/Portugal-Global-Appointment/AppScheduling/AppSchedulingGetInfo.aspx'
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
$url2='https://www.visaservices.org.in/Portugal-Global-Appointment/AppScheduling/AppSchedulingGetInfo.aspx';

$formp2=array(
    '__EVENTTARGET'=>'ctl00$plhMain$cboVisaCategory',
    '__EVENTARGUMENT'=>'',
    '__LASTFOCUS'=>'',
    '__VIEWSTATE'=>'bIqSzGwOZ249YpwcwooHIUqZqX4vtMEZmq/3wFoKjDC79fbLT32+Xlmg+BfT8LRjNeKqcyNtzWY8ehk5SEQr47xDNoGsJWQYm05MaGP+VUdXMNB2zg7rzmceu0TEWmm9ejAIBDT4I/dRrBPtCiPI6KBWIUX/YsX7IMlI+GKsqwpAyUllZUVWOgMTf/XJOuv8IQIV/JrNqFeyTdPAvnqM/Ua8HDniIb275Woioc+3kMfX8aNiOY4QFzYeI/BLZyHX3gU1iTDlaedT5O6wica29x4nsRzumdRsWhfZLF1UA+NZJwMoLQTT4dUJqsmsEQVr6Vkf1p1/mr9uWhtG+btKb7Ob/Win5llD8GDtO54kRFqg0nnbPMtVAmh3YGMG21QnBGJIjOGvIITSjjJk8L7XWhoVEfpZujKUNJqw8OtEdmRwxJg7xI7bPSsi6mZda/AS9vTOYYymktgkokNca/sgV2ljkl0hjJsEhW9Ueu7bBhce50L/FMxb1NGnNPd/X8g72U4ZY2UNDWUSkBl5C0J//CFrhbTfZt9piFvjd3CaStDqYKJW9rgFUGFm8nNy7rS2+KVS2qGADwRSX5vxx6bi6fXPt4VkumHK6ylXcaPPyJnGmXnISt968gNmI8/iCOy+3dBH0NZELUvzK04ZbvynI4ejcIRKc6UZz1NVQo0Q+cuAKcjSjxVohz6gSi96J3TqIIQE4ANg5p+lVz7Bf4uo0KiDcHovykJGleRvtvyX9Vmj9n6PCZN/Bq/Hgm1TBAzPTyU+Sfm8+yVWgtQh65GnEj3003kpzwC6nxsoWZFC571GRI48ffp7Rj4pAq9u1W+/zaWbttHdOpgeLVzARdzw1w7ubbjnSNZHA0TYT4z08nz2MX58vmaKcH/JbHqKmnbYAxMEIMXI6gQImY2xFBWt0tVU+FUaYz0NoaEBXE+PtyO523zFDa+bli5z18dgQiDLeOQicKeqqTctKF5kWzIPs4uL+1ODHwM5+/2EzsLWMRM116McPB6BcqPpBRBrv6Lzhf+KpQNTk24jLe0stYI2d9SajERvfwLt8URN6QVvB6/Droir+sHfvPl8D8b/gXkbycBMd+zwX5SFuEVEg94rWghZXNDa7Iqnlm1VRy1eJcT0RvovB+v0rbRMslCS8SoqcesRm7WXGfD8O6IK2UqRMsTKNOaewDXyJ69KbmXaftbh9Q828ZOlYPsEG5NoGXK5kyTbOb2V5fGPfQ53FeuRh5L6+v75kKz/DKrnZTxY+rO7Bnl2sKs3zT2T2n4pGvFwf2wzNsD1hnYjURYRn23Ni0fjKF15IG+Js1Mhw8nTTeCuBmtrorMMbNuFl5NlscL7pKUbftzFQuzUSlvdBtqZA0Vs1cQrFu3EZenFQ1Eqe5VhBV9/u4FtETqlH0w/KKO5QjLxzXoG/oN9IIGU+tGOaCQziAFyiJ9Mykomd1FJmnWy2yYGkyBUn8+x5zCnTdXQxXpuqN1t/igj5XCWMskBKA==',
    '____Ticket'=>'4',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'asjCv52FtwC8+asybuSP7BsUodz3Gn5LeOglGOnXhfjHacg8CwjT42SOs97v+OoEwkbGpMJ9AP8xYWPNZlbdoQ==',
    'ctl00$plhMain$tbxNumOfApplicants'=>'1',
    'ctl00$plhMain$cboVisaCategory'=>'2',
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
echo
"<form method='GET' action='http://www.vfsglobal.com/portugal/southafrica/' >
<table style=border:'1'>
<tr>
<th>id</th>
<th>date</th>

</tr>";
$item2=substr($item1,-60);
$item3=substr($item2, 0,12);
//$item2=substr($item1,-25);
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
