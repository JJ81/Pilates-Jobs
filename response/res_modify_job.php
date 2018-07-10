<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}

if(empty($_POST['job_info_id'])){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$branch=intval(getDataByPost('branch'));
$phone=getDataByPost('phone');
$salary=getDataByPost('salary');
$time=getDataByPost('time');
$job_type=getDataByPost('job_type');
$position=getDataByPost('position');
$user_id=$_SESSION['user_id'];

$job_info_id=getDataByPost('job_info_id');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

try{
    $query =
        "update `cms_job_info` set `branch`=$branch, `phone`='$phone', `salary`='$salary', ".
        " `job_time`='$time', `job_type`='$job_type', `position`='$position', `user_id`=$user_id where `id`=$job_info_id;";
    $result = $db->update($query);

    $db=null;
}catch(Exception $e){
    echo $e->getMessage();
    $db=null;
    // AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보 수정에 실패하였습니다.');
    exit;
}

AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보가 수정되었습니다.');


?>