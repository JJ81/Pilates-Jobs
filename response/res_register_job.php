<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}

$branch=getDataByPost('branch');
$phone=getDataByPost('phone');
$salary=getDataByPost('salary');
$time=getDataByPost('time');
$job_type=getDataByPost('job_type');
$position=getDataByPost('position');
$user_id=$_SESSION['user_id'];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

try{
    $query = "insert into `cms_job_info` (`branch`, `phone`, `salary`, `job_time`, `job_type`, `position`, `user_id`) values (:branch, :phone, :salary, :job_time, :job_type, :job_position, :user_id);";
    $value = array(
        ':branch' => $branch,
        ':phone' => $phone,
        ':salary' => $salary,
        ':job_time' => $time,
        ':job_type' => $job_type,
        ':job_position' => $position,
        ':user_id' => $user_id

    );
    $insertId = $db->insert($query, $value);
    $db=null;
}catch(Exception $e){
    echo $e->getMessage();
    $db=null;
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보 등록에 실패하였습니다.');
    exit;
}

AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보가 등록되었습니다.');


?>