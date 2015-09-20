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
    'Referer:https://www.vfsvisaservices.com/spain-global-appointment/AppScheduling/AppWelcome.aspx?P=221$7$44$21$227$195$228$120$228$113$154$114$232$20$203$67$46$76$241$129$92$213$66$207$185$32$130$74$2$85$5$197'
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

    '__VIEWSTATE'=>'TZ9M+JsFxiNQh7dhL2LJHFgM1Ux9mh+aBjuNmBkDbDDPv+vBSLd+qCbj73KNR+OXtgZYSZHbkscEUgSU32YAiB3V7l+cttvCeSDw9GOFMerVIo1UQnVLUux/Y4T0LVFjDxC3CPReGTlbB+aE9Dcnh77cZ4TU53EPKDkEzQpXX0eQhjE2+OpI6S9dH0Wud82KCOhgn9TMlc1AZnkCOLL5SvdDP4Ywpq34Hwtda3j1uwoBhsWpXmKJlOr+20dSHQO5YyU1svNTVs5yN8HtoG5PWZ2M01DLS7xujinPriMezh38uEjn+7kUZFjrxgS45Pksvno/wJYFUUlmmMvbsZZSUi3Bw4noS3oHxel5rAcyLT5i0O0OdGpPw+Tcv6iz2vlwwffW1+oXXSMOB58EdRiifzzu+qZcNMR/KPqI5M2V+miTfBZdzGkyjB/cPYwWU5nUBpKCp8UhLqNrFFhoLCRed+JZVxPEhOgXH9oAUH5VSNxlRh/oQZBEmSGD+yseMflqKFpuUMpFFB0P5ooK8oTPTEldTZOik2y0RU0l0j8av6/JpXcmRUOi4qE0m0gU7FfexZviLE9sX8xKS0Kr1XlgBakL/ufzOcJa9oR2W+GbRdlqa4oboo3iFVArcMuGkt/pISQmemwHgMJNvIeWVLzJkuANpfJuIkwoVxQkkgyRCLuAFBGEo6WLnT1mC2UmicDul4pl79G3yuXSSWxivx/txjjNSFyovbfkFV2NzQ8UgbmKcn1VoK3Ha6dc6Gl+0VEYTAthzdXzEbLvgRDzzwOstJrt8JIghaO1yPyVy80pGhfEAV/1JwsIQ9MNi68PZ9X94U+ONQm0Lu7AHqUtzCQ18lK4NttKi+AyYEQfWAdkpBZFg1iRTpVbLBeWTrt3pigl9VZVXrjovebkMY7e6LDNilUvHcm068GZYMGHFbQI7+vuyXe6XsE60uHbX04hTJ+/jB64+a2Z4YIGnVXSXNm7B98xp9D2/JEf5yxJGGXDotzx/Bgl4AD/zqBAiPkJQnC11z+AwpWdqPL8V3Re4uQbsiopL5p7dAzbvpZkOvatvbmIIUkuNAMpoYkpfk61QEBwnLzGrXCyl1LLpYa3lXp8pCTnKCKQxNikrIxOD0ha1ml3z6Xv2adzI+Fs1VwWI5r4/5x36J932R/yBpghQohnyCcEtbf2O2X1/eOFkWdR3qVjhcaHGRBKlf7H+IG3DmeGHYXNtQ36bFcl+E1xKN4sTEkvNvveg5KPtX6PB/ghpEuiAbUTgAU33pDaFG66Lplovc8eVJucQmkOxQ94F1d9VnflnxBNOByajORf4mTIrwMcmIVFxpI+gzZLYaKgXHYp3ng+E3YUoxOsz7yi/0JvAjAemPSM8mN0HWdg+gDI5l6F3QYbOv/V/8tSzTarTSj5RsJ5CRtG9jKbdmXkPlwSBLoF5fC2IKlkDv/P8f+Ood6CiK4PBYS5/8BXW86ghsePYYONUgOSu4djNiEqht72V1TV2YLDO+WDAW5JJgeywhCApfoU4zz9OFyJp3BiRwsiuSxpR1CZyLQ0DIhbtcadAYfZlqAn17bUgnW2P8yNopPYRTjFvLsENW7CpESUhNw6GruPcjH/vU5ViaGAVI61Xlv/h/5/GLbckZ5Z2hlKWuI6p9MweXRK/QQVWybBfRQexvIGHZUXc+oy8jB5UFCCBrGd6/7Rsm4ih7vTTcEXQYQ/Fe8HtBUClE/0suoc0yRKzdGI0wPD7jdT17wGKrhavwtI00apQcYgLsYIh7CUrTj9MBHg7KW97RiiS67XNzJnDI1LSou62iMKdNOI1tYbjuhGHhhl9K2SCOVQ83SHPu+jlhezwfbyFK1cFTDo25+lpI8xcz1pvrqsHqI0Q1TeAd1710Dw0HG28gnlOyxxDPKgJFyGca74pZ77jL2nKCiq6eR85FWgQdMCeKEqkqvLVPWIby9BqbEDiWwUOypSBUB7P59L',
    '____Ticket'=>'3',
    '__VIEWSTATEENCRYPTED'=>'',
    '__EVENTVALIDATION'=>'fiAQnCODeQeW/3Yhv2fG0Chrv8kcW2TRoWxxt3ZZGsu91xDwxZsmsj/zR+xu4GMq1h8jYoynSSbheepV9V7vxDryza4xVju/PKUu9cCoOvKHR13f621JACOLi79LQeyVS59oFliq2Jua2z7CDxRtwnSmUf8mIoNaNVdBTOvv9pAlGuYf',
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

echo
"<form method='post' action='https://www.vfsvisaservices.com/Spain-Global-Appointment/english/UAE/ScheduleAnAppointment.html' >
    <table style=border:'1'>
        <tr>
            <th>id</th>
            <th>date</th>
        </tr>";

$item2=substr($item1,-25);
$item3=substr($item2,0,24);
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
