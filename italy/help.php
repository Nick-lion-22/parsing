?<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body style=" color: #2e1805; margin:50px 0 0 300px;  position:absolute;">
<?php
include_once('simple_html_dom.php');
$btime = microtime( true );
require_once('conect.php');
//set_time_limit(30);
//max_execution_time(30);
function SendRequest($url,$data2){
    $header = array(
        'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
        'Cache-Control:no-cache',
        'Content-Type:application/x-www-form-urlencoded',
        'Pragma:no-cache',
        'Referer:https://www.it.ckgs.ae/book-appointment/book-appointment.aspx'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);// не проверять SSL сертификат
    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);// не проверять Host SSL сертификата
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $result = curl_exec($ch);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_error($ch);
    }
    $item1=array();
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $html = str_get_html($result);

//     $table=$html->find("table[id=ctl00_ContentPlaceHolder1_gvSearchResult] span");
//    if(is_array($table)){
//        foreach($table as $span){
//            $item1['time']=$span->plaintext;
//             $item1['date']=$date;
//            $masiv_time[]=$item1;
//    }
//    }
    return $html;
}
$url='https://www.it.ckgs.ae/book-appointment/book-appointment.aspx';

//$i=(int)date("d");
$manth=  date("m");
$month_year=date("m/Y");
$year=date("Y");
$day=date("d");

//echo $day."/".$month_year."<br>";
 $cal_days= cal_days_in_month(CAL_GREGORIAN, $manth, $year); // 31

//echo date("d/m/Y");
while($day<=$cal_days)
{
//echo $i."/01/2015"."<br>";
//   echo date("d/m/Y");

    $data = array(
        '__LASTFOCUS'=>'',
        'ctl00_ScriptManager1_HiddenField'=>';;AjaxControlToolkit, Version=3.5.50401.0, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en-US:beac0bd6-6280-4a04-80bd-83d08f77c177:f2c8e708:de1feab2:720a52bf:f9cec9bc:589eaa30:698129cf:e148b24b:fcf0e993:fb9b4c57:ccb96cf9:987bb99b:a4b66312:35576c48',
        '__EVENTTARGET'=>'',
        '__VIEWSTATE' => '/wEPDwULLTE1OTc1NTc1MTMPZBYCZg9kFgICAw9kFggCAQ8WAh4FY2xhc3MFBm5vcm1hbGQCHQ9kFgICAQ8WAh4JaW5uZXJodG1sBRBCb29rIEFwcG9pbnRtZW50ZAIhDxYCHgdWaXNpYmxlaGQCIw9kFgYCAw8PFgIeBFRleHRlZGQCBQ8PFgIfA2VkZAIHD2QWCgIHD2QWAgIBD2QWAmYPZBYCAgMPZBYCAgEPZBYMAgEPDxYCHglNYXhMZW5ndGgCMhYIHgpvbmtleXByZXNzBRBSZXN0cmljdFNwYWNlKCk7HghvbmNoYW5nZQVZamF2YXNjcmlwdDpyZXR1cm4gdHJpbSh0aGlzKTsoJ2N0bDAwX0NvbnRlbnRQbGFjZUhvbGRlcjFfdHh0UmVmZXJlbmNlTm9fdHh0UmVmZXJlbmNlTm8nKTseB29uZm9jdXMFD2FkZEJvcmRlcih0aGlzKR4Gb25ibHVyBRxSZW1vdmVCb3JkZXIodGhpcyxmYWxzZSwnJyk7ZAIDDxYCHwJoZAIFDxYCHwJoZAIHDw8WBh4MRXJyb3JNZXNzYWdlBQ1UeXBlIE1pc21hdGNoHhFDb250cm9sVG9WYWxpZGF0ZQUOdHh0UmVmZXJlbmNlTm8eFFZhbGlkYXRpb25FeHByZXNzaW9uBQ5eW2EtekEtWjAtOV0rJGRkAgkPDxYCHwoFDnR4dFJlZmVyZW5jZU5vZGQCCw8PFgQfCQUNVHlwZSBNaXNtYXRjaB4HRW5hYmxlZGhkZAIJD2QWCAIDD2QWDAIBDw8WAh8EAgEWBB8HBQ9hZGRCb3JkZXIodGhpcykfCAUcUmVtb3ZlQm9yZGVyKHRoaXMsZmFsc2UsJycpO2QCAw8WAh8CaGQCBQ8WAh8CaGQCBw8PFgYfCQUOIFR5cGUgTWlzbWF0Y2gfCgURdHh0Tm9PZkFwcGxpY2FudHMfCwUVWzAtOV0qWy5dezAsMX1bMC05XSskZGQCCQ8PFgIfCgURdHh0Tm9PZkFwcGxpY2FudHNkZAILDw8WBB8JBQ4gVHlwZSBNaXNtYXRjaB8MaGRkAgcPEA8WBh4NRGF0YVRleHRGaWVsZAUUQXBwb2ludG1lbnRfQ2F0ZWdvcnkeDkRhdGFWYWx1ZUZpZWxkBRdBcHBvaW50bWVudF9DYXRlZ29yeV9JZB4LXyFEYXRhQm91bmRnZBAVAww8LS1TZWxlY3QtLT4HR2VuZXJhbAdQcmVtaXVtFQMBMCQwNzczZTNkNC1iZjI1LTRlYTItOWFjNS1mNTE0Y2ExOWY3NTYkNDljNmMyNDUtMjNmMS00ZDYzLWFmYzUtNjhjMzk2ZWM2ZjEyFCsDA2dnZxYBZmQCCw9kFg4CAQ8PFgQfBGYeB1Rvb2xUaXAFCkREL01NL1lZWVkWBB8HBQ9hZGRCb3JkZXIodGhpcykfCAUcUmVtb3ZlQm9yZGVyKHRoaXMsZmFsc2UsJycpO2QCAw8WAh8CaGQCBQ8WAh8CaGQCBw8PFgYfCQUOIFR5cGUgTWlzbWF0Y2gfCgUSZHRwQXBwb2ludG1lbnREYXRlHwsFRV5bYS16QS1aMC05XC0uLEBcJCAlIF4iIHtcfSAjJyZcKis9fDw+YH5bXF0oXClcXC9fLDo7PyFcbi9cci9cdC9cc10rJGRkAgkPDxYCHwoFEmR0cEFwcG9pbnRtZW50RGF0ZWRkAgsPDxYEHwoFEmR0cEFwcG9pbnRtZW50RGF0ZR8JBQ4gVHlwZSBNaXNtYXRjaGRkAhMPFggeDklucHV0RGlyZWN0aW9uCymGAUFqYXhDb250cm9sVG9vbGtpdC5NYXNrZWRFZGl0SW5wdXREaXJlY3Rpb24sIEFqYXhDb250cm9sVG9vbGtpdCwgVmVyc2lvbj0zLjUuNTA0MDEuMCwgQ3VsdHVyZT1uZXV0cmFsLCBQdWJsaWNLZXlUb2tlbj0yOGYwMWIwZTg0YjZkNTNlAB4OQWNjZXB0TmVnYXRpdmULKYIBQWpheENvbnRyb2xUb29sa2l0Lk1hc2tlZEVkaXRTaG93U3ltYm9sLCBBamF4Q29udHJvbFRvb2xraXQsIFZlcnNpb249My41LjUwNDAxLjAsIEN1bHR1cmU9bmV1dHJhbCwgUHVibGljS2V5VG9rZW49MjhmMDFiMGU4NGI2ZDUzZQAeCkFjY2VwdEFtUG1oHgxEaXNwbGF5TW9uZXkLKwUAZAIRDxAPFgYfDQUSQXBwbGljYXRpb25fY2VudGVyHw4FFUFwcGxpY2F0aW9uX2NlbnRlcl9pZB8PZ2QQFQEDSVREFQEkMTE4MGUwMDQtZGI3My00ZjM1LThhZGYtMmZiYzE3YmU3ZDA4FCsDAWcWAWZkAgsPZBYCZg9kFgICAQ88KwANAGQCDQ9kFgICAQ88KwANAGQCEQ9kFgJmD2QWAgIDDzwrAA0AZBgEBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WAQUmY3RsMDAkQ29udGVudFBsYWNlSG9sZGVyMSRpbWdCdG5TZWFyY2gFJWN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkZ3ZBcHBEZXRhaWwPZ2QFJWN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkZ3ZOZXh0U2xvdHMPZ2QFKGN0bDAwJENvbnRlbnRQbGFjZUhvbGRlcjEkZ3ZTZWFyY2hSZXN1bHQPZ2TjwkCNXe/rFN8CEYuLhqLYlKD2PQ==',
        '__EVENTVALIDATION' => '/wEWDwKM25q3AQLMrteFDQL0rvrXDwL/roI8As65xLwPAvn909UCAtvR1dIEApaN3vMPApvZj4cOAqrbjcADAtT/htQEAquKqoQMAuavv9gEAtzgm/QOAtmJ8NUCTTK+9HdjCqW4KAK+NFu9MtwzBvM=',
        '__VIEWSTATEGENERATOR'=>'CD6DA3C7',
        'ctl00$ContentPlaceHolder1$txtNoOfApplicants$txtNoOfApplicants' => 1,
        'ctl00$ContentPlaceHolder1$txtNoOfApplicants$vceReq_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$txtNoOfApplicants$vceReg_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$ddlAppointmentCategory'=>'0773e3d4-bf25-4ea2-9ac5-f514ca19f756',
        'ctl00$ContentPlaceHolder1$vceAppointmentCategory_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$dtpAppointmentDate$dtpAppointmentDate' =>$day."/".$month_year,
        'ctl00$ContentPlaceHolder1$dtpAppointmentDate$vceReg_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$dtpAppointmentDate$vceCustomdtpAppointmentDate_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$dtpAppointmentDate$medtpAppointmentDate_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$dtpAppointmentDate$mewaterdtpAppointmentDate_ClientState' =>'',
        'ctl00$ContentPlaceHolder1$imgBtnSearch.x' => 40,
        'ctl00$ContentPlaceHolder1$imgBtnSearch.y' => 1,
        'ctl00_ScriptManager1_HiddenField'=>';;AjaxControlToolkit, Version=3.5.50401.0, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en-US:beac0bd6-6280-4a04-80bd-83d08f77c177:f2c8e708:de1feab2:720a52bf:f9cec9bc:589eaa30:698129cf:e148b24b:fcf0e993:fb9b4c57:ccb96cf9:987bb99b:a4b66312:35576c48'

    );
    $day++;
    $date=$data['ctl00$ContentPlaceHolder1$dtpAppointmentDate$dtpAppointmentDate'];// визначаєм дату
    $data2=http_build_query($data);
//var_dump($data);
      $html=SendRequest($url,$data2);

    $table=$html->find("table[id=ctl00_ContentPlaceHolder1_gvSearchResult] span");
    if(is_array($table)){
        $m=1;
        foreach($table as $span){

          $item1['time']=$span->plaintext;
          $item1['date']=$date;
            $max_masiv[]=$item1;
$m++;
        }
    }

}

if($max_masiv){
    conect($max_masiv);
}

echo '('.round( microtime( true ) - $btime, 4 ).' sec.)';
?>

</body>
</html>
