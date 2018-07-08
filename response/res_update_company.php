<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if($_SESSION['role'] !== 'C'){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '잘못된 접근입니다.');
    exit;
}

if(empty($_POST['user_id'])){
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$user_id=getDataByPost('user_id');
$realname=getDataByPost('realname');
$phone=getDataByPost('phone');
$business_number=getDataByPost('business_number');
$description=getDataByPost('description');
$homepage=getDataByPost('homepage');

// 사업장정보
$business_name=$_POST['business_name'];
$business_addr=$_POST['address'];
$address_id=$_POST['address_id'];

$role="C";
$reg_type="B";

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


try{
    $db->getDBINS()->beginTransaction();

    $biz_info=
        "update `cms_member` " .
        "set `business_name`='$realname', `phone`='$phone', `business_number`='$business_number', ".
        "`homepage`='$homepage', `description`='$description' ".
        "where `id`=$user_id;";

    $result = $db->update($biz_info);


    for($i=0,$size=count($business_name);$i<$size;$i++){
        if($address_id[$i]){
            $input_biz_info=
                "update `cms_business_info` set `business_name`='$business_name[$i]', `address`='$business_addr[$i]' where `id`=$address_id[$i]";
            $result = $db->update($input_biz_info);
        }else{
            $input_biz_info=
                "insert into `cms_business_info` (`cm_id`, `business_name`, `address`) values";

            if($i !== ($size-1)){
                $input_biz_info .= "($user_id, '$business_name[$i]','$business_addr[$i]'),";
            }else{
                $input_biz_info .= "($user_id, '$business_name[$i]','$business_addr[$i]');";
            }

            $insertId = $db->insert($input_biz_info, null);

            if(!$insertId){
                throw new Exception('Failed to insert license info.');
            }
        }
    }


    $db->getDBINS()->commit();
    $db=null;

    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '기업 회원 정보가 수정되었습니다.');

}catch(Exception $e){
    $db->getDBINS()->rollBack();
    error_log($e);
    $db=null;
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '처리도중 에러가 발생하였습니다. 다시 시도해주세요.');
}

?>