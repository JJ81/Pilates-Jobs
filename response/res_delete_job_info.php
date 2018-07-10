<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if(empty($_SESSION['user'])){
    AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야 합니다.');
    exit;
}

if(empty($_GET['job_info_id'])){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$job_info_id=getDataByGet('job_info_id');
$user_id=$_SESSION['user_id'];

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

try{
    $query="delete from `cms_job_info` where `id`=:job_info_id and `user_id`=:user_id";
    $value=array(
        ':job_info_id'=>$job_info_id,
        ':user_id'=>$user_id
    );
    $result = $db->delete($query, $value);

    if($result == 0){
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보 삭제에 실패하였습니다.');
    }else{
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보가 삭제되었습니다.');
    }

    $db=null;
    exit;

}catch(Exception $e){
    echo $e->getMessage();
    $db=null;
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '구인정보 삭제에 실패하였습니다.');
    exit;
}

?>