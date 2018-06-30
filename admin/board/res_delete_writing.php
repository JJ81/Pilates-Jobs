<?php

require_once('../autoload.php');
require_once('../commons/session.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if (empty($_SESSION['user'])){
    AlertMsgAndRedirectTo('/board/list.php','관리자 로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/board/list.php', '관리자만 접근이 가능합니다.');
    exit;
}

$id=getDataByGet('id');
use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="delete from `cms_board_qna` where `id`=:id;";
$value=array(':id'=>$id);
$db->delete($query, $value);
$db=null;


AlertMsgAndRedirectTo('/board/list.php', '삭제되었습니다');

?>