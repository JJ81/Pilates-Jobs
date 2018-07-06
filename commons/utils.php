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

function isMobile(){
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
        return true;
    }
    return false;
}
?>