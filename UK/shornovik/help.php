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
    'Referer:https://www.vfsvisaservices.com/Swiss-Global-Appointment/AppScheduling/AppScheduling.aspx'
);
function SendRequest($url,$data,$header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_COOKIEJAR, "./_cookies.txt");
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
$url2='https://www.vfsvisaservices.com/Swiss-Global-Appointment/AppScheduling/AppSchedulingGetInfo.aspx';
$formp2=array(
    '__EVENTTARGET'=>'ctl00$plhMain$cboVisaCategory',
    '__EVENTARGUMENT'=>'',
    '__LASTFOCUS'=>'',
    '__VIEWSTATE'=>'qfgCsRJoSNc4Ixz1lUaTtv0NxmWi2+dsjpPaAPt6pc0g8ENjoIft+RX8n2hqyy2syt6sL6vxggVLEQTvRntteC3FoI0vidteRlk4Os0pn/7PUipg5zMakXNobVD3Xd8XyEyZ8CJQ5sRKsznvg5xFSivfW4ap6uHhfGPfBT5mw8yijW9eATWTnouyU5PjMMiecACK28qaV95pjZkLCHJ94KSqUt0Iq7oecEgtIjG9dkBd4WKI9eCyeikBiVu/mOqXOJTNElVctGDFgLAGkNuhwI0E0C9d9L3kj/X58VHpKhTF13JsAKkZslfxr5z1BjNM5ZW0wiUeFIEbD6Y8xqsVZOMmfrBy/6wip9IHxvACQjluEWvBjXci+Xx2Av8bfBUweZ1X4Y5JW/2snBTQRuCKvxuK5+hImAvbFQqCjhugB+r5KbVA0r30k0e4MB2G5tTnnLK+UWB77NYZM9QQM3f7Ko61gtPPq+78KPXTXuJCLUJUSZl7QjYN9PE9JfvwwSSC88e8vIjMFydHSrzpnONxTRsqqEAGUyLo9CZ38XjkBAA+81kI1W+3favdOTXsnVGmeJ+IyBXh8nBejbwJTmoiQwYZQOlEtiVRf54/EiT0iiX8dsWxVBIkilCFJuhzjbsuJY0vuLf6zlbGXBJZoSyLXvrUYPxK4gI+ZC1Fj6HGIoFb0+fWvxmCZgMvlbH1aBeoClNs3SxufAtHY18r80pr+l3TKeLTnFoV9t0Jk01u2sUMcBkrfF/xUKL/C3zMPR8djUvJTEKkgRX1NCcuzftlmzFErCHx/mG0uOuMYu59/3crDAQY1mAPc/eyHq/5CiH8XRG4dvdpPBw80ZyGuayuarvdoqHDs6Fynz7RGqOcQMGwPMDA0T5l+mW0nKF+ENLc9RgfZA2kiGIOBB9BprcmYvVa480DtUOaN9wcJHLY1OjXqPoJ5iNN9kq/+5LfCyvWIfD+G9lR5Fc0o3Fw8QbM4o4HXoFolmV6oZb9VZsKWekb99h6EFXqyo+gINurPI5YTHg7/e9SU9un/xUF8V9DF4Kl0W264llzl0yV281MN+RjTnzoKmfZUCS72GUmmSgImmbqt/jOhk8ny2HsBqg0y61RoTe6bjVxL9SC9dX4i6NBqbQTAbcm9CJnXzqpQtVljX/hD6sLrLR77sYwWC+DYUpSagMEwNChIFV7bJcgKNWDxp/uIBzbwTW/c7WSu1qbh43IzRt8uS0hYyZbfFygrhow7Tb9k//NXVuGT8GlRhZINq093nxwwDAiKKF+bprLtOq5LHvMO3ug2UDb1yhTMG3GqvEbfYE6GSLxkcAGW+7ez0xxPoZokEzwGZKyR+NLa4V9lA3EZ7PIHcHTbq6NOlZw+GWXlDaMFol2hTio4o86lezoMb9jOG2otiGOeMeCSrBgUjh52Bt2KwwLv59hV2FZLwB+LnIlgsP6CybiXGCOoZRjeXrPTm4miSMQ5SLuVsreMu2VnmjXrMXmrAX8kcewV7kQ3pVwHZl0asjkEnS9lj17inTnt8K7O1QMEU/Da+dds2Du5DwOrxQQOS1XrcmdGmQzTSx5l/lRUakQcBRBFfrEn3Ofyb3/1bAYddOs42rLFiwJvsUWwSuJ8v+B3lOaThYfoRCEvvNCoZl2inYoLfwkBdJvxl7c10/VpRk+CMsECnVpY+OeBFatBxHCo26Fcd/acyio9Vow1wRpcZ98e0UJAUIM5GY0J2n3GK6Z4QF6EM8hGjpDBeA96iJzYRI1OfMr4zWR+t+o9vIgLt6rpPmf2z5fSoByPAWz6jsdt46ap3RyUCuzK1JgDnmHQ9gfWKp+Mf4dIluXT34rR4y7OJCKocHrR1yHfAYTJWxtVXHuhQhxnwXmoiIGevNY0AeSAk4c5BRE4j91x783TbkdP4f5G5zV7V6hu3veAoLsDh2IEgp2iLpPdVyGaffPbK32ap6z5914c3qi4lM9QpH+sf1+UJChZwoopvpYNd5jsrPg/8NSQcogeUp78Zdo2ntIVrG+se5P1l9sxSG/oozUMGdKpo5iQg6UfUym2wF9fQdPoZ80gISBCO2F8+tS5rugZeDiCBW7AbKql7xb6HPtZn4qmwMltVghf3P8o/gu41ruBkD/bVxt0uCZr2Q/gBmDb9tIzhEUzibiAbp2RBJUfjVMwpxc3cNbrl/VPBfptaXRHDb6ST5TuajrrY6qGXEL5kobUJJgFlgUZxDpqAG+8AmtnJT49bHYZvMPG+0M8Bb/Hx4AnEEafH431JsDBLp0CV4PbOwfBsiuhNZdXMbWFaXpC63yNLQkBhjr4gmwd3mccosQnkaJtQR0a3dnVG+gruXXkKsoZRpt8oP0Fl2fcgsSC64eCnWpa+Yey0KTUdbFAWEDo/TNaBwSkc3cfzwZ0uREYYjgsovvX9/n7ul9k9KJfqYfwDs67wws+sL2b5VtHLgVbAlbbazjuE8L7qwrTHFsduhTlKgqHtACEgbIdDydsl3OCgEyfApY7EYbQkaUljwOwxxvyD20rm7YPiLyYzExgYhQL3pi9/ZPgJX3VZRw1yTBbdt2cYSnw80+YivHh7IBAnapT9rI8nmhHVOYIQV7M7dSIXvEeBJtkWq2ydxFIn7O37uROd7n77lSLpcaR2HqwM91/v62WYjZlMqmzRO+fEIGnGnCJWMpAZn/6siWJpC6tb7SmeDnxXuF44DHhFRPz+UY6rlQIJI62gYw2ewnDrCZHwdGgnhVkVmXLMXP8GC5y8sEhvWTkjPkJqm8pZnfdKW2xQV+brUYpjOKIvA9JdGcw+w6hvxzwkd22cHp8Pg2h5BBLR2FM3KmCuo7kVX/f7IILJaKQ17KpUk7AlceEWuEKN+SG4GS3fgIEo9XEwEpIsj4WyYM6VM3v2ztCqZ4Zj2f84pAZ97GqdIfdVK/03B+5kUpapY5Bas9Sb+5Rn68EBw0H6N5+tTRWv23u4LISFWS1mAvUaCn2kPvjuVmNdApVml13yRJpMqyf6dbguZK3v1UcdahoTlF/TSS7SUdXgDjlne50gOrpIM4QF1iTH9qLPHy66mpXzE+EytTo4XSw3HqP4lfQXt/bwVas1RucaA12dDhO67LzDkk5+scfbMmyWzKtn1fuchvcGP3bCNvhHxSqboycz2gtA03JvcY57tWsNWRInHq/KTTw996RjjmIY4fh2qsp83mIotar0idP2y/BSO99oINVn7LvKMAZd7dfQKwv7qbaj+ARtMhgqrQ8oQYqFEatWuW7LplbYKlKe3TPGLUzVBhZhqoILRYJKau19r3nxwVjGQA5Z0=',
    '____Ticket'=>'4',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'mHRsAHf6a42DNA9H6fiH+s8QzjMfDxEl18GSxk7YIwvtEkKme3LrkIsUikK/z0kDSpjpfmq52BMhyVfmXLeKif60KqAlezi9HQ92ka+MntL/OSBcrys0T7jJhCwD48Ec2bd9Pvawy6RRXXs3pejf5B/2b89R+Wl0TjeBzHC9krJweAJzJa3O3MXk+F4MKKWPtQhaTA==',
    'ctl00$plhMain$tbxNumOfApplicants'=>'1',
    'ctl00$plhMain$cboVisaCategory'=>'32',
    'ctl00$plhMain$drpApplicantType'=>'0',
    'ctl00$plhMain$hdnMode'=>'S'
);
$formpost=http_build_query($formp2);
$table=SendRequest($url2,$formpost,$header);
    $dani=$table->find("span[id=ctl00_plhMain_lblMsg]");
    if(is_array($dani)){
    $m=1;
    foreach($dani as $span){

         $item1=$span->plaintext;
    }
}
echo
"<form method='GET' action='https://www.vfsvisaservices.com/Swiss-Global-Appointment/AppScheduling/AppLogin.aspx?P=59$0$213$146$75$161$201$226$237$96$19$227$249$189$242$12$243$221$232$103$69$195$161$132$85$203$173$114$142$77$235$145' >
<table style=border:'1'>
<tr>
<th>id</th>
<th>date</th>
</tr>";
$item2=substr($item1,-22);
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
