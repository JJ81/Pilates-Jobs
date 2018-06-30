<?php
require_once('../../../autoload.php');
require_once('../../../commons/config.php');
require_once('../../../commons/utils.php');
require_once('../../../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT . '/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo(ROOT . '/', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

if(empty($_POST['id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/blog/list.php', '잘못된 접근입니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$id=getDataByPost('id');
$query = "update `cms_board_blog` set `active`=1 where `id`=$id;";
$result = $db->update($query);
$db=null;


AlertMsgAndRedirectTo('/admin/blog/view.php?id='.$id, '활성화되었습니다.');
?>