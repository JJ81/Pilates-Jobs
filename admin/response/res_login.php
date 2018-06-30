<?php
require_once('../../autoload.php');
require_once('../../commons/config.php');
require_once('../../commons/utils.php');
require_once('../../commons/session.php');


if(empty($_POST['user']) or empty($_POST['pass'])){
    Redirect(ROOT.'/admin/login.php');
    exit;
}

$name = getDataByPost('user');
$password = getDataByPost('pass');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


$query = "select * from `cms_member` where `username`='$name' limit 0,1;";
$row=$db->query($query);

// var_dump( count($row) );

if(count($row) == 0){
    AlertMsgAndRedirectTo(ROOT.'/admin/login.php', '등록되지 않은 정보입니다.');
    exit;
}else{
    if($row[0]['password'] !== sha1($password)){
        AlertMsgAndRedirectTo(ROOT.'/admin/login.php', '비밀번호가 맞지 않습니다.');
        exit;
    }else{
        // 로그인 세션 처리

        // TODO need to change cookie name
        // TODO 쿠키에 만료일이 설정이 되어 있지 않다. 임시 제거
        // setcookie('user', $name); // set cookie admin name
        $_SESSION['user_id'] = $row[0]['id'];
        $_SESSION['user'] = $name; // 입력값
        $_SESSION['role'] = $row[0]['role'];
        $_SESSION['start'] = time();
        // TODO 로그아웃 시간을 두지 않도록 설정하는 설정을 추가할 것.
        $_SESSION['expire'] = $_SESSION['start'] + SESS_DURATION;


        if($_SESSION['role'] == 'A'){
            AlertMsgAndRedirectTo(ROOT . 'admin/index.php',  '관리자님, 환영합니다!');
        }else{
            AlertMsgAndRedirectTo(ROOT . '/',  '관리자만 접근할 수 있는 페이지입니다.');
        }

        // TODO 로그인 세그먼트를 구분하여 처리할 것.
//        global $isAdmin;
//        global $isUser;
//        global $isCorp;
//
//        $isAdmin = false;
//        $isUser = false;
//        $isCorp = false;

    }
}


?>