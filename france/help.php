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
    'Referer:https://www.visaservices.firm.in/SVAC-UAE-APP/AppointmentScheduling/AcceptApplicant.aspx?param=2PUG/+qQtHmL+1e/l5pVZITBfW8EjFwzADeyZB7dY3/6X8uryZ+OXWga+MYFX0dF12ANWZCsXQCMqihbuj+PAfxOcVo4gszpHJkm7YYgZr4='
);
function SendRequest($url,$data2,$header){
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
    $html = str_get_html($result);

    return $html;
}
function Send($url0,$formpost,$header)
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
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
    //    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result = curl_exec($ch);
//    var_dump($result);
    if(curl_errno($ch))
    {
        echo 'Ошибка curl: ' . curl_error($ch);
    }
    $html = str_get_html($result);
    return $html;
}
$url0='https://www.visaservices.firm.in/SVAC-UAE-APP/AppointmentScheduling/AcceptApplicant.aspx?';
$data = array(
    '__EVENTTARGET'=>'ddlAppCategory',
    '__EVENTARGUMENT'=>'',
    '__VIEWSTATE' => 'dDwtMTMwNTg2NjE0NTt0PHA8bDxDYXNlVHlwZTtDYWxsZXJJRDtNb2RlO21lbnVpZDtDb3VudHJ5Oz47bDxPTkxJTkU7T05MSU5FO1NDSDsjRmFsc2UjO0ZyYW5jZTs',
    'txtNoOfApp' => '1',
    'ddlAC' => 1
);
$formp=array(
    '__EVENTTARGET'=>'ddlAppCategory',
    '__EVENTARGUMENT'=>'',
    '__VIEWSTATE'=>'dDwtMTMwNTg2NjE0NTt0PHA8bDxDYXNlVHlwZTtDYWxsZXJJRDtNb2RlO21lbnVpZDtDb3VudHJ5Oz47bDxPTkxJTkU7T05MSU5FO1NDSDsjRmFsc2UjO0ZyYW5jZTs+PjtsPGk8MD47PjtsPHQ8O2w8aTwxPjtpPDM+O2k8NT47aTw3PjtpPDk+O2k8MTE+Oz47bDx0PHA8bDxWaXNpYmxlOz47bDxvPGY+Oz4+Ozs+O3Q8cDxwPGw8TW9kZTs+O2w8U0NIOz4+Oz47bDxpPDM+Oz47bDx0PHA8cDxsPFRleHQ7VmlzaWJsZTs+O2w8QmFjaztvPGY+Oz4+Oz47Oz47Pj47dDxwPGw8VmlzaWJsZTs+O2w8bzxmPjs+PjtsPGk8MD47PjtsPHQ8O2w8aTwwPjs+O2w8dDxwPGw8VGV4dDs+O2w8XDxQXD5cPFNQQU4gc3R5bGU9IkZPTlQtU0laRTogMTRwdFw7IENPTE9SOiAjZmY2NjMzXDsgTElORS1IRUlHSFQ6IDExNSVcOyBGT05ULUZBTUlMWTogJ1ZlcmRhbmEnLCdzYW5zLXNlcmlmJ1w7IG1zby1iaWRpLWZvbnQtc2l6ZTogMTYuMHB0XDsgbXNvLWZhcmVhc3QtZm9udC1mYW1pbHk6IENhbGlicmlcOyBtc28tZmFyZWFzdC10aGVtZS1mb250OiBtaW5vci1sYXRpblw7IG1zby1iaWRpLWZvbnQtZmFtaWx5OiBBcmlhbFw7IG1zby1hbnNpLWxhbmd1YWdlOiBFTi1VU1w7IG1zby1mYXJlYXN0LWxhbmd1YWdlOiBFTi1VU1w7IG1zby1iaWRpLWxhbmd1YWdlOiBBUi1TQSJcPkRJU0NMQUlNRVJcPEJSXD5cPC9TUEFOXD5cPFNQQU4gc3R5bGU9IkZPTlQtU0laRTogOHB0XDsgQ09MT1I6IGJsYWNrXDsgTElORS1IRUlHSFQ6IDExNSVcOyBGT05ULUZBTUlMWTogJ1ZlcmRhbmEnLCdzYW5zLXNlcmlmJ1w7IG1zby1iaWRpLWZvbnQtc2l6ZTogOC41cHRcOyBtc28tZmFyZWFzdC1mb250LWZhbWlseTogQ2FsaWJyaVw7IG1zby1mYXJlYXN0LXRoZW1lLWZvbnQ6IG1pbm9yLWxhdGluXDsgbXNvLWJpZGktZm9udC1mYW1pbHk6IEFyaWFsXDsgbXNvLWFuc2ktbGFuZ3VhZ2U6IEVOLVVTXDsgbXNvLWZhcmVhc3QtbGFuZ3VhZ2U6IEVOLVVTXDsgbXNvLWJpZGktbGFuZ3VhZ2U6IEFSLVNBIlw+XDxCUlw+DQoJCQlcPC9TUEFOXD5cPFNQQU4gc3R5bGU9IkZPTlQtU0laRTogOXB0XDsgQ09MT1I6IGJsYWNrXDsgTElORS1IRUlHSFQ6IDExNSVcOyBGT05ULUZBTUlMWTogJ1ZlcmRhbmEnLCdzYW5zLXNlcmlmJ1w7IG1zby1iaWRpLWZvbnQtc2l6ZTogMTAuMHB0XDsgbXNvLWZhcmVhc3QtZm9udC1mYW1pbHk6IENhbGlicmlcOyBtc28tZmFyZWFzdC10aGVtZS1mb250OiBtaW5vci1sYXRpblw7IG1zby1iaWRpLWZvbnQtZmFtaWx5OiBBcmlhbFw7IG1zby1hbnNpLWxhbmd1YWdlOiBFTi1VU1w7IG1zby1mYXJlYXN0LWxhbmd1YWdlOiBFTi1VU1w7IG1zby1iaWRpLWxhbmd1YWdlOiBBUi1TQSJcPllvdSANCm11c3QgcmVhZCB0aGUgXDwvU1BBTlw+XDxTUEFOIHN0eWxlPSJGT05ULVNJWkU6IDExcHRcOyBMSU5FLUhFSUdIVDogMTE1JVw7IEZPTlQtRkFNSUxZOiAnQ2FsaWJyaScsJ3NhbnMtc2VyaWYnXDsgbXNvLWZhcmVhc3QtZm9udC1mYW1pbHk6IENhbGlicmlcOyBtc28tZmFyZWFzdC10aGVtZS1mb250OiBtaW5vci1sYXRpblw7IG1zby1iaWRpLWZvbnQtZmFtaWx5OiAnVGltZXMgTmV3IFJvbWFuJ1w7IG1zby1hbnNpLWxhbmd1YWdlOiBFTi1VU1w7IG1zby1mYXJlYXN0LWxhbmd1YWdlOiBFTi1VU1w7IG1zby1iaWRpLWxhbmd1YWdlOiBBUi1TQVw7IG1zby1hc2NpaS10aGVtZS1mb250OiBtaW5vci1sYXRpblw7IG1zby1oYW5zaS10aGVtZS1mb250OiBtaW5vci1sYXRpblw7IG1zby1iaWRpLXRoZW1lLWZvbnQ6IG1pbm9yLWJpZGkiXD5cPEEgaHJlZj0iaHR0cDovL3d3dy52ZnNnbG9iYWwuY29tL3NwYWluL1FhdGFyL2Rpc2NsYWltZXIuaHRtbCIgdGFyZ2V0PSJfYmxhbmsiXD5cPFNQQU4gc3R5bGU9IkZPTlQtU0laRTogOXB0XDsgQ09MT1I6IGJsdWVcOyBMSU5FLUhFSUdIVDogMTE1JVw7IEZPTlQtRkFNSUxZOiAnVmVyZGFuYScsJ3NhbnMtc2VyaWYnXDsgbXNvLWJpZGktZm9udC1zaXplOiAxMC4wcHRcOyBtc28tYmlkaS1mb250LWZhbWlseTogQXJpYWwiXD5UZXJtcyANCiZhbXBcOyBDb25kaXRpb25zXDwvU1BBTlw+XDwvQVw+XDwvU1BBTlw+XDxTUEFOIHN0eWxlPSJGT05ULVNJWkU6IDlwdFw7IENPTE9SOiBibGFja1w7IExJTkUtSEVJR0hUOiAxMTUlXDsgRk9OVC1GQU1JTFk6ICdWZXJkYW5hJywnc2Fucy1zZXJpZidcOyBtc28tYmlkaS1mb250LXNpemU6IDEwLjBwdFw7IG1zby1mYXJlYXN0LWZvbnQtZmFtaWx5OiBDYWxpYnJpXDsgbXNvLWZhcmVhc3QtdGhlbWUtZm9udDogbWlub3ItbGF0aW5cOyBtc28tYmlkaS1mb250LWZhbWlseTogQXJpYWxcOyBtc28tYW5zaS1sYW5ndWFnZTogRU4tVVNcOyBtc28tZmFyZWFzdC1sYW5ndWFnZTogRU4tVVNcOyBtc28tYmlkaS1sYW5ndWFnZTogQVItU0EiXD4gDQphbmQgdGhlIFw8L1NQQU5cPlw8U1BBTiBzdHlsZT0iRk9OVC1TSVpFOiAxMXB0XDsgTElORS1IRUlHSFQ6IDExNSVcOyBGT05ULUZBTUlMWTogJ0NhbGlicmknLCdzYW5zLXNlcmlmJ1w7IG1zby1mYXJlYXN0LWZvbnQtZmFtaWx5OiBDYWxpYnJpXDsgbXNvLWZhcmVhc3QtdGhlbWUtZm9udDogbWlub3ItbGF0aW5cOyBtc28tYmlkaS1mb250LWZhbWlseTogJ1RpbWVzIE5ldyBSb21hbidcOyBtc28tYW5zaS1sYW5ndWFnZTogRU4tVVNcOyBtc28tZmFyZWFzdC1sYW5ndWFnZTogRU4tVVNcOyBtc28tYmlkaS1sYW5ndWFnZTogQVItU0FcOyBtc28tYXNjaWktdGhlbWUtZm9udDogbWlub3ItbGF0aW5cOyBtc28taGFuc2ktdGhlbWUtZm9udDogbWlub3ItbGF0aW5cOyBtc28tYmlkaS10aGVtZS1mb250OiBtaW5vci1iaWRpIlw+XDxBIGhyZWY9Imh0dHA6Ly93d3cudmZzZ2xvYmFsLmNvbS9zcGFpbi9RYXRhci9kaXNjbGFpbWVyLmh0bWwiIHRhcmdldD0iX2JsYW5rIlw+XDxTUEFOIHN0eWxlPSJGT05ULVNJWkU6IDlwdFw7IENPTE9SOiBibHVlXDsgTElORS1IRUlHSFQ6IDExNSVcOyBGT05ULUZBTUlMWTogJ1ZlcmRhbmEnLCdzYW5zLXNlcmlmJ1w7IG1zby1iaWRpLWZvbnQtc2l6ZTogMTAuMHB0XDsgbXNvLWJpZGktZm9udC1mYW1pbHk6IEFyaWFsIlw+RGF0YSANClByb3RlY3Rpb24gTm90aWNlXDwvU1BBTlw+XDwvQVw+XDwvU1BBTlw+XDxTUEFOIHN0eWxlPSJGT05ULVNJWkU6IDlwdFw7IENPTE9SOiBibGFja1w7IExJTkUtSEVJR0hUOiAxMTUlXDsgRk9OVC1GQU1JTFk6ICdWZXJkYW5hJywnc2Fucy1zZXJpZidcOyBtc28tYmlkaS1mb250LXNpemU6IDEwLjBwdFw7IG1zby1mYXJlYXN0LWZvbnQtZmFtaWx5OiBDYWxpYnJpXDsgbXNvLWZhcmVhc3QtdGhlbWUtZm9udDogbWlub3ItbGF0aW5cOyBtc28tYmlkaS1mb250LWZhbWlseTogQXJpYWxcOyBtc28tYW5zaS1sYW5ndWFnZTogRU4tVVNcOyBtc28tZmFyZWFzdC1sYW5ndWFnZTogRU4tVVNcOyBtc28tYmlkaS1sYW5ndWFnZTogQVItU0EiXD4gDQp3aGljaCBhcHBseSB0byBvdXIgdmlzYSBhcHBvaW50bWVudCBzY2hlZHVsaW5nIHNlcnZpY2UgYW5kIGFueSBvdGhlciBoZWxwLCANCnN1cHBvcnQsIGFkdmljZSBhbmQgaW5mb3JtYXRpb24gc2VydmljZXMgd2UgcHJvdmlkZSB0byB5b3UgcmVsYXRpbmcgdG8gU2NoZW5nZW4gDQp2aXNhcywgYW5kIHlvdSBtdXN0IGFncmVlIHRvIHRoZSBzYW1lIHRvIGVuYWJsZSB1cyB0byBwcm9jZWVkIGZ1cnRoZXIgdG8gDQpzY2hlZHVsZSB5b3VyIGFwcG9pbnRtZW50IG9ubGluZS4gUGxlYXNlIG1ha2Ugc3VyZSB0aGF0IHlvdSBoYXZlIHJlYWQgYW5kIA0KdW5kZXJzdG9vZCB0aGVzZSBhbmQgYWxsIHRoZSByZWxldmFudCBub3RlcyBhbmQgY29uZmlybSB0aGUgc2FtZSBieSB0aWNraW5nIHRoZSANCmFwcHJvcHJpYXRlIGNoZWNrYm94IHRvIHByb2NlZWQuXDxCUlw+XDxCUlw+XDxTVFJPTkdcPlw8U1BBTiBzdHlsZT0iRk9OVC1GQU1JTFk6ICdWZXJkYW5hJywnc2Fucy1zZXJpZidcOyBtc28tYmlkaS1mb250LWZhbWlseTogQXJpYWwiXD5PbmNlIA0KeW91IGNsaWNrIG9uICJJIEFncmVlIiwgaXQgd2lsbCBiZSBhc3N1bWVkIHRoYXQgeW91IGhhdmUgYWdyZWVkIGFuZCBhdXRob3JpemVkIA0KdXMgdG8gaW1tZWRpYXRlbHkgY29tbWVuY2UgcHJvY2Vzc2luZyBvZiB5b3VyIGFwcG9pbnRtZW50IHJlcXVlc3QgYW5kIHByb3ZpZGluZyANCmFueSBzZXJ2aWNlcyBhdmFpbGVkIGZvci4gXDwvU1BBTlw+XDwvU1RST05HXD5cPEJSXD5cPEJSXD5JIGhhdmUgcmVhZCBhbmQgdW5kZXJzdG9vZCB0aGUgDQpUZXJtcyAmYW1wXDsgQ29uZGl0aW9ucywgRGF0YSBQcm90ZWN0aW9uIE5vdGljZS4gSSBjb25maXJtIG15IGFncmVlbWVudCB0byB0aGVtLiANCkkgd291bGQgbm93IGxpa2UgdG8gY29udGludWUgd2l0aCBteSBvbmxpbmUgDQphcHBsaWNhdGlvbjotXDwvU1BBTlw+XDwvUFw+Oz4+Ozs+Oz4+Oz4+O3Q8cDxsPFZpc2libGU7PjtsPG88Zj47Pj47bDxpPDA+Oz47bDx0PDtsPGk8MD47PjtsPHQ8dDw7O2w8aTwwPjs+Pjs7Pjs+Pjs+Pjt0PHA8bDxWaXNpYmxlOz47bDxvPHQ+Oz4+O2w8aTwwPjs+O2w8dDw7bDxpPDM+O2k8OT47aTwxMT47aTwxMz47aTwxNT47aTwxNz47PjtsPHQ8cDxwPGw8VGV4dDs+O2w8T2JqZWN0IHJlZmVyZW5jZSBub3Qgc2V0IHRvIGFuIGluc3RhbmNlIG9mIGFuIG9iamVjdC47Pj47Pjs7Pjt0PHA8O3A8bDxvbktleVByZXNzOz47bDxyZXR1cm4gQWNjZXB0TnVtZXJpY3MoKVw7Oz4+Pjs7Pjt0PDtsPGk8MT47PjtsPHQ8dDxwPHA8bDxEYXRhVmFsdWVGaWVsZDtEYXRhVGV4dEZpZWxkOz47bDxEYXRhVmFsdWVGaWVsZDtEYXRhVGV4dEZpZWxkOz4+Oz47dDxpPDI+O0A8XGU7U0hBUkVEIFZJU0EgQVBQTElDQVRJT04gQ0VOVFJFOz47QDwwOzE7Pj47Pjs7Pjs+Pjt0PDtsPGk8MT47PjtsPHQ8O2w8aTwwPjs+O2w8dDx0PHA8cDxsPERhdGFWYWx1ZUZpZWxkO0RhdGFUZXh0RmllbGQ7PjtsPERhdGFWYWx1ZUZpZWxkO0RhdGFUZXh0RmllbGQ7Pj47Pjt0PGk8Mj47QDxcZTtTY2hlbmdlbuKAk1JlZ3VsYXI7PjtAPDA7Mjs+Pjs+Ozs+Oz4+Oz4+O3Q8cDxsPFZpc2libGU7PjtsPG88Zj47Pj47Oz47dDxwPDtwPGw8b25DbGljazs+O2w8cmV0dXJuIFZhbGlkYXRlKClcOzs+Pj47Oz47Pj47Pj47dDxwPGw8VmlzaWJsZTs+O2w8bzxmPjs+Pjs7Pjs+Pjs+Pjs+dgSY5ZvBKzqHFaJLBXCY74JbvTk=',
    'txtNoOfApp'=>'1',
    'ddlAC'=>'1',
    'ddlAppCategory'=>'2'
);
$formpost=http_build_query($formp);
 $table=Send($url0,$formpost,$header);
    $dani=$table->find("span[id=lblAvailApptDate]");
    if(is_array($dani)){
    $m=1;
    foreach($dani as $span){

         $item1=$span->plaintext;
    }
}
echo
"<form method='post' action='https://www.visaservices.firm.in/SVAC-UAE-APP/AppointmentScheduling/AcceptApplicant.aspx?param=2PUG/+qQtHmL+1e/l5pVZITBfW8EjFwzADeyZB7dY3/6X8uryZ+OXWga+MYFX0dF12ANWZCsXQCMqihbuj+PAfxOcVo4gszpHJkm7YYgZr4=' >
<table style=\"border-color:red\">
<tr>
<th>id</th>
<th>date</th>
</tr>";
echo "<tr>"."";
echo "<td>" . 1 . "</td>";
echo "<td>" . $item1 . "</td>";
echo "<td> <input type=\"submit\" style=\"background-color: rgb(43, 253, 43);\" value=\"Assign\"</td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo '('.round( microtime( true ) - $btime, 4 ).' sec.)';
?>
</body>
</html>
