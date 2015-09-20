
<?php
include_once('simple_html_dom.php');
function curl_redir_exec($ch){
    static $curl_loops = 0;
    static $curl_max_loops = 20;
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    list($header, $data) = explode("\r\n\r\n", $data, 2);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code == 301 || $http_code == 302){
        $matches = array();
        preg_match('/Location:(.*?)\n/', $header, $matches);
        $url = @parse_url(trim(array_pop($matches)));
        if (!$url){
            //couldn't process the url to redirect to
            $curl_loops = 0;
            return $data;
        }
        $last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
        if (!$url['scheme'])
            $url['scheme'] = $last_url['scheme'];
        if (!$url['host'])
            $url['host'] = $last_url['host'];
        if (!$url['path'])
            $url['path'] = $last_url['path'];
        $new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
        curl_setopt($ch, CURLOPT_URL, $new_url);
        //debug('Redirecting to', $new_url);
        return curl_redir_exec($ch);
    }else{
        $curl_loops=0;
        return $data;
    }
}
$header2 = array(
    'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    'Accept-Language:ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Cache-Control:no-cache',
    'Content-Type:application/x-www-form-urlencoded',
    'Pragma:no-cache',
    'Referer:https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979',
    'DNT:0',
    'Cookie:__utma=111872281.1638365990.1407193090.1407345159.1410765277.4; __utmz=111872281.1407193090.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); _ga=GA1.1.1638365990.1407193090; l2_pv23167=1; optimizelySegments=%7B%22300052124%22%3A%22false%22%2C%22300028445%22%3A%22direct%22%2C%22300028446%22%3A%22ff%22%7D; optimizelyEndUserId=oeu1407247382614r0.13841275652250007; optimizelyBuckets=%7B%7D; ajs_user_id=null; ajs_group_id=null; _sio=0db57403-3466-4640-a6d5-6a2169b97661----; hblid=y5LGg3B7tD6M93sz1Y4Bh90nDL91o1AA; mp_dc52d7d422b2946ea507a5ac632169b1_mixpanel=%7B%22distinct_id%22%3A%20%22147a67b00419-008655c76e1e3a-42504336-100200-147a67b004214%22%2C%22%24initial_referrer%22%3A%20%22http%3A%2F%2Flocalhost%2Fmywork%2Fcurl_task%2F%22%2C%22%24initial_referring_domain%22%3A%20%22localhost%22%7D; olfsk=olfsk8440550244156192; visitor_id9362=375185056',
    'Connection:keep-alive',
);
function SendRequest($url, $header){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE); // начинаем новую сессию и перезаписываем cookies
////    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 7); // ждём 30сек. при попытке соединения
//    curl_setopt($ch, CURLOPT_COOKIEJAR, ".//my_cookies.txt");
    curl_setopt($ch, CURLOPT_COOKIEFILE, ".my_cookies777.txt");
    curl_setopt($ch, CURLOPT_SSLVERSION, 3);
    curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);// не проверять SSL сертификат
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    $result2 = curl_exec($ch);
    $html1 = str_get_html($result2);

    curl_close($ch);
    return $html1;
}

$url2='https://adm.tlscontact.com/ae2dk/login.php';
$url3='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4253314';
$url4='https://adm.tlscontact.com/ae2dk/index.php?fg_id=4327979';
$url5='https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979';
//$dom2=SendRequest($url,$header);



echo $v= SendRequest($url4,$header2);
var_dump($v);
//https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979
//https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979
//https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979
//https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979
//https://adm.tlscontact.com/ae2dk/login.php?redir=%2Findex.php%3Ffg_id%3D4327979
?>
