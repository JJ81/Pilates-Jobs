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

if(empty($_POST['title'])){
    AlertMsgAndRedirectTo(ROOT . 'admin/notice/list.php', '잘못된 접근입니다.');
    exit;
}

$title=getDataByPost('title');
$date=getDataByPost('date');
if($date == null){
    $date=getToday('Y-m-d H:i:s');
}

//$title = $_POST['title'];
//echo $title . '<br /><br />';
//
//$date = $_POST['date'];
//echo $date . '<br /><br />';

// TODO 대표 썸네일 업로드 처리가 필요함.

// html 관련 처리가 필요할 것 같다 공격방지처리
$html = $_POST["ir1"];

// echo $html;

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$admin_id=$_SESSION['user_id'];


$query = "insert into `cms_board_notice` (`contents`,`title`, `created_dt`) values (:contents, :title, :created_dt);";
$value = array( ':contents'=> $html, ':title'=>$title, ':created_dt'=>$date);
$insertId = $db->insert($query, $value);

//$query = "insert into `cms_board_notice` (`contents`) values (:contents);";
//$value = array( ':contents'=> $html);
//$insertId = $db->insert($query, $value);
$db=null;


Redirect('/admin/notice/view.php?id='.$insertId);


?>