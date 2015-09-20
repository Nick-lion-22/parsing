
<?php
include_once('simple_html_dom.php');

$headerbig = array(
    'http://xaxax.com/tools/parsing/dubayi/help.php',
    'User-Agent:Mozilla/5.0 (Windows NT 6.3; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0',
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept:"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8"',
    'Accept-Language:"uk,ru;q=0.8,en-us;q=0.5,en;q=0.3"',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
'Accept-Encoding:"gzip, deflate"',
    'DNT:"1"',
    'Referer:https://www.visaservices.firm',
   'Cookie:ASP.NET_SessionId=c2fokgvmmdlw5r45ku0ovf55"',
    'Connection:"keep-alive"',
    'Cache-Control:"max-age=0"'
);
$header = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
//    'Content-Length:"15678"',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
    'Referer:https://www.visaservices.firm
    Cookie:"ASP.NET_SessionId=c2fokgvmmdlw5r45ku0ovf55".in/France-Global-Appointment/AppScheduling/AppSchedulingGetInfo.aspx',
    'Connection:"keep-alive"',
    'Cache-Control:"max-age=0"',

);
$formp=array(
    '__EVENTTARGET'=>'ctl00$plhMain$cboVisaCategory',
    '__EVENTARGUMENT'=>'',
    '__LASTFOCUS'=>'',
    '__VIEWSTATE'=>'qQkjZg+J72BYa5Z8q9CR+tF2UQmy0EdHUtbQP5W0BVcwakUqWGua3J9UpwqEwweOaeudGj1ahvUbN/4+pXmkyUw1CFTqRm9gMa0YCP0ZXuBRa6Rqtwo4VHEbDZSvFYza4B32hz77KY377pixRL46wNIjjV6OiJDrlRB3iGeg1MVirLdRugBTYtwnreKI2whRTr0RwP32NoU+W8Szdb7zJ2RNuCHwcjOFb8gQ0vCd4r207slMWaH1KMqhsO3y/CWJgkHHLNLxLqvl6Kz+vuWbTm1eTJye13PiEN5KEUVAp6iuB9n6RYgj6w0NPuMdbRedIJmevANDS36v4+YAx5YRv/DHCdxRgwzmz8qAG00eytVC76upVC6Ds9AXopjl7yLeUd2sYsdhziQ86hHCUr0Z1aSRWQPgO8iUrCcv2NRwcDTmUw6rHRndvVDsLOXwaxb2sHeFXg6beqiI4E8c6GiVXYXwAZSwXhpBO46ZA/zQ5d5n+9+wtrWz9PG+WoKaRJgA/5r5ftAx5GA12Isr780D1NpRqI9O9zrU7qRa0YR9ryaZ/qjtWVDsSdaFtcErPF4O3vCcJLb36qMT29l4vYIaht0nfxw2jx/mnmEkGPQr0dZkIc3yLWukmv4JdbTHdyfpyGOS7BNJHqgl6b9NNoX2z9PGOU/6+70jhkJvRrwkzlJoHjbKnNizhqSVUXjWeKikhKU6QvTdanS+4hx3LiZoo0QaAO6qsuw10i2A1hT+a4Mcc8aUJ0+SvgiEkFzCORFaTPi8Fa3cXz8jGJRLjx6+pviFQmO16EyhSp9bQvnqSWFMyefK45mR+QpN42+OHmj/2c9VzcFhv3TQo34avO4ZY8+HYwDFouTM31M9oDVT2LXxVCO7WwIZqBalnakAtRrYKSt9WkuHrcm8bvGAk2AS3o8H0/1KRYGaI/5hplDJqmzrcXvFjGbie9vF2qakoEaKx1VIbNdLfgL3Dys5dM/SpyBDTnq96cY0RqnDg6YgJOx33dOD/Y6vkdN/W2GoWmpauvFMCtwZ4w3zo9GhvaTucmbHVGUWbiPdj/0fE4i4CIpU7Hr8+XC4ZWyVEJ+FuSpP7x/OsLMJX2Xv+WRLio4WGqyT6RIcl5o5agEmi1iHa9P+Zk+tv0zEQ1Tmgc9F3nEHYmwWuE0WPp+zMgEajP7B3ZWbKiaJR+HVMC3peQ+KMSi4KpSu67HZxB+/7b3evO+1UPDiDYhmCseJdU71/JnIJc28Vq0HtwoHdWbNoHEfspeuOEuRonTdn2DyYKNZopQXkWK+nM6no3rsz/AQIz+cvOJXKRF+jfha7LvCNOmb5N31hPZxkg65J1xf47XW9mCjuoaRy++GDFj3pyQcaIya/JyuO0WmGsMzwP5qluJwDHv1k1lqUTcstJpEXJ1nsprdNE6FzdMV1ok+RVQJCZWaEPe/TfYlO3nAtcPQZtHXCzyy4pm/ZWRK/XuKdIAeimFXN2WjzNP6RYmOipjFavnaLXk8X2PCO5ie4GCeHYjLpCY=',
    'ctl00$plhMain$tbxNumOfApplicants'=>'1',
    'ctl00$plhMain$cboVisaCategory'=>'4',
    'ctl00$plhMain$hdnMode'=>'S',
    'ctl00$plhMain$btnSubmit'=>'Submit',
    '____Ticket'=>'7',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'+5ENBY/BGVDCx6WPHCvWlpkwhRd6uNLyV3A9xduDuRRS6LEd74yUqpVrgRjicCNwgTvrd4LGg2oOgaZpJYT27Xi4bhTRx4hUlw8ZE3JrkM+q5NcGW78KUSDuIWmhIz/c
');
$url0='http://www.vfsglobal.com/France/abudhabi/scheduleanappointment.html';
$formpost=http_build_query($formp);
//function SendRequest($url,$data2,$header){
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
//    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
//    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
//    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//    $result = curl_exec($ch);
//    if(curl_errno($ch))
//    {
//        echo 'Ошибка curl: ' . curl_error($ch);
//    }
//    $html = str_get_html($result);
//
//    return $html;
//}
function Send($url0,$formpost,$headerbig)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $formpost);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerbig);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
////        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookie.txt");
//    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookie.txt");
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
//    $errmsg  = curl_error($ch);
//    $header  = curl_getinfo($ch);
    var_dump(curl_getinfo($ch));
var_dump($result);
//    if ($result==false)
//    {
//        echo 'Страница ' .$header['url'].' не была загружена из-за ошибки http_code: '.$header['http_code'].' '.$errmsg;
//        return 'ERROR: Страница ' .$header['url'].' не была загружена из-за ошибки http_code: '.$header['http_code'].$errmsg;
//    }
//    else
//    {
//        return $result;
//    }
//    curl_close( $ch );
//
////    var_dump($result);
//    if(curl_errno($ch))
//    {
//        echo 'Ошибка curl: ' . curl_error($ch);
//    }
    $html = str_get_html($result);
    echo $html;
    curl_close( $ch );

}




// $table=Send($url0,$formpost,$header);
Send($url0,$formpost,$headerbig);







































//    $dani=$table->find("span[id=lblAvailApptDate]");
//    if(is_array($dani)){
//    $m=1;
//    foreach($dani as $span){
//
//         $item1=$span->plaintext;
//    }
//}
//echo
//"<form method='post' action='https://www.visaservices.firm.in/SVAC-UAE-APP/AppointmentScheduling/AcceptApplicant.aspx?param=2PUG/+qQtHmL+1e/l5pVZITBfW8EjFwzADeyZB7dY3/6X8uryZ+OXWga+MYFX0dF12ANWZCsXQCMqihbuj+PAfxOcVo4gszpHJkm7YYgZr4=' >
//<table style=\"border-color:red\">
//<tr>
//<th>id</th>
//<th>date</th>
//</tr>";
//echo "<tr>"."";
//echo "<td>" . 1 . "</td>";
//echo "<td>" . $item1 . "</td>";
//echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"</td>";
//echo "</tr>";
//echo "</table>";
//echo "</form>";
//echo '('.round( microtime( true ) - $btime, 4 ).' sec.)';
//?>
</body>
</html>
