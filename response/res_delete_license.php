<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(empty($_SESSION['user'])){
    echo json_encode(array(
        'success' => false,
        'error' => '로그인을 해야 합니다.'
    ));
    exit;
}

if(empty($_GET['id'])){
    echo json_encode(array(
        'success' => false,
        'error' => '파라미터가 누락되었습니다.'
    ));
    exit;
}

$license_id=getDataByGet('id');
$user_id=$_SESSION['user_id'];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="delete from `cms_license` where `id`=:license_id and `user_id`=:user_id";
$value=array(
    ':license_id'=>$license_id,
    ':user_id'=>$user_id
);
$result = $db->delete($query, $value);

if($result == 0){
    echo json_encode(array(
        'success' => false,
        'error' => '삭제를 실패하였습니다.'
    ));
}else{
    echo json_encode(array(
        'success' => true
    ));
}


?>