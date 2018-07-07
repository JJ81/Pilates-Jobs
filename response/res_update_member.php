<?php
require_once('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');
require_once('../commons/session.php');


if($_SESSION['role'] !== 'U'){
    AlertMsgAndRedirectTo(ROOT. 'mypage.php', '이미 정식 가입된 회원입니다.');
    exit;
}

if(empty($_POST['user_id'])){
    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '잘못된 접근입니다.');
    exit;
}

$user_id=getDataByPost('user_id');
$realname=getDataByPost('realname');
$birthday=getDataByPost('birthday');
$gender=getDataByPost('gender');
$phone=getDataByPost('phone');
$description=getDataByPost('description');

// 하단은 여러개를 받아서 넘어올 수가 있다.
$license_dt=$_POST['license_dt'];
$license_name=$_POST['license_name'];
$role="C";
$reg_type="P";

// TODO 이미지를 업로드하는 로직은 클래스나 별도의 함수로 만들어서 사용하기 편하도록 로직을 개선할 수 있도록 한다.
$uploaddir =  '../upload/';
$newImgName = null;

if(!empty($_FILES['thumbnail']['tmp_name'])){
    if(validateImage($_FILES['thumbnail']['tmp_name'])) {
        $newImgName = makeNewImageName( $_FILES['thumbnail']['tmp_name'] );
    }
}

if($newImgName !== null){
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $uploaddir . $newImgName )) {

    } else {
        AlertMsgAndRedirectTo(ROOT . 'mypage.php', '잘못된 설정으로 이미지 업로드에 실패하였습니다.');
        exit;
    }
}
use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


try{
    $db->getDBINS()->beginTransaction();

    $personal_info=
        "update `cms_member` " .
        "set `realname`='$realname', `birthday`='$birthday', `thumbnail`='$newImgName', " .
        "`phone`='$phone', `gender`='$gender', `description`='$description', `role`='$role', `reg_type`='$reg_type' ".
        "where `id`=$user_id;";
// TODO `role`=$role, `reg_type`=$reg_type, 이 컬럼에 입력을 할 때 문제가 발생하고 있다.

    echo $personal_info;

    $result = $db->update($personal_info);

    if($result == 0){
        throw new Exception('Failed to update new personal info.');
    }

    // for문을 통해서 인서트문을 완성하고
    $input_license=
        "insert into `cms_license` (`user_id`, `taken_dt`, `license_name`) values";

    for($i=0,$size=count($license_dt);$i<$size;$i++){
        if($i !== ($size-1)){
            $input_license .= "($user_id, '$license_dt[$i]','$license_name[$i]'),";
        }else{
            $input_license .= "($user_id, '$license_dt[$i]','$license_name[$i]');";
        }
    }

    $insertId = $db->insert($input_license, null);

    // echo $insertId;

    if(!$insertId){
        throw new Exception('Failed to insert license info.');
    }

    $db->getDBINS()->commit();
    $db=null;

    AlertMsgAndRedirectTo(ROOT . 'mypage.php', '개인 회원 가입이 완료되었습니다.');

}catch(Exception $e){
    $db->getDBINS()->rollBack();
    error_log($e);
    $db=null;
    // AlertMsgAndRedirectTo(ROOT . 'mypage.php', '처리도중 에러가 발생하였습니다. 다시 시도해주세요.');
}


// 트랜잭션 처리를 해야 한다.
// 0. 프로필 이미지를 업로드한다.
// 1. 개인관련정보를 모두 입력한다.
// 2. 이를 완성하면 자격증 관련 정보를 입력한다.


// 추가된 이력서가 있을 경우 즉 배열이 0이상일 경우에만 아래의 로직을 수행할 수 있도록 한다.
//for($i=0,$size=count($license_dt);$i<$size;$i++){
//    echo  $license_dt[$i] . '<br />';
//}
//
//for($i=0,$size=count($license_name);$i<$size;$i++){
//    echo  $license_name[$i] . '<br />';
//}



?>