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
     Redirect(ROOT.'index.php');
    exit;
}

$email = getDataByPost('email');
$password = getDataByPost('password');
$role='U'; // 간편 가입을 진행하게 되면 U로 처리하고 정식 가입을 하게 되면 C로 처리를 하게 된다.

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


// TODO 이메일 형식이 맞는지 검토한다.


// 패스워드가 4자리 이상인지 검토한다.
if(strlen($password) < 4){
    AlertMsgAndRedirectTo(ROOT . 'index.php', '비밀번호는 4자리 이상 입력하셔야 합니다.');
    exit;
}

// 이메일 등록 중복확인
$query_duplicate="select * from `cms_member` where `email`='$email';";
$row=$db->query($query_duplicate);


if(count($row) !== 0){
    AlertMsgAndRedirectTo(ROOT . 'index.php', '중복된 이메일 주소입니다.');
    exit;
}

$password=sha1($password);


try{
    $query = "insert into `cms_member` (`email`, `password`, `role`) values (:email, :password, :role);";
    $value = array(':email'=> $email, ':password'=> $password, ':role'=> $role);
    $insertId = $db->insert($query, $value);
}catch(Exception $e){
    echo $e->getMessage();
}

$db=null;

AlertMsgAndRedirectTo(ROOT . 'index.php', '간편 가입이 등록되었습니다. 로그인을 시도하세요.');


?>