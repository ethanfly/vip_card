<?php
define('PI', 3.1415926535898);
define('EARTH_RADIUS', 6378.137);
//计算范围，可以做搜索用户
function GetRange($lat, $lon, $raidus)
{
    //计算纬度
    $degree = (24901 * 1609) / 360.0;
    $dpmLat = 1 / $degree;
    $radiusLat = $dpmLat * $raidus;
    $minLat = $lat - $radiusLat; //得到最小纬度
    $maxLat = $lat + $radiusLat; //得到最大纬度
    //计算经度
    $mpdLng = $degree * cos($lat * (PI / 180));
    $dpmLng = 1 / $mpdLng;
    $radiusLng = $dpmLng * $raidus;
    $minLng = $lon - $radiusLng; //得到最小经度
    $maxLng = $lon + $radiusLng; //得到最大经度
    //范围
    $range = array(
        'minLat' => $minLat,
        'maxLat' => $maxLat,
        'minLon' => $minLng,
        'maxLon' => $maxLng
    );
    return $range;
}

//获取2点之间的距离
function GetDistance($lat1, $lng1, $lat2, $lng2)
{
    $radLat1 = $lat1 * (PI / 180);
    $radLat2 = $lat2 * (PI / 180);
    $a = $radLat1 - $radLat2;
    $b = ($lng1 * (PI / 180)) - ($lng2 * (PI / 180));
    $s = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
    $s = $s * EARTH_RADIUS;
    $s = round($s * 10000) / 10000;
    return $s;
}