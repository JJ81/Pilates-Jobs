<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(!empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '이미 로그인이 되어 있습니다.');
    exit;
}

if(empty($_POST['email']) or empty($_POST['password'])){
    AlertMsgAndRedirectTo(ROOT.'index.php', '잘못된 접근입니다.');
    exit;
}

$email = getDataByPost('email');
$password = getDataByPost('password');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


$query = "select * from `cms_member` where `email`='$email' limit 0,1;";
$row=$db->query($query);


if(count($row) == 0){
    AlertMsgAndRedirectTo(ROOT.'index.php', '등록되지 않은 정보입니다.');
    exit;
}else{
    if($row[0]['password'] !== sha1($password)){
        AlertMsgAndRedirectTo(ROOT.'index.php', '비밀번호가 맞지 않습니다.');
        exit;
    }else{
        // 로그인 세션 처리

        // TODO need to change cookie name
        // TODO 쿠키에 만료일이 설정이 되어 있지 않다. 임시 제거
        // setcookie('user', $name); // set cookie admin name
        $_SESSION['user_id'] = $row[0]['id'];
        $_SESSION['user'] = $email; // 입력값
        $_SESSION['role'] = $row[0]['role'];
        $_SESSION['start'] = time();
        // TODO 로그아웃 시간을 두지 않도록 설정하는 설정을 추가할 것.
        $_SESSION['expire'] = $_SESSION['start'] + SESS_DURATION;


        AlertMsgAndRedirectTo(ROOT . 'index.php',  '회원님, 환영합니다.');
        exit;
    }
}


?>