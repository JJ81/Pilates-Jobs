<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');

// 로그인이 되어 있는지
if(empty($_SESSION['user'])){
    echo json_encode(array(
        'success' => false,
        'msg' => '로그인을 해야합니다.'
    ));
    //AlertMsgAndRedirectTo(ROOT. 'index.php', '로그인을 해야합니다.');
    exit;
}

// 정식 개인 회원인지
if($_SESSION['role'] == 'U'){
    echo json_encode(array(
        'success' => false,
        'msg' => '정식회원이 아닙니다. 내정보로 이동하여 정보를 등록해주세요.'
    ));
    //AlertMsgAndRedirectTo(ROOT. 'mypage.php', '정식회원이 아닙니다. 내정보로 이동하여 정보를 등록해주세요.');
    exit;
}

// 기업 회원은 지원할 수 없다고 떠야 한다.
if($_SESSION['reg_type'] == 'B'){
    echo json_encode(array(
        'success' => false,
        'msg' => '개인회원만 지원할 수 있습니다.'
    ));
    //AlertMsgAndRedirectTo(ROOT. 'mypage.php', '개인회원만 지원할 수 있습니다.');
    exit;
}

// 입력값이 누락되었을 경우
if(empty($_POST['job_id'])){
    echo json_encode(array(
        'success' => false,
        'msg' => '잘못된 접근입니다.'
    ));
    //AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$job_id=getDataByPost('job_id');
$user_id=$_SESSION['user_id'];

// 이미 지원을 했는지 여부를 조회한다.
$query=
    "select * from `cms_job_history` " .
    "where `job_info`=$job_id and `user_id`=$user_id;";
$dup=$db->query($query);

// 지원하기 처리한다.
if(count($dup) == 0){
    // 지원하기 처리
    try{
        $query_apply="insert into `cms_job_history` (`job_info`, `user_id`) values (:job_info, :user_id);";
        $value = array(':job_info'=> $job_id, ':user_id'=> $user_id);
        $insertId = $db->insert($query_apply, $value);

        if($insertId){
            echo json_encode(array(
                'success' => true,
                'msg' => '지원되었습니다.'
            ));
            exit;
        }else{
            echo json_encode(array(
                'success' => false,
                'msg' => '지원처리에 실패하였습니다. 잠시 후에 다시 시도해주세요..'
            ));
            //AlertMsgAndRedirectTo(ROOT. 'index.php', '지원처리에 실패하였습니다. 잠시 후에 다시 시도해주세요.');
            exit;
        }


    }catch(Exception $e){
        echo $e->getMessage();
    }


}else{
    // AlertMsgAndRedirectTo(ROOT. 'index.php', '이미 지원하셨습니다.');
    echo json_encode(array(
        'success' => false,
        'msg' => '이미 지원하셨습니다.'
    ));
    exit;
}

$db=null;





?>