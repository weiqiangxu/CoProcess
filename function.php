<?php


//curl以ｇｅｔ方式请求
/**
 *
 * @param unknown $url
 * @param string $isFarmat
 * @param string $isTry false 是否
 * @return unknown
 */
function curlGet($url, $isFarmat = false) {
    $ch = curl_init($url) ;
    $output = "";
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
    curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; // 在启用 CURLOPT_RETURNTRANSFER 时候将获取数据返回
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept' => '*/*',
        'Accept-Charset' => 'UTF-8,*;q=0.5',
        'Accept-Encoding' => 'gzip,deflate,sdch',
        'Accept-Language' => 'zh-CN,zh;q=0.8',
        'Connection' => 'keep-alive',
        'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
        //'Referer' => 'http://fuzhou.8684.cn/',
        'User-Agent' => 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11',
        'X-Requested-With' => 'XMLHttpRequest',
    ));

    $output = curl_exec($ch) ;

    curl_close($ch) ; //关闭链接

    if($isFarmat && $output) {
        $output = json_decode($output, true);
    }

    return $output;
}


/**
 * [decodeUnicode 对中文字符(unicode码)进行解码]
 * @param  [array] $str [要解码的数组]
 * @return [array] $str [解码后的数组]
 */
function decodeUnicode($str)
{
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
        create_function(
            '$matches',
            'return mb_convert_encoding(pack("H*", $matches[1]), "UTF-8", "UCS-2BE");'
        ),
        $str);
}