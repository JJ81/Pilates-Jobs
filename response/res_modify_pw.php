<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인이 필요합니다.');
    exit;
}

if(empty($_POST['password']) or empty($_POST['re_password'])){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$user_id = $_SESSION['user_id'];
$password = getDataByPost('password');
$re_password = getDataByPost('re_password');
$email=$_SESSION['user'];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


// 패스워드가 4자리 이상인지 검토한다.
if(strlen($password) < 4){
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '비밀번호는 4자리 이상 입력하셔야 합니다.');
    exit;
}

if($password !== $re_password){
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '비밀번호가 일치하지 않습니다.');
    exit;
}

$password=sha1($password);


try{
    $query_reset_pw=
        "update `cms_member` set `password`='$password' where `id`=$user_id and `email`='$email'";
    $result = $db->update($query_reset_pw);

    if($result == 0){
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '비밀번호가 이전과 동일하거나 다른 문제가 있는 것 같습니다.');
    }else{
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '정상적으로 비밀번호를 수정하였습니다.');
    }


}catch(Exception $e){
    echo $e->getMessage();
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '비밀번호 변경에 실패하였습니다. 잠시 후에 다시 시도해 주세요.');
}

$db=null;
exit;

?>