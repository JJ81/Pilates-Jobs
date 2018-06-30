<?php

require_once ('../autoload.php');
require_once ('../commons/session.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');


if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/board/list.php', '관리자만 접근이 가능합니다.');
    exit;
}

if(empty($_POST['board_id'])){
    AlertMsgAndRedirectTo('/board/list.php', '올바른 접근이 아닙니다.');
    exit;
}

$id=getDataByPost('board_id');
$answer=getDataByPost('answer');

if($answer == ''){
    AlertMsgAndRedirectTo('/board/reply.php?id='.$id, '답변이 누락되었습니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

// update answer and answered_dt
$current_time = SET_CURRENT_TIME;
$update_query = "update `cms_board_qna` set `answer`='$answer', `answered_dt`='$current_time' where `id`=$id";

// var_dump($update_query);

$result = $db->update($update_query);
$db=null;
AlertMsgAndRedirectTo('/board/view.php?id='.$id, '관리자 답변이 등록되었습니다.');

?>