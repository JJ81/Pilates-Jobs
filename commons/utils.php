<?php

/**
 * @param $url
 * @param $msg
 */
function AlertMsgAndRedirectTo($url, $msg)
{
    echo "<script>" .
        "alert(\"$msg\");" .
        "window.location.href='$url'" .
        "</script>";
}

/**
 * @param $msg
 */
function AlertMsg($msg)
{
    echo "<script>".
        "alert(\"$msg\")".
        "</script>";
}

/**
 * @param $url
 */
function Redirect($url)
{
    echo "<script>window.location.href='$url';</script>";
}

/**
 * @param $msg
 */
function Alert($msg)
{
    echo "<script>alert('$msg');</script>";
}

/**
 * @param $HOST
 */
function RedirectToLogin($HOST)
{
    header("Location: http://$HOST". ROOT); // TODO SSL를 설정했을 경우 변경해주어야 한다.
    exit();
}

/**
 * @param string $browserName
 * @param $msg
 */
function recomChromeBrowser($browserName='chrome', $msg)
{
    if (!strpos(strtolower($_SERVER['HTTP_USER_AGENT']), $browserName)) {
        AlertMsg($msg);
    }
}
/**
 * 이번달을 기준으로 이전달을 리턴한다.
 * @param $todayMonth
 * @return Y-m
 */
function getLastMonth($today=SET_CURRENT_DATE)
{
    return date('Y-m', strtotime('last Month'));
}

/**
 * @param bool|string $today
 * @return bool|string
 */
function getThisMonth($today=SET_CURRENT_DATE)
{
    return date('Y-m', strtotime('this Month'));
}

/**
 * @param int $dayOfTheWeek
 * @return array
 */
function getThisWeek($dayOfTheWeek=0)
{
    $end = date('Y-m-d', strtotime(SET_CURRENT_DATE));
    $start = date('Y-m-d', strtotime(SET_CURRENT_DATE . '-'.$dayOfTheWeek.' days'));
    return array($start, $end);
}

/**
 * @param bool|string $today
 */
function getLastWeek($dayOfTheWeek=0)
{
    $end = date('Y-m-d', strtotime(SET_CURRENT_DATE . '-'.($dayOfTheWeek+1).' days'));
    $start = date('Y-m-d', strtotime(SET_CURRENT_DATE . '-'.($dayOfTheWeek+7).' days'));

    return array($start, $end);
}

/**
 * 레벨에 따라서 해시 알고리즘으로 비밀번호를 암호화 한다
 * @param $string
 * @param $level
 * @return bool|string
 */
function makePasswordByHash($string, $level)
{
    return password_hash($string, PASSWORD_DEFAULT, ['COST' => $level]);
}

/**
 * true 이면 비밀번호를 다시 만든다.
 * @param $pass
 * @param $level
 * @return string
 */
function getNeedReHash($pass, $level)
{
    return password_needs_rehash(
        $pass,
        PASSWORD_DEFAULT,
        ['COST' => $level]
    );
}

/**
 * @param $name
 * @return null|string
 */
function getDataByPost($name){
    return (trim(filter_input(INPUT_POST, ''.$name.'', FILTER_SANITIZE_MAGIC_QUOTES)) == '') ?
        null : trim(filter_input(INPUT_POST, ''.$name.'', FILTER_SANITIZE_MAGIC_QUOTES));
}

/**
 * @param $name
 * @return null|string
 */
function getDataByGet($name){
    return (trim(filter_input(INPUT_GET, ''.$name.'', FILTER_SANITIZE_MAGIC_QUOTES)) == '') ?
        null : trim(filter_input(INPUT_GET, ''.$name.'', FILTER_SANITIZE_MAGIC_QUOTES));
}

/**
 * 이미지 네이밍 변환시 확장자명을 추가
 * @param $target
 * @return string
 */
function getImageType($target){
    $num = exif_imagetype( $target );
    if($num === 1){
        return '.gif';
    }else if($num === 2){
        return '.jpg';
    }else if($num === 3){
        return '.png';
    }
    return '';
}

/**
 * 이미지인지 여부를 판별하는 로직을 구현
 * @param $image
 * @return bool
 */
function validateImage($image){
    if(getImageType($image) == ''){
        return false;
    }
    return true;
}

/**
 * 파일 이미지 이름 변경
 * @param $companyId
 * @param $swatch_type
 * @param $target
 * @return string
 */
function makeNewImageFileName($companyId, $swatch_type, $target){
    return date("Ymd") . '_' . $companyId . '_' . $swatch_type . '_' . md5($target) . getImageType($target);
}

/**
 * @param $target
 * @return string
 */
function makeNewImageName($target){
    return date("Ymd") . '_'. md5($target) . getImageType($target);
}

/**
 * 숫자 콤마
 * @param $num
 * @return string
 */
function separateCommaNumber($num){
    return number_format($num);
}


/**
 * 연도-월-일
 * @param $date
 * @return string
 */
function setDate($date){
    $datetime = new DateTime($date);
    return $datetime->format('Y-m-d');
}

/**
 * @param $date
 * @return string
 */
function setDateTime($date){
    $datetime = new DateTime($date);
    return $datetime->format('Y-m-d H:i:s');
}

/**
 * @param $date
 * @return string
 */
function setTime($date){
    $datetime = new DateTime($date);
    return $datetime->format('H:i:s');
}

function getToday($format){
    return (new DateTime())->format($format);
}