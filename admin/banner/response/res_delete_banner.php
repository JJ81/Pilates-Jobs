<?php

require_once('../../../autoload.php');
require_once('../../../commons/config.php');
require_once('../../../commons/utils.php');
require_once('../../../commons/session.php');

if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo('/admin/login.php', '로그인이 필요합니다.');
    exit;
}

if($_SESSION['role'] !== 'A'){
    AlertMsgAndRedirectTo('/index.php', '관리자만 접근할 수 있는 페이지입니다.');
    exit;
}

if(!isset($_POST['banner_id'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/banner/index.php', '잘못된 접근입니다.');
    exit;
}

$banner_id=getDataByPost('banner_id');
use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="delete from `cms_banner` where `id`=:banner_id;";
$value=array(':banner_id'=>$banner_id);
$db->delete($query, $value);
$db=null;

AlertMsgAndRedirectTo(ROOT . '/admin/banner/index.php', '배너가 삭제되었습니다.');


?>