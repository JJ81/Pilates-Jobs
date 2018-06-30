<?php

require_once('../../autoload.php');
require_once('../../commons/session.php');
require_once('../../commons/config.php');
require_once('../../commons/utils.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT.'/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/board/list.php', '관리자만 접근이 가능합니다.');
    exit;
}

// 비밀번호 수정 처리

if(empty($_POST['password'])){
    AlertMsgAndRedirectTo('/admin/', '올바른 접근이 아닙니다.');
    exit;
}

$password=getDataByPost('password');
$re_password=getDataByPost('re_password');


if(strlen($password) < 4){
    AlertMsgAndRedirectTo('/admin/', '비밀번호 4자리 이상 입력해주세요.');
    exit;
}

if($password !== $re_password){
    AlertMsgAndRedirectTo('/admin/', '비밀번호가 일치하지 않습니다.');
    exit;
}

$password=sha1($password);

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$admin_id=$_SESSION['user_id'];
$update_query="update `cms_member` set `password`='$password' where `id`=$admin_id;";

$result = $db->update($update_query);
$db=null;

AlertMsgAndRedirectTo('/admin/', '비밀번호가 정상적으로 수정되었습니다.');

?>