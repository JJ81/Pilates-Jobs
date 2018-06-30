<?php

require_once ('../autoload.php');
require_once ('../commons/session.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/board/list.php', '관리자만 접근이 가능합니다.');
    exit;
}

if(empty($_GET['id'])){
    AlertMsgAndRedirectTo('/board/list.php', '올바른 접근이 아닙니다.');
    exit;
}

$id=getDataByGet('id');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query_delete_reply="update `cms_board_qna` set `answer`=null, `answered_dt`=null where `id`=$id;";

// var_dump($query_delete_reply);

$result = $db->update($query_delete_reply);
$db=null;

AlertMsgAndRedirectTo('/board/list.php', '관리자 답변이 삭제되었습니다.');

?>